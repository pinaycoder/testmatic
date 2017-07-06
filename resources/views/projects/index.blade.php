@extends('layouts.master')

@section('content')
	@if(isset($success_message) || Session::has('message'))
      @include('layouts.success')
    @endif
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>All Projects</h5>
            <div class="ibox-tools">
            	@if(Auth::user()->role != 'Test Participant')
                <a href="/projects/create" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> New Project </a>
                @endif
            </div>
        </div>
        <div class="ibox-content">
       		<div class="row">
                <div class="col-lg-12">
			        <table class="table table-hover dt-tables" >
			        <thead>
			        <tr>
			        	<th>Active?</th>
			        	<th>Status</th>
			            <th>Project</th>
			            <th>Start Date</th>
			            <th>End Date</th>
			            <th>Created</th>
			            <th>Options</th>
			        </tr>
			        </thead>
			        <tbody>
			        @foreach($projects as $project)
			        <tr>
			        	<td class="is-active-td"><span class="label {{ ($project->inactive == false ? 'label-primary' : 'label-default') }}">{{ ($project->inactive == false ? 'Active' : 'Inactive') }}</span></td>
			        	<td class="status-td">
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
			        	</td>
			            <td class="table-title">
			            	<a href="/projects/show/{{ $project->id }}"  class="text-navy">{{ $project->name }}</a>
			            	<br/>
			            	<!--<small>{{ str_limit($project->description, 75) }}</small>-->
			            </td>
			        	<td class="table-title">
			        		{{ date('Y-m-d', strtotime($project->start)) }}
			        	</td>
			        	<td class="table-title">
			        		{{ date('Y-m-d', strtotime($project->end)) }}
			        	</td>
			            <td class="table-title">
			            	<a href="/users/show/{{ $project->created_by }}" class="text-navy">{{ $project->created_full_name }}</a>
			            	<br/>
			            	<small>{{ $project->created_date }}</small>
			            </td>
			            <td class="center options-td">
			            	@if(Auth::check() && Auth::user()->role != 'Test Participant')
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

			            </td>
			        </tr>
			        @endforeach
			        </tbody>
			        </table>
				</div>
			</div>
		</div>
	</div>
@endsection