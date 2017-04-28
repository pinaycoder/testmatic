@extends('layouts.master')

@section('content')
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>All Templates</h5>
            <div class="ibox-tools">
                <a href="/templates/create" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> New Template </a>
            </div>
        </div>
        <div class="ibox-content">
       		<div class="row">
                <div class="col-lg-12">
			        <table class="table table-hover dt-tables" >
			        <thead>
			        <tr>
			        	<th>Status</th>
			            <th>Template</th>
			            <th>Options</th>
			        </tr>
			        </thead>
			        <tbody>
			        @foreach($templates as $template)
			        <tr>
			        	<td class="is-active-td"><span class="label {{ ($template->inactive == false ? 'label-primary' : 'label-default') }}">{{ ($template->inactive == false ? 'Active' : 'Inactive') }}</span></td>
			            <td class="table-title">
			            	<a href="/templates/show/{{ $template->id }}">{{ $template->name }}</a>
			            	<br/>
			            	<small>{{ $template->description }}</small>
			            </td>
			            <td class="center options-td">
			            	<a href="/templates/show/{{ $template->id }}" class="btn btn-info btn-xs option-buttons"><i class="fa fa-folder"></i> View </a>
			            	<a href="/templates/edit/{{ $template->id }}" class="btn btn-white btn-xs option-buttons"><i class="fa fa-pencil"></i> Edit </a>
			            	<a href="/templates/delete/{{ $template->id }}" class="btn btn-danger btn-xs option-buttons"><i class="fa fa-trash"></i> Delete </a>
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