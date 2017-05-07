<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\User;
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

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

        return view('projects.create', compact('templates'));
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
                            'name' => 'required',
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
        $project->inactive = (boolean) $request['inactive'];
        $project->status = $request['status'];
        $project->start = $request['start'];
        $project->end = $request['end'];
        $project->created_by = Auth::user()->id;
        $project->modified_by = Auth::user()->id;

        $project->save();

        $components = json_decode($request['components-json']);

        foreach($components as $component){

            $project_component = new ProjectComponent;

            $project_component->project_id = $project->id;
            $project_component->name = $project->description;
            $project_component->order = $component->order;
            $project_component->type = $component->type;
            $project_component->description = $component->description;
            $project_component->help_text = $component->help_text;
            $project_component->created_by = Auth::user()->id;
            $project_component->modified_by = Auth::user()->id;

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
        
        $participants = User::whereDoesntHave('projects', function($q)              use ($project){
                            $q->where('project_id', $project->id);})
                            ->where('role', 'Test Participant')
                            ->where('inactive', false)
                            ->get();

        return view('projects.show', compact('project', 'project_components', 'participants', 'project_users'));
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
        $validations = [
                            'name' => 'required',
                            'description' => 'required',
                            'entry_url' => 'required',
                            'inactive' => 'required',
                            'status' => 'required',
                            'start' => 'required',
                            'end' => 'required'
                        ];

        $this->validate($request, $validations);

        $project = Project::find($id);

        $project->name = $request['name'];
        $project->description = $request['description'];
        $project->entry_url = $request['entry_url'];
        $project->inactive = (boolean) $request['inactive'];
        $project->status = $request['status'];
        $project->start = $request['start'];
        $project->end = $request['end'];
        $project->modified_by = Auth::user()->id;

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

        $users = User::findMany(explode(',', $request['selected_users']));
        

        $project->modified_by = Auth::user()->id;

        foreach($users as $user){

            $project->users()->save($user);

            $mailer->sendProjectWelcomeEmail($project, $user);

        }

        session()->flash('message', 'Project participants updated!');
        
        return redirect()->back();

    }

    public function removeUser($project_id, $user_id)
    {
    
        $project = Project::find($project_id);

        $user = User::find($user_id);

        $project->modified_by = Auth::user()->id;
        
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

        $project->save();

        $component = new ProjectComponent;

        $component->project_id = $project->id;
        $component->name = 'JPY COMPONENT';
        $component->type = $request['type'];
        $component->description = $request['description'];
        $component->order = $request['order'];
        $component->help_text = $request['help_text'];

        $component->save();

        //$project->components()->associate($component);

        session()->flash('message', 'Project component added!');
        
        return redirect()->back();

    }

    public function deactivate($id){

        $project = Project::find($id);

        $project->inactive = true;

        $project->modified_by = Auth::user()->id;

        $project->save();

        session()->flash('message', 'Project deactivated!');

        return redirect()->back();

    }

    public function activate($id){

        $project = Project::find($id);

        $project->inactive = false;

        $project->modified_by = Auth::user()->id;

        $project->save();

        session()->flash('message', 'Project activated!');

        return redirect()->back();

    }
}
