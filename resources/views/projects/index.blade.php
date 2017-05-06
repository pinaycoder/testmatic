@extends('layouts.master')

@section('content')
	@if(isset($success_message))
      @include('layouts.success')
    @endif
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>All Projects</h5>
            <div class="ibox-tools">
                <a href="/projects/create" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> New Project </a>
            </div>
        </div>
        <div class="ibox-content">
       		<div class="row">
                <div class="col-lg-12">
			        <table class="table table-hover dt-tables" >
			        <thead>
			        <tr>
			        	<th>Status</th>
			            <th>Project</th>
			            <th>Options</th>
			        </tr>
			        </thead>
			        <tbody>
			        @foreach($projects as $project)
			        <tr>
			        	<td class="is-active-td"><span class="label {{ ($project->inactive == false ? 'label-primary' : 'label-default') }}">{{ ($project->inactive == false ? 'Active' : 'Inactive') }}</span></td>
			            <td class="table-title">
			            	<a href="/projects/show/{{ $project->id }}">{{ $project->name }}</a>
			            	<br/>
			            	<small>{{ str_limit($project->description, 150) }}</small>
			            </td>
			            <td class="center options-td">
			            	<a href="/projects/show/{{ $project->id }}" class="btn btn-info btn-xs option-buttons"><i class="fa fa-folder"></i> View </a>
			            	<a href="/projects/edit/{{ $project->id }}" class="btn btn-white btn-xs option-buttons"><i class="fa fa-pencil"></i> Edit </a>
			            	<a href="/projects/delete/{{ $project->id }}" class="btn btn-danger btn-xs option-buttons"><i class="fa fa-trash"></i> Delete </a>
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