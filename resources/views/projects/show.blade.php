@extends('layouts.master')

@section('content')
    <div class="wrapper wrapper-content animated fadeInUp">
        @if(Session::has('message'))
          @include('layouts.success')
        @endif
        @if(count($errors->all()) > 0)
          @include('layouts.errors')
        @endif
    	<div class="row">
			<div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="m-b-md">
                            <h2>{{ $project->name }}</h2>
                        </div>
                    </div>
                    <div class="col-lg-6" id="project-buttons-div">
                        <div class="form-group pull-right">
                            @if(Auth::check() && Auth::user()->role != 'Test Participant')
                            <a href="#" data-toggle="modal" data-target="#edit-project-info-modal" class="btn btn-white btn-xs">Edit Project</a>
                            
                            @if($project->status == 'Open' || $project->status == 'In Progress')
                            <a href="#" data-toggle="modal" data-target="#add-participants-modal" class="btn btn-info btn-xs">Add Participants</a>
                            @endif

                            <a href="#" data-toggle="modal" data-target="#add-project-component-modal" class="btn btn-primary btn-xs">Add Component</a>

                            @if($project->inactive == false)
                            <a href="/projects/deactivate/{{ $project->id }}" class="btn btn-danger btn-xs">Deactivate</a>
                            @endif

                            @if($project->inactive == true)
                            <a href="/projects/activate/{{ $project->id }}" class="btn btn-success btn-xs">Activate</a>
                            @endif
                            @endif

                            @if(Auth::check() && Auth::user()->role == 'Test Participant' &&$project->is_valid_for_testing)
                            <a href="/projects/test/{{ $project->id }}/0" target="_blank" class="btn btn-primary btn-xs">Start Testing</a>
                            @endif

                            @if(Auth::check() && Auth::user()->role == 'Test Participant' &&!$project->is_valid_for_testing)
                            <a href="#" class="btn btn-default btn-xs">Start Testing</a>
                            @endif
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <dl class="dl-horizontal">
                            <dt>Description:</dt>
                            <dd>
                            	{{ $project->description }}
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <dl class="dl-horizontal">
                            <dt>Entry URL:</dt>
                            <dd>
                            	<a href="{{ $project->entry_url }}" class="text-navy">{{ $project->entry_url }}</a>
                            </dd>
                        </dl>
                    </div>
                    <div class="col-lg-6">
                        <dl class="dl-horizontal">
                            <dt>Active:</dt>
                            <dd>
                            	<span class="label {{ ($project->inactive == false ? 'label-primary' : 'label-default') }}">{{ ($project->inactive == false ? 'Active' : 'Inactive') }}</span>
                            </dd>
                        </dl>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <dl class="dl-horizontal">
                            <dt>Duration:</dt>
                            <dd>
                                {{ $project->duration }}
                            </dd>
                        </dl>
                    </div>
                    <div class="col-lg-6">
                        <dl class="dl-horizontal">
                            <dt>Status:</dt>
                            <dd>
                                @if($project->status == 'Closed')
                                <span class="label label-primary">
                                    <i class="fa fa-check"></i>
                                    {{ $project->status }}
                                </span>
                                @endif

                                @if($project->status == 'In Progress')
                                <span class="label label-warning">
                                    <i class="fa fa-spinner"></i>
                                    {{ $project->status }}
                                </span>
                                @endif

                                @if($project->status == 'Open')
                                <span class="label label-success">
                                    <i class="fa fa-folder-open"></i>
                                    {{ $project->status }}
                                </span>
                                @endif
                            </dd>
                        </dl>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <dl class="dl-horizontal">
                            <dt>Start Date:</dt>
                            <dd>
                                {{ $project->start }}
                            </dd>
                        </dl>
                    </div>
                    <div class="col-lg-6">
                        <dl class="dl-horizontal">
                            <dt>End Date:</dt>
                            <dd>
                                {{ $project->end }}
                            </dd>
                        </dl>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <dl class="dl-horizontal">
                            <dt>Created by:</dt> 
                        	<dd>
                        		<a href="/users/show/{{ $project->created_by }}" class="text-navy">{{ $project->created_full_name }}</a>
                        	</dd>
                            <dt>Modified by:</dt>
                            <dd>
                        		<a href="/users/show/{{ $project->modified_by }}" class="text-navy">{{ $project->modified_full_name }}</a>
                        	</dd>
                        </dl>
                    </div>
                    <div class="col-lg-6" id="cluster_info">
                        <dl class="dl-horizontal" >
                        	<dt>Created Date:</dt> <dd> 	{{ $project->created_date }} </dd>
                            <dt>Modified Date:</dt> <dd>{{ $project->modified_date }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

		<div class="row">
			<div class="col-lg-12">
				<div class="ibox float-e-margins">
					<div class="ibox-title">
    					<h5>Project Components</h5>
    					<div class="ibox-tools">
    						<a class="collapse-link">
    						<i class="fa fa-chevron-up"></i>
    						</a>
    					</div>
					</div>
					<div class="ibox-content">
						<table class="table table-hover dt-tables" id="project-components-table">
							<thead>
    					        <tr>
    					        	<th>Order</th>
    					        	<th>Type</th>
    					            <th>Component</th>
                                    @if(Auth::check() && Auth::user()->role != 'Test Participant')
    					            <th>Options</th>
                                    @endif
    					        </tr>
    					        </thead>
    					        <tbody>
    					        @foreach($project_components as $component)
    					        <tr>
    					        	<td>{{ $component->order }}</td>
    					            <td>{{ $component->type }}</td>
    					            <td class="table-title">
    					            	<a class="text-navy" href="/projects/components/show/{{ $component->id }}">{{ $component->name }}</a>
    					            	<br/>
    					            	<small>{{ str_limit($component->description, 120) }}</small>
    					            </td>
                                    @if(Auth::check() && Auth::user()->role != 'Test Participant')
    					            <td class="center">
    					            	<a href="/projects/components/edit/{{ $component->id }}" class="btn btn-white btn-xs option-buttons"><i class="fa fa-pencil"></i> Edit </a>
    					            	<a href="/projects/components/delete/{{ $component->id }}" class="btn btn-danger btn-xs option-buttons"><i class="fa fa-trash"></i> Delete </a>
    					            </td>
                                    @endif
    					        </tr>
    					        @endforeach
    					        </tbody>
    					  </table>
					</div>
				</div>
			</div>
		</div>

        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Project Users</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-hover dt-tables" id="project-participants-table">
                            <thead>
                                <tr>
                                    <th>Order</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    @if(Auth::check() && Auth::user()->role != 'Test Participant')
                                    <th>Options</th>
                                    @endif
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($project_users as $project_user)
                                <tr>
                                    <td>{{ ++$counter }}</td>
                                    <td><a href="/users/show/{{ $project_user->id }}" class="text-navy"> {{ $project_user->first_name . ' ' . $project_user->last_name }}</a></td>
                                    <td>{{ $project_user->email }}</td>
                                    <td>{{ $project_user->role }}</td>
                                    @if(Auth::check() && Auth::user()->role != 'Test Participant')
                                    <td class="center">
                                        <a href="/projects/user/delete/{{ $project->id }}/{{ $project_user->id }}" class="btn btn-danger btn-xs option-buttons"><i class="fa fa-trash"></i> Remove </a>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                                </tbody>
                          </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

@include('layouts.modals.participants')

@include('layouts.modals.project-info')

@include('layouts.modals.project-component')

@endsection

