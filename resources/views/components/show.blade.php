@extends('layouts.master')

@section('content')
	
    <div class="wrapper wrapper-content animated fadeInUp">
        @if(isset($success_message) || Session::has('message'))
          @include('layouts.success')
        @endif
        <div class="ibox">
            <div class="ibox-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="m-b-md">
                        @if(Auth::check() && Auth::user()->role != 'Test Participant')
                            <a href="/templates/components/edit/{{ $component->id }}" class="btn btn-white btn-xs pull-right">Edit Component</a>
                            <h2>{{ $component->name }}</h2>
                        @endif
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <dl class="dl-horizontal">
                            <dt>Description:</dt>
                            <dd>
                            	{{ $component->description }}
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <dl class="dl-horizontal">
                            <dt>Type:</dt>
                            <dd>
                            	{{ $component->type }}
                            </dd>
                        </dl>
                    </div>
                    <div class="col-lg-6">
                    	@if($component->type == 'Question')
                        <dl class="dl-horizontal">
                            <dt>Selections:</dt>
                            <dd>
                            	{{ $component->selections }}
                            </dd>
                        </dl>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <dl class="dl-horizontal">
                            <dt>Help Text:</dt>
                            <dd>
                            	{{ $component->help_text }}
                            </dd>
                        </dl>
                    </div>
                </div>
                @if($component->type == 'Scenario')
                <div class="row">
                    <div class="col-lg-6">
                        <dl class="dl-horizontal">
                            <dt>Target:</dt>
                            <dd>
                            	<a href="/users/show/{{ $component->created_by }}" class="text-navy">{{ $component->target }}</a>
                            </dd>
                        </dl>
                    </div>
                    <div class="col-lg-6">
                        <dl class="dl-horizontal">
                            <dt>Time Limit:</dt>
                            <dd>
                            	{{ $component->time_limit }}
                            </dd>
                        </dl>
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-lg-6">
                        <dl class="dl-horizontal">
                            <dt>Created by:</dt> 
                        	<dd>
                        		<a href="/users/show/{{ $component->created_by }}" class="text-navy">{{ $component->created_full_name }}</a>
                        	</dd>
                            <dt>Modified by:</dt>
                            <dd>
                        		<a href="/users/show/{{ $component->modified_by }}" class="text-navy">{{ $component->modified_full_name }}</a>
                        	</dd>
                        </dl>
                    </div>
                    <div class="col-lg-6" id="cluster_info">
                        <dl class="dl-horizontal" >
                        	<dt>Created Date:</dt> <dd> 	{{ $component->created_date }} </dd>
                            <dt>Modified Date:</dt> <dd>{{ $component->modified_date }}</dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection