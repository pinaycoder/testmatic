<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use App\User;
use App\TemplateComponent;


class TemplateComponentController extends Controller
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
     * @param  \App\TemplateComponent  $templateComponent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $component = TemplateComponent::find($id);

        $created = User::find($component->created_by);

        $modified = User::find($component->modified_by);

        $component->created_full_name = $created->first_name . ' ' . $created->last_name;

        $component->modified_full_name = $modified->first_name . ' ' . $modified->last_name;

        return view('components.show', compact('component'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TemplateComponent  $templateComponent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $component = TemplateComponent::find($id);

        return view('components.edit', compact('component'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TemplateComponent  $templateComponent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validations = [
                            'name' => 'required',
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

        $component = TemplateComponent::find($id);

        $component->name = $request['name'];
        $component->description = $request['description'];
        $component->type = $request['type'];
        $component->order = $request['order'];
        $component->help_text = $request['help_text'];
        $component->help_text = ($request['help_text'] != NULL) ? $request['help_text'] : ' ';
        $component->selections = ($request['selections'] != NULL) ? $request['selections'] : ' ';
        $component->target = ($request['target'] != NULL) ? $request['target'] : ' ';
        $component->time_limit = ($request['time_limit'] != NULL) ? $request['time_limit'] : ' ';

        $component->modified_by = Auth::user()->id;
        $component->modified_date = Carbon::now(); 

        $component->save();

        session()->flash('message', 'Template component updated!');
        
        return redirect('templates/components/show/' . $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TemplateComponent  $templateComponent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $component = TemplateComponent::find($id);

        $component->delete();

        session()->flash('message', 'Template component deleted!');
        
        return redirect()->back();

    }

    public function getTemplateComponents($id){

        $template_components = TemplateComponent::select(array('order', 'type', 'description', 'help_text', 'target', 'selections', 'time_limit'))->where('template_id', $id)->get();

        return $template_components;

    }
}
