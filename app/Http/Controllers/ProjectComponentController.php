<?php

namespace App\Http\Controllers;

use App\ProjectComponent;
use Illuminate\Http\Request;

class ProjectComponentController extends Controller
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
        //
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
     * @param  \App\ProjectComponent  $projectComponent
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectComponent $projectComponent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProjectComponent  $projectComponent
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectComponent $projectComponent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProjectComponent  $projectComponent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectComponent $projectComponent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProjectComponent  $projectComponent
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectComponent $projectComponent)
    {
        //
    }
}
