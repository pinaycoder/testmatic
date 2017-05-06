<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Project;
use App\ProjectComponent;
use App\ProjectUser;

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

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
    public function addUser(Request $request, $id)
    {
    
        $project = Project::find($id);

        $users = User::find($request['selected_users']);

        $project->users()->save($users);
    }
}
