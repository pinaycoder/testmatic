@extends('layouts.master')

@section('content')

<div class="wrapper wrapper-content animated fadeInUp">
    <div class="ibox">
        <div class="ibox-title">
            <h5>Create New Test Template</h5></div>
            <div class="ibox-content">
                @if(count($errors->all()) > 0)
                    @include('layouts.errors')
                @endif
                <form id="new-template-form" action="/templates/store" method="POST" class="wizard-big form-wizards">
                    {{ csrf_field() }}
                    <input type="hidden" name="components-json" value="[]" id="components-json"/>
                    <h1>Basic Info</h1>
                    <fieldset>
                        <h2>Basic Information</h2>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Template Name *</label>
                                    <input id="name" name="name" type="text" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Entry URL *</label>
                                    <input id="entry_url" name="entry_url" type="text" class="form-control required">
                                </div>
                                <div class="form-group">
                                    <label>Status *</label>
                                    <select class="form-control required" name="inactive">
                                        <option value="">Please select status</option>
                                        <option value="0">Active</option>
                                        <option value="1">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Description *</label>
                                    <textarea class="form-control" rows="8" id="description" name="description"></textarea>
                                </div>
                            </div>
                        </div>

                    </fieldset>

                    <h1>Components</h1>
                    <fieldset style="width: 100%;">
                        <div class="row">
                            <div class="col-lg-9">
                             <h2>Test Template Components</h2> 
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

                <h1>Finish</h1>
                <fieldset>
                <h2>Review Template Details</h2>
                <h3></h3>
                </fieldset>
            </form>
        </div>  
    </div>
</div>

@include('components.create')

@endsection