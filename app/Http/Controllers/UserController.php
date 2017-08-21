<?php

namespace App\Http\Controllers;

use Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

use App\Role;
use App\User;
use App\SecurityQuestion;
use App\Mailers\AppMailer;

class UserController extends Controller
{
    protected $logged_user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['confirm', 'setPassword']]);

    }

    private function getUsersPerUser($user){

        $users = [];

        switch($user->role){
            case "Super Administrator":
                $users = User::orderBy('created_date', 'desc')->get();
            break;
            case "Test Administrator":
                $users = User::where('role', 'Test Participant')->orderBy('created_date', 'desc')->get();
            break;
        }

        return $users;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role != 'Test Participant'){
            
            $users = $this->getUsersPerUser(Auth::user());

            return view('users.index', compact('users'));

        } else{
            echo "NO ACCESS";
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->role != 'Test Participant'){
            return view('users.create');
        } else{
            echo "NO ACCESS";
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, AppMailer $mailer)
    {
        $validations = [
                            'first_name' => 'required',
                            'middle_name' => 'required',
                            'last_name' => 'required',
                            'gender' => 'required',
                            'role' => 'required',
                            'contact_num' => 'min:7|max:11',
                            'email' => 'required|email|unique:users',
                            'birthdate' => 'required|date|before:-18 years'
                        ];

        $this->validate($request, $validations);
               
        $user = new User;

        $user->first_name = $request['first_name'];
        $user->middle_name = $request['middle_name'];
        $user->last_name = $request['last_name'];
        $user->email = $request['email'];
        $user->username = $request['username'];
        $user->gender = $request['gender'];
        $user->role = $request['role'];
        $user->inactive = false;
        $user->contact_num = $request['contact_num'];
        $user->birthdate = $request['birthdate'];
        $user->password = Hash::make(str_random(8));
        $user->confirmation_token = str_random(15);
        $user->created_by = Auth::user()->id;
        $user->modified_by = Auth::user()->id;
        $user->created_date = Carbon::now();
        $user->modified_date = Carbon::now(); 

        $user->save();

        $role = Role::where('name', $user->role)->first();

        $user->roles()->attach($role);

        $mailer->sendUserWelcomeEmail($user);
        
        $success_message = 'New user successfully created! Click <a href="/users/show/' . $user->id . '">here</a> to review user profile.';

        $users = User::all();

        return view('users.index', compact('success_message', 'users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->role != 'Test Participant' || (Auth::user()->role == 'Test Participant' && Auth::user()->id != $id)){
        $user = User::find($id);

        $security_question_1 = SecurityQuestion::find($user->question_id_1);

        $security_question_2 = SecurityQuestion::find($user->question_id_2);

        return view('users.show', compact('user', 'security_question_1', 'security_question_2'));
        } else{
            echo "NO ACCESS";
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->role != 'Test Participant' || (Auth::user()->role == 'Test Participant' && Auth::user()->id != $id)){
        $user = User::find($id);

        $security_questions = SecurityQuestion::all();

        return view('users.edit', compact('user', 'security_questions'));
        } else{
            echo "NO ACCESS";
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        
        $validations = [
                            'first_name' => 'required',
                            'middle_name' => 'required',
                            'last_name' => 'required',
                            'gender' => 'required',
                            'role' => 'required',
                            'contact_num' => 'min:7|max:11',
                            'email' => 'required|email|unique:users,email,'.$user->id,
                            'birthdate' => 'required|date|before:-18 years'
                        ];

        $this->validate($request, $validations);

        $user->first_name = $request['first_name'];
        $user->middle_name = $request['middle_name'];
        $user->last_name = $request['last_name'];
        $user->email = $request['email'];
        $user->gender = $request['gender'];
        $user->role = $request['role'];
        $user->inactive = $request['inactive'];
        $user->contact_num = $request['contact_num'];
        $user->birthdate = $request['birthdate'];
        $user->question_id_1 = $request['question_id_1'];
        $user->question_ans_1 = ($request['question_ans_1'] !== NULL) ? $request['question_ans_1'] : ' ';
        $user->question_id_2 = $request['question_id_2'];
        $user->question_ans_2 = ($request['question_ans_2'] !== NULL) ? $request['question_ans_2'] : ' ';
        $user->modified_by = Auth::user()->id;
        $user->modified_date = Carbon::now(); 

        $user->save();

        $role = Role::where('name', $user->role)->first();

        $user->roles()->attach($role);

        $security_questions = SecurityQuestion::all();

        $success_message = 'Changes has been saved. Click <a href="/users/show/' . $user->id . '">here</a> to go back to user profile.';

        session()->flash('message', $success_message);

        return redirect('users/edit/' . $user->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $user = User::find($id);

        $user->delete();

        session()->flash('message', 'User deleted!');
        
        return redirect()->back();

    }

    public function deactivate($id){

        $user = User::find($id);

        $user->inactive = true;

        $user->modified_by = Auth::user()->id;
        $user->modified_date = Carbon::now();

        $user->save();

        session()->flash('message', 'User deactivated!');

        return redirect()->back();

    }

    public function activate($id){

        $user = User::find($id);

        $user->inactive = false;

        $user->modified_by = Auth::user()->id;
        $user->modified_date = Carbon::now();

        $user->save();

        session()->flash('message', 'User activated!');

        return redirect()->back();

    }

    public function confirm($confirmation_token){

        $user = User::select('id', 'confirmed', 'confirmation_token')->where('confirmation_token', $confirmation_token)->first();
        
        if(!isset($user)){
            return redirect('/login');
        }

        if(!$user->confirmed){

            return view('users.confirm', compact('user'));

        } else{

            return redirect('/login');

        }

    }

    public function setPassword(Request $request, $id){
        
        $user = User::find($id);

        $validations = [
                            'password' => 'required|min:6',
                            'password_confirmation' => 'required|same:password'
                        ];

        $this->validate($request, $validations);
        
        $user->password = Hash::make($request['password']);
        $user->confirmed = true;
        $user->confirmation_token = null;

        $user->save();

        Auth::login($user);

        return redirect('/');

    }

    public function checkIfEmailExist(){

        $user = User::all()->where('email', Input::get('email'))->first();

        if ($user) {
            return Response::json(Input::get('email').' is already taken');
        } else {
            return Response::json(true);
        }
    }
}
