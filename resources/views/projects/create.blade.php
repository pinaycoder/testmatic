@extends('layouts.master')

@section('content')

<div class="wrapper wrapper-content animated fadeInUp">
    <div class="ibox">
        <div class="ibox-title">
            <h5>Create New Test Project</h5></div>
            <div class="ibox-content form-horizontal">
                @if(count($errors->all()) > 0)
                    @include('layouts.errors')
                @endif
                <form id="new-project-form" action="/projects/store" method="POST" class="wizard-big form-wizards">
                    {{ csrf_field() }}
                    <input type="hidden" name="components-json" value="[]" id="components-json"/>
                    <input type="hidden" name="new_users" id="new_users" value="[]"/>
                    <input type="hidden" name="existing_users" id="existing_users" value="[]"/>
                    <h1>Basic Info</h1>
                    <fieldset>
                        <h2>Basic Information</h2>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">* Name:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="name" class="form-control required"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">* Description:</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control required" rows="5" name="description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">* Entry URL:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="entry_url" id="entry_url" class="form-control required"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">* Active:</label>
                                <div class="col-lg-4">
                                    <select class="form-control required" name="inactive">
                                        <option value="0">Active</option>
                                        <option value="1">Inactive</option>
                                    </select>
                                </div>
                                <label class="col-sm-2 control-label">* Status:</label>
                                <div class="col-lg-4">
                                    <select class="form-control required" name="status">
                                        <option value="Closed">Closed</option>
                                        <option value="In Progress">In Progress</option>
                                        <option value="Open">Open</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Start Date</label>
                                <div class="col-lg-4">
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="start" name="start" class="form-control">
                                    </div>   
                                </div>
                                
                                <label class="col-sm-2 control-label">End Date</label>
                                <div class="col-lg-4">
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="end" name="end" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                    <label class="col-sm-2 control-label"> Reference Template </label>
                                    <div class="col-lg-10">
                                    <select class="form-control" name="reference-template" id="reference-template">
                                        <option value="">Please select template</option>
                                        @foreach($templates as $template)
                                        <option value="{{ $template->id }}">{{ $template->name }}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>
                            </fieldset>
                        

                    <h1>Components</h1>
                    <fieldset style="width: 100%;">
                        <div class="row">
                            <div class="col-lg-9">
                             <h2>Test Project Components</h2> 
                         </div>
                         <div class="col-lg-3">
                            <a href="#" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#add-component-modal"><i class="fa fa-pencil"></i> Add Component </a>   
                        </div>
                    </div>
                    <div class="row white-bg">
                        <div class="col-lg-12">
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
                            </table>
                        </div>
                    </div>
                </fieldset>
                
                <h1>Participants</h1>
                    <fieldset style="width: 100%;">
                        <div class="row">
                            <div class="col-lg-9">
                             <h2>Test Project Participants</h2> 
                         </div>
                         <div class="col-lg-3">
                            <a href="#" class="btn btn-primary btn-xs pull-right" data-toggle="modal" data-target="#add-participants-modal"><i class="fa fa-pencil"></i> Add Participant </a>   
                        </div>
                    </div>
                    <div class="row white-bg">
                        <div class="col-lg-12">
                            <table class="table table-hover" id="add-participants-table">
                                <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </fieldset>

                <h1>Finish</h1>
                <fieldset>
                <h2>Review Project Details</h2>
                </fieldset>
            </form>
        </div>  
    </div>
</div>

@include('layouts.modals.participants')
@include('components.create')
@endsection