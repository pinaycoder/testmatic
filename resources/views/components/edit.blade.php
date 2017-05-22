@extends('layouts.master')

@section('content')
	
	@if($component->type == 'Question')
	<style>
		 .question-mandatory{
		 	display: block;
		 }
	</style>
	@endif

	@if($component->type == 'Scenario')
	<style>
		 .scenario-mandatory{
		 	display: block;
		 }
	</style>
	@endif

    <div class="wrapper wrapper-content animated fadeInUp">
	    @if(isset($success_message) || Session::has('message'))
	      @include('layouts.success')
	    @endif
        <div class="ibox">
            <div class="ibox-content">
                <div class="ibox float-e-margins">
        			<div class="ibox-title">
			            <h5>Edit {{ $component->name }}</h5>
			            <div class="ibox-tools">
			            	<a class="collapse-link">
		                        <i class="fa fa-chevron-up"></i>
		                    </a>
			            </div>
		        	</div>
		            <div class="ibox-content">
		            	@if(count($errors->all()) > 0)
		            		@include('layouts.errors')
		            	@endif
		            	<form action='/templates/components/update/{{ $component->id }}' method="post" id="edit-template-component-form" class="form-horizontal">
			                {{ csrf_field() }}
			                <div class="form-group">
			            		<label class="col-sm-3 control-label">Name: </label>
			                    <div class="col-sm-9">
			                    	<input type="text" name="name" value="{{ $component->name }}" class="form-control"/>
			                    </div>
			                </div>
			                <div class="hr-line-dashed"></div>

			                <div class="form-group">
			            		<label class="col-sm-3 control-label">Type: </label>
			                    <div class="col-sm-3">
			                    	<select class="form-control m-b" name="type" id="type">
                                        <option value="Question" {{ ($component->type == 'Question' ? 'selected' : '') }}>Question</option>
                                        <option value="Scenario" {{ ($component->type == 'Scenario' ? 'selected' : '') }}>Scenario</option>
                                    </select>
			                    </div>
			                    <label class="col-sm-3 control-label">Order: </label>
			                    <div class="col-sm-3">
			                    	<input type="text" name="order" value="{{ $component->order }}" class="form-control"/>
			                    </div>
			                </div>
			                <div class="hr-line-dashed"></div>

			                <div class="form-group">
			            		<label class="col-sm-3 control-label">Description: </label>
			                    <div class="col-sm-9">
			                        <textarea class="form-control" rows="5" name="description">{{ $component->description }}</textarea>
			                    </div>
			                </div>
			                <div class="hr-line-dashed"></div>

			                <div class="form-group">
			            		<label class="col-sm-3 control-label">Help Text: </label>
			                    <div class="col-sm-9">
			                        <textarea class="form-control" rows="2" name="help_text">{{ $component->help_text }}</textarea>
			                    </div>
			                </div>
			                <div class="hr-line-dashed"></div>
			                
			                <div class="form-group  scenario-mandatory">
			            		<label class="col-sm-3 control-label">Target: </label>
			                    <div class="col-sm-3">
			                    	<input type="text" name="target" value="{{ $component->target }}" class="form-control"/>
			                    </div>
			                    <label class="col-sm-3 control-label">Time Limit: </label>
			                    <div class="col-sm-3">
			                    	<input type="text" name="time_limit" value="{{ $component->time_limit }}" class="form-control"/>
			                    </div>
			                </div>
			                <div class="hr-line-dashed  scenario-mandatory"></div>
			                
			                <div class="form-group question-mandatory">
			            		<label class="col-sm-3 control-label">Selections: </label>
			                    <div class="col-sm-9">
			                    	<input type="text" name="selections" value="{{ $component->selections }}" class="form-control"/>
			                    </div>
			                </div>
			                <div class="hr-line-dashed question-mandatory"></div>
			              
			                <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-white cancel-btn">Cancel</button>
                                    <button class="btn btn-primary" type="submit">Save changes</button>
                                </div>
                            </div>
		                </form>
		            </div>	
                </div>
            </div>
        </div>
    </div>
@endsection