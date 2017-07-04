<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\User;
use App\SecurityQuestion;
use App\Project;
use App\ProjectComponent;
use App\ProjectUser;
use App\Template;

use App\Mailers\AppMailer;

class ProjectController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    private function getProjectsPerUser($user){

        $projects = [];

        switch($user->role){
            case "Super Administrator":
                $projects = Project::orderBy('created_date', 'desc')->get();
                break;
            case "Test Administrator":
                $projects = Project::whereHas('users', function($query) use ($user) {    
                     $query->where('user_id', $user->id);
                })->orderBy('created_date', 'desc')->get();
                break;
            case "Test Participant":
                $projects = Project::whereHas('users', function($query) use ($user) {    
                     $query->where('user_id', $user->id);
                })->orderBy('created_date', 'desc')->get();
                break;
        }

        return $projects;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $projects = $this->getProjectsPerUser(Auth::user());

        foreach($projects as $project){
            
            $created = User::find($project->created_by);

            $modified = User::find($project->modified_by);

            $project->created_full_name = $created->first_name . ' ' . $created->last_name;

            $project->modified_full_name = $modified->first_name . ' ' . $modified->last_name;
        }

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $templates = Template::where('inactive', false)->get();

        $participants = [];

        if(Auth::user()->role == 'Test Administrator'){

        $participants = User::whereDoesntHave('projects')->where('role', 'Test Participant')
            ->where('inactive', false)
            ->get();

        } else if(Auth::user()->role == 'Super Administrator'){

        $participants = User::whereDoesntHave('projects')->where('role', 'Test Participant')
            ->orWhere('role', 'Test Administrator')
            ->where('inactive', false)
            ->get();
        }

        return view('projects.create', compact('templates', 'participants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validations = [
                            'name' => 'required|max:20|unique:projects,name',
                            'description' => 'required',
                            'entry_url' => 'required',
                            'inactive' => 'required',
                            'status' => 'required',
                            'start' => 'required',
                            'end' => 'required'
                        ];

        $this->validate($request, $validations);

        $project = new Project;

        $project->name = $request['name'];
        $project->description = $request['description'];
        $project->entry_url = $request['entry_url'];
        $project->inactive = $request['inactive'];
        $project->status = $request['status'];
        $project->start = $request['start'];
        $project->end = $request['end'];
        $project->created_by = Auth::user()->id;
        $project->modified_by = Auth::user()->id;
        $project->created_date = Carbon::now();
        $project->modified_date = Carbon::now(); 

        $project->save();

        //$project->users()->save(Auth::user());

        $new_users = json_decode($request['new_users']);
        
        foreach($new_users as $new_user){
            
            $user = new User;

            $user->first_name = $new_user->first_name;
            $user->middle_name = $new_user->middle_name;
            $user->last_name = $new_user->last_name;
            $user->role = $new_user->role;
            $user->gender = $new_user->gender;
            $user->email = $new_user->email;
            $user->username = $new_user->email;
            $user->inactive = $new_user->status == 'Active' ? false : true;
            $user->password = Hash::make(str_random(8));
            $user->confirmation_token = str_random(15);
            $user->created_by = Auth::user()->id;
            $user->modified_by = Auth::user()->id;
            $user->created_date = Carbon::now();
            $user->modified_date = Carbon::now(); 

            $user->save();

            //$mailer->sendUserWelcomeEmail($user);

            $project->users()->save($user);

            //$mailer->sendProjectWelcomeEmail($project, $user);
        }

        $existing_users = User::findMany(json_decode($request['existing_users']));

        foreach($existing_users as $existing_user){

            $project->users()->save($existing_user);

        }

        $components = json_decode($request['components-json']);

        foreach($components as $component){

            $project_component = new ProjectComponent;

            $project_component->project_id = $project->id;
            $project_component->name = $project->name . ' Component ' . $request['order'];
            $project_component->order = $component->order;
            $project_component->type = $component->type;
            $project_component->description = $component->description;
            $project_component->help_text = ($component->help_text != NULL) ? $component->help_text : ' ';
            $project_component->selections = ($component->selections != NULL) ? $component->selections : ' ';
            $project_component->target = ($component->target != NULL) ? $component->target : ' ';
            $project_component->time_limit = ($component->time_limit != NULL) ? $component->time_limit : ' ';
            $project_component->created_by = Auth::user()->id;
            $project_component->modified_by = Auth::user()->id;
            $project_component->created_date = Carbon::now();
            $project_component->modified_date = Carbon::now(); 

            $project_component->save();

        }

        session()->flash('message', 'New project has been saved. Click <a href="/projects/show/' . $project->id . '">here</a> to check new project.');

        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);

        $created = User::find($project->created_by);

        $modified = User::find($project->modified_by);

        $project->created_full_name = $created->first_name . ' ' . $created->last_name;

        $project->modified_full_name = $modified->first_name . ' ' . $modified->last_name;

        $project_components = ProjectComponent::all()->where('project_id', $project->id);

        $project_users = Project::where('id', $project->id)->with('users')->get()[0]->users;
        
        $participants = [];

        if(Auth::user()->role == 'Test Administrator'){

        $participants = User::whereDoesntHave('projects', function($q)              use ($project){
                            $q->where('project_id', $project->id);})
                            ->where('role', 'Test Participant')
                            ->where('inactive', false)
                            ->get();
        } else if(Auth::user()->role == 'Super Administrator'){

        $participants = User::whereDoesntHave('projects', function($q)              use ($project){
                            $q->where('project_id', $project->id);})
                            ->where('role', 'Test Participant')
                            ->orWhere('role', 'Test Administrator')
                            ->where('inactive', false)
                            ->get();
        }

        $counter = 0;

        return view('projects.show', compact('project', 'project_components', 'participants', 'project_users', 'counter'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        

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
        $project = Project::find($id);

        $validations = [
                            'name' => 'required|max:20|unique:projects,name,' . $project->id,
                            'description' => 'required',
                            'entry_url' => 'required',
                            'inactive' => 'required',
                            'status' => 'required',
                            'start' => 'required',
                            'end' => 'required'
                        ];

        $this->validate($request, $validations);

        $project->name = $request['name'];
        $project->description = $request['description'];
        $project->entry_url = $request['entry_url'];
        $project->inactive = $request['inactive'];
        $project->status = $request['status'];
        $project->start = $request['start'];
        $project->end = $request['end'];
        $project->modified_by = Auth::user()->id;
        $project->modified_date = Carbon::now(); 

        $project->save();

        session()->flash('message', 'Project updated!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Relate User record to Project.
     *
     * @param  int  $user_id
     * @param  int  $project_id
     * @return \Illuminate\Http\Response
     */
    public function addUser(Request $request, $id, AppMailer $mailer)
    {
    
        $project = Project::find($id);

        $user = new User;

        if(isset($request['new_user'])){

            $validations = [
                            'first_name' => 'required',
                            'middle_name' => 'required',
                            'last_name' => 'required',
                            'gender' => 'required',
                            /**'role' => 'required',**/
                            'contact_num' => 'min:7|max:11',
                            'email' => 'required|email|unique:users'/**,
                            'birthdate' => 'required|date|before:-18 years'**/
                        ];

            $this->validate($request, $validations);
                   
            $user->first_name = $request['first_name'];
            $user->middle_name = $request['middle_name'];
            $user->last_name = $request['last_name'];
            $user->email = $request['email'];
            $user->username = $request['email'];
            $user->gender = $request['gender'];
            //$user->role = $request['role'];
            $user->role = 'Test Participant';
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

            //$mailer->sendUserWelcomeEmail($user);

        } else{
            $user = User::find($request['selected_users']);
        }

        

        $project->modified_by = Auth::user()->id;
        $project->modified_date = Carbon::now(); 

        //foreach($users as $user){

        $project->users()->save($user);

        $mailer->sendProjectWelcomeEmail($project, $user);

        //}

        session()->flash('message', 'Project participants updated!');
        
        return redirect()->back();

    }

    public function removeUser($project_id, $user_id)
    {
    
        $project = Project::find($project_id);

        $user = User::find($user_id);

        $project->modified_by = Auth::user()->id;
        $project->modified_date = Carbon::now(); 
        
        $project->users()->detach($user);

        session()->flash('message', 'Project participant removed!');
        
        return redirect()->back();

    }

    public function addComponent(Request $request, $id)
    {
        
        $validations = [
                            'type' => 'required',
                            'description' => 'required',
                            'order' => 'required'
                        ];

        if($request['type'] == 'Question'){
            $validations['selections'] = 'required';
        } else if($request['type'] == 'Scenario'){
            $validations['target'] = 'required';
            $validations['time_limit'] = 'required';
        }

        $this->validate($request, $validations);
        
        $project = Project::find($id);

        $project->modified_by = Auth::user()->id;
        $project->modified_date = Carbon::now(); 

        $project->save();

        $component = new ProjectComponent;

        $component->project_id = $project->id;
        $component->name = $project->name . ' Component ' . $request['order'];
        $component->type = $request['type'];
        $component->description = $request['description'];
        $component->order = $request['order'];
        $component->help_text = ($request['help_text'] != NULL) ? $request['help_text'] : ' ';
        $component->selections = ($request['selections'] != NULL) ? $request['selections'] : ' ';
        $component->target = ($request['target'] != NULL) ? $request['target'] : ' ';
        $component->time_limit = ($request['time_limit'] != NULL) ? $request['time_limit'] : ' ';

        $component->save();

        //$project->components()->associate($component);

        session()->flash('message', 'Project component added!');
        
        return redirect()->back();

    }

    public function deactivate($id){

        $project = Project::find($id);

        $project->inactive = true;

        $project->modified_by = Auth::user()->id;
        $project->modified_date = Carbon::now(); 

        $project->save();

        session()->flash('message', 'Project deactivated!');

        return redirect()->back();

    }

    public function activate($id){

        $project = Project::find($id);

        $project->inactive = false;

        $project->modified_by = Auth::user()->id;
        $project->modified_date = Carbon::now(); 

        $project->save();

        session()->flash('message', 'Project activated!');

        return redirect()->back();

    }

    /**
     * Show the test confirmation to test participants.
     *
     * @return \Illuminate\Http\Response
     */
    public function test($project_id, $component_order = 0)
    {
        $project = Project::find($project_id);

        $project_component = $project->components()
                                      ->where('order', $component_order)
                                      ->first();

        $next_order = $component_order + 1;
        
        return view('projects.test', compact('project', 'project_component', 'component_order', 'next_order'));
    }

    public function markComplete(){
        $img = imagegrabscreen();
        imagepng($img, 'screenshot.png');
    }
}
