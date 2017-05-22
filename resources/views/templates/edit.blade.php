@extends('layouts.master')

@section('content')
	
    <div class="wrapper wrapper-content animated fadeInUp">
    @if(isset($success_message) || Session::has('message'))
      @include('layouts.success')
   @endif
   @if(count($errors->all()) > 0)
      @include('layouts.errors')
   @endif
   <form action='/templates/update/{{ $template->id }}'method="post" class="form-horizontal">
         {{ csrf_field() }} 
         <input type="hidden" name="components-json" id="components-json" value="{{ $template_components }}"/>
    	<div class="row">
			<div class="col-lg-12">
        <div class="ibox">
            <div class="ibox-content">
            	<div class="row">
                    <div class="col-lg-12">
                        <div class="m-b-md">
                            <a href="#" data-toggle="modal" data-target="#add-component-modal" class="btn btn-primary btn-xs pull-right">Add Component</a>
                            <h2>Edit {{ $template->name }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <dl class="dl-horizontal">
                            <dt>Template Name:</dt>
                            <dd>
                            	<input type="text" name="name" value="{{ $template->name }}" class="form-control"/>
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <dl class="dl-horizontal">
                            <dt>Description:</dt>
                            <dd>
                            	<textarea class="form-control" rows="5" name="description">{{ $template->description }}</textarea>
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <dl class="dl-horizontal">
                            <dt>Entry URL:</dt>
                            <dd>
                            	<input type="text" name="entry_url" value="{{ $template->entry_url }}" class="form-control"/>
                            </dd>
                        </dl>
                    </div>
                    <div class="col-lg-6">
                        <dl class="dl-horizontal">
                            <dt>Status:</dt>
                            <dd>
                            	<select class="form-control" name="inactive">
                                <option value="0" {{ ($template->inactive == false ? 'selected' : '') }}>Active</option>
                                <option value="1" {{ ($template->inactive == true ? 'selected' : '') }}>Inactive</option>
                            </select>
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
						<table class="table table-hover" id="add-component-table">
										        <thead>
										        <tr>
										        	<th>Order</th>
						                            <th>Type</th>
						                            <th>Description</th>
						                            <th>Help Text</th>
						                            <th>Target</th>
						                            <th>Selections</th>
						                            <th>Time Limit</th>
										        </tr>
										        </thead>
										        <!--<tbody>
										        @foreach($template_components as $component)
										        <tr>
										        	<td>{{ $component->order }}</td>
										            <td>{{ $component->type }}</td>
										            <td class="table-title">
										            	<a href="/templates/components/show/{{ $component->id }}">{{ $component->name }}</a>
										            	<br/>
										            	<small>{{ str_limit($component->description, 120) }}</small>
										            </td>
										            <td>{{ $component->help_text }}</td>
										            <td>{{ $component->selections }}</td>
										            <td>{{ $component->target }}</td>
										            <td>{{ $component->time_limit }}</td>
										        </tr>
										        @endforeach
										        </tbody>-->
										        </table>

										        <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-2">
                        <button class="btn btn-white cancel-btn">Cancel</button>
                        <button class="btn btn-primary" type="submit">Save changes</button>
                    </div>
                </div>
					</div>
				</div>
			</div>
		</div>
		</form>
    </div>

    @include('components.create')

@endsection