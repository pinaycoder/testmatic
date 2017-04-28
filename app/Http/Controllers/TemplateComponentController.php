<?php

namespace App\Http\Controllers;

use App\TemplateComponent;
use Illuminate\Http\Request;

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
        $component->help_text = $request['help_text'];
        $component->order = $request['order'];

        $component->selections = $request['selections'];

        $component->target = $request['target'];
        $component->time_limit = $request['time_limit'];

        $component->save();

        return view('components.show', compact('component'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TemplateComponent  $templateComponent
     * @return \Illuminate\Http\Response
     */
    public function destroy(TemplateComponent $templateComponent)
    {
        //
    }
}
