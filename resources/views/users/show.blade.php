@extends('layouts.master')

@section('content')
	
	<div class="wrapper wrapper-content animated fadeInUp">
        <div class="ibox">
            <div class="ibox-content">
                <div class="row">
                	<div class="col-lg-1">
                    	<div class="m-b-md">
                            <img alt="image" class="img-circle m-t-s img-responsive" src="/img/default-user-img.png">
                        </div>
                    </div>
                    <div class="col-lg-11">
                    	<div class="m-b-md">
                            <a href="/users/edit/{{ $user->id }}" class="btn btn-white btn-xs pull-right">Edit User Details</a>
                            <h2>{{ $user->first_name . ' ' . $user->last_name}}</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <dl class="dl-horizontal">
                            <dt>Username:</dt>
                            <dd>
                            	{{ $user->username }}
                            </dd>
                        </dl>
                    </div>
                    <div class="col-lg-6">
                        <dl class="dl-horizontal">
                            <dt>Role:</dt>
                            <dd>
                            	{{ $user->role }}
                            </dd>
                        </dl>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <dl class="dl-horizontal">
                            <dt>Email:</dt>
                            <dd>
                            	{{ $user->email }}
                            </dd>
                        </dl>
                    </div>
                    <div class="col-lg-6">
                        <dl class="dl-horizontal">
                            <dt>Status:</dt>
                            <dd>
                            	<span class="label {{ ($user->inactive == false ? 'label-primary' : 'label-default') }}">{{ ($user->inactive == false ? 'Active' : 'Inactive') }}</span>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
        		<div class="ibox float-e-margins">
        			<div class="ibox-title">
			            <h5>Basic Info</h5>
			            <div class="ibox-tools">
			            	<a class="collapse-link">
		                        <i class="fa fa-chevron-up"></i>
		                    </a>
			            </div>
		        	</div>
		            <div class="ibox-content">
		            	<form method="get" class="form-horizontal">
			                <div class="form-group">
			            		<label class="col-sm-4 control-label">First Name: </label>
			                    <div class="col-sm-8">
			                        <span>{{ $user->first_name }}</span> 
			                    </div>
			                </div>
			                <div class="hr-line-dashed"></div>

			                <div class="form-group">
			            		<label class="col-sm-4 control-label">Middle Name: </label>
			                    <div class="col-sm-8">
			                        <span>{{ $user->middle_name }}</span> 
			                    </div>
			                </div>
			                <div class="hr-line-dashed"></div>

			                <div class="form-group">
			            		<label class="col-sm-4 control-label">Last Name: </label>
			                    <div class="col-sm-8">
			                        <span>{{ $user->last_name }}</span> 
			                    </div>
			                </div>
			                <div class="hr-line-dashed"></div>

			                <div class="form-group">
			            		<label class="col-sm-4 control-label">Gender: </label>
			                    <div class="col-sm-8">
			                        <span>{{ $user->gender }}</span> 
			                    </div>
			                </div>
			                <div class="hr-line-dashed"></div>

			                <div class="form-group">
			            		<label class="col-sm-4 control-label">Contact Number: </label>
			                    <div class="col-sm-8">
			                        <span>{{ $user->contact_num }}</span> 
			                    </div>
			                </div>
			                <div class="hr-line-dashed"></div>

			                <div class="form-group">
			            		<label class="col-sm-4 control-label">Birthday: </label>
			                    <div class="col-sm-8">
			                        <span>{{ $user->birthdate }}</span> 
			                    </div>
			                </div>
		                </form>
		            </div>	
                </div>
            </div>
            <div class="row">
            	<div class="col-lg-6">
            		<div class="ibox">
			        	<div class="ibox-title">
				            <h5>Security Info</h5>
				            <div class="ibox-tools">
				            	<a class="collapse-link">
			                        <i class="fa fa-chevron-up"></i>
			                    </a>
				            </div>
			        	</div>
			            <div class="ibox-content">
			            	<form method="get" class="form-horizontal">
			            		<div class="form-group">
				            		<label class="col-sm-4 control-label">Security Question 1: </label>
				                    <div class="col-sm-8">
				                        <span>{{ $user->birthdate }}</span> 
				                    </div>
				                </div>
				                <div class="hr-line-dashed"></div>

				                <div class="form-group">
				            		<label class="col-sm-4 control-label">Security Question 1 Answer: </label>
				                    <div class="col-sm-8">
				                        <span>{{ $user->question_ans_1 }}</span> 
				                    </div>
				                </div>
				                <div class="hr-line-dashed"></div>

				                <div class="form-group">
				            		<label class="col-sm-4 control-label">Security Question 2: </label>
				                    <div class="col-sm-8">
				                        <span>{{ $user->birthdate }}</span> 
				                    </div>
				                </div>
				                <div class="hr-line-dashed"></div>

				                <div class="form-group">
				            		<label class="col-sm-4 control-label">Security Question Answer 2: </label>
				                    <div class="col-sm-8">
				                        <span>{{ $user->birthdate }}</span> 
				                    </div>
				                </div>
				                <div class="hr-line-dashed"></div>

			            	</form>
			            </div>
			        </div>	
            	</div>
            </div>
        </div>
    </div>

	
@endsection