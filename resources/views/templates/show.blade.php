@extends('layouts.master')

@section('content')
	
    <div class="wrapper wrapper-content animated fadeInUp">
    	<div class="row">
			<div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="m-b-md">
                            <a href="/templates/edit/{{ $template->id }}" class="btn btn-white btn-xs pull-right">Edit Template</a>
                            <a href="/templates/edit/{{ $template->id }}" class="btn btn-info btn-xs pull-right">Invite Participants</a>
                            <h2>{{ $template->name }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <dl class="dl-horizontal">
                            <dt>Description:</dt>
                            <dd>
                            	{{ $template->description }}
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <dl class="dl-horizontal">
                            <dt>Entry URL:</dt>
                            <dd>
                            	<a href="{{ $template->entry_url }}" class="text-navy">{{ $template->entry_url }}</a>
                            </dd>
                        </dl>
                    </div>
                    <div class="col-lg-6">
                        <dl class="dl-horizontal">
                            <dt>Status:</dt>
                            <dd>
                            	<span class="label {{ ($template->inactive == false ? 'label-primary' : 'label-default') }}">{{ ($template->inactive == false ? 'Active' : 'Inactive') }}</span>
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <dl class="dl-horizontal">
                            <dt>Created by:</dt> 
                        	<dd>
                        		<a href="/users/show/{{ $template->created_by }}" class="text-navy">{{ $template->created_full_name }}</a>
                        	</dd>
                            <dt>Modified by:</dt>
                            <dd>
                        		<a href="/users/show/{{ $template->modified_by }}" class="text-navy">{{ $template->modified_full_name }}</a>
                        	</dd>
                        </dl>
                    </div>
                    <div class="col-lg-6" id="cluster_info">
                        <dl class="dl-horizontal" >
                        	<dt>Created Date:</dt> <dd> 	{{ $template->created_date }} </dd>
                            <dt>Modified Date:</dt> <dd>{{ $template->modified_date }}</dd>
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
					<h5>Template Components</h5>
					<div class="ibox-tools">
						<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
						</a>
					</div>
					</div>
					<div class="ibox-content">
						<table class="table table-hover dt-tables" >
										        <thead>
										        <tr>
										        	<th>Order</th>
										        	<th>Type</th>
										            <th>Component</th>
										            <th>Options</th>
										        </tr>
										        </thead>
										        <tbody>
										        @foreach($template_components as $component)
										        <tr>
										        	<td>{{ $component->order }}</td>
										            <td>{{ $component->type }}</td>
										            <td class="table-title">
										            	<a href="/templates/components/show/{{ $component->id }}">{{ $component->name }}</a>
										            	<br/>
										            	<small>{{ str_limit($component->description, 120) }}</small>
										            </td>
										            <!--<td>{{ $component->help_text }}</td>
										            <td>{{ $component->selections }}</td>-->
										            <td class="center">
										            	<a href="/templates/components/show/1" class="btn btn-info btn-xs option-buttons"><i class="fa fa-folder"></i> View </a>
										            	<a href="/templates/components/edit/1" class="btn btn-white btn-xs option-buttons"><i class="fa fa-pencil"></i> Edit </a>
										            	<a href="/templates/components/delete/1" class="btn btn-danger btn-xs option-buttons"><i class="fa fa-trash"></i> Delete </a>
										            </td>
										        </tr>
										        @endforeach
										        </tbody>
										        </table>
					</div>
				</div>
			</div>
		</div>
    </div>
@endsection