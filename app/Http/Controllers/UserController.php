<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
        $this->middleware('auth', ['except' => ['confirm']]);

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
        $user->created_by = Auth::user()->id;
        $user->modified_by = Auth::user()->id;
        $user->created_date = Carbon::now();
        $user->modified_date = Carbon::now(); 

        $user->save();

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
        $validations = [
                            'first_name' => 'required',
                            'middle_name' => 'required',
                            'last_name' => 'required',
                            'gender' => 'required',
                            'role' => 'required',
                            'contact_num' => 'min:7|max:11',
                            'email' => 'required|email',
                            'birthdate' => 'required|date|before:-18 years'
                        ];

        $this->validate($request, $validations);

        $user = User::find($id);

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

        $user = User::select('confirmed', 'loggedin', 'confirmation_token')->where('confirmation_token', $confirmation_token)->first();
        
        if(!$user->confirmed && !$user->loggedin){

            return view('users.confirm');

        }

    }

    public function setPassword($user, $password, $confirm_password){

    }
}
