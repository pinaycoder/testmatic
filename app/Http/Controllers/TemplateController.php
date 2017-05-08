<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\User;
use App\Template;
use App\TemplateComponent;

class TemplateController extends Controller
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
        $templates = Template::all();

        foreach($templates as $template){

            $created = User::find($template->created_by);

            $modified = User::find($template->modified_by);

            $template->created_full_name = $created->first_name . ' ' . $created->last_name;

            $template->modified_full_name = $modified->first_name . ' ' . $modified->last_name;
        
        }

        return view('templates.index', compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('templates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $template = new Template;

        $template->name = $request['name'];
        $template->entry_url = $request['entry_url'];
        $template->inactive = (boolean) $request['inactive'];
        $template->description = $request['description'];
        $template->created_by = Auth::user()->id;
        $template->modified_by = Auth::user()->id;
        $template->created_date = Carbon::now();
        $template->modified_date = Carbon::now(); 

        $template->save();

        $components = json_decode($request['components-json']);

        foreach($components as $component){

            $template_component = new TemplateComponent;

            $template_component->template_id = $template->id;
            $template_component->name = $template->description;
            $template_component->order = $component->order;
            $template_component->type = $component->type;
            $template_component->description = $component->description;
            $template_component->help_text = $component->help_text;
            $template_component->created_by = Auth::user()->id;
            $template_component->modified_by = Auth::user()->id;
            $template_component->created_date = Carbon::now();
            $template_component->modified_date = Carbon::now(); 

            $template_component->save();

        }

        $templates = Template::all();

        $success_message = 'New template has been saved. Click <a href="/templates/show/' . $template->id . '">here</a> to check new template.';

        return view('templates.index', compact('templates', 'success_message'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $template = Template::find($id);

        $created = User::find($template->created_by);

        $modified = User::find($template->modified_by);

        $template->created_full_name = $created->first_name . ' ' . $created->last_name;

        $template->modified_full_name = $modified->first_name . ' ' . $modified->last_name;

        $template_components = TemplateComponent::all()->where('template_id', $template->id);

        foreach($template_components as $template_component){
            
            $created = User::find($template_component->created_by);

            $modified = User::find($template_component->modified_by);

            $template_component->created_full_name = $created->first_name . ' ' . $created->last_name;

            $template_component->modified_full_name = $modified->first_name . ' ' . $modified->last_name;
        }

        $participants = User::all()
                                ->where('role', 'Test Participant')
                                ->where('inactive', false);

        return view('templates.show', compact('template', 'template_components', 'participants'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /** $template = Template::find($id)
                                ->getCreatedByName()
                                ->getModifiedByName()
                                ->getDuration();
        **/
                                
        $template = Template::find($id);

        $created = User::find($template->created_by);

        $modified = User::find($template->modified_by);

        $template->created_full_name = $created->first_name . ' ' . $created->last_name;

        $template->modified_full_name = $modified->first_name . ' ' . $modified->last_name;

        $template_components = TemplateComponent::select(array('id', 'order', 'type', 'description', 'help_text', 'target', 'selections', 'time_limit'))->where('template_id', $template->id)->get();

        return view('templates.edit', compact('template', 'template_components'));
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
                            'inactive' => 'required'
                        ];

        $this->validate($request, $validations);

        $template = Template::find($id);

        $template->name = $request['name'];
        $template->entry_url = $request['entry_url'];
        $template->inactive = (boolean) $request['inactive'];
        $template->description = $request['description'];
        $template->modified_by = Auth::user()->id;
        $template->modified_date = Carbon::now(); 

        $template->save();

        /**$components = json_decode($request['components-json']);

        foreach($components as $component){
        
            if(!isset($component->id)){
            
                $template_component = new TemplateComponent;

                $template_component->template_id = $template->id;
                $template_component->name = 'Template Component' . $component->order;
                $template_component->order = $component->order;
                $template_component->type = $component->type;
                $template_component->description = $component->description;
                $template_component->help_text = $component->help_text;
                $template_component->modified_by = Auth::user()->id;

                $template_component->save();
            }

        }**/

        session()->flash('message', 'Template updated!');

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

    public function deactivate($id){

        $template = Template::find($id);

        $template->inactive = true;

        $template->modified_by = Auth::user()->id;
        $template->modified_date = Carbon::now(); 

        $template->save();

        session()->flash('message', 'Template deactivated!');

        return redirect()->back();

    }

    public function activate($id){

        $template = Template::find($id);

        $template->inactive = false;

        $template->modified_by = Auth::user()->id;
        $template->modified_date = Carbon::now(); 

        $template->save();

        session()->flash('message', 'Template activated!');

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
        
        $template = Template::find($id);

        $template->modified_by = Auth::user()->id;
        $template->modified_date = Carbon::now(); 

        $template->save();

        $component = new TemplateComponent;

        $component->template_id = $template->id;
        $component->name = $template->name . ' Component ' . $request['order'];
        $component->type = $request['type'];
        $component->description = $request['description'];
        $component->order = $request['order'];
        $component->help_text = $request['help_text'];

        $component->save();

        session()->flash('message', 'Template component added!');
        
        return redirect()->back();

    }

}
