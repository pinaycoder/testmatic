@extends('layouts.master')

@section('content')
	
    <div class="wrapper wrapper-content animated fadeInUp">
<div class="ibox">
        <div class="ibox-title">
            <h5>Create New Test Template</h5></div>
      <div class="ibox-content">
<form id="new-template-form" action="/templates/store" method="POST" class="wizard-big form-wizards">
{{ csrf_field() }}
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
                        <option value="false">Active</option>
                        <option value="true">Inactive</option>
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
    <fieldset>
        <h2>Add Test Components</h2>
                <div class="row">
            <div class="col-lg-8">
                
            </div>
            <div class="col-lg-4">
                <div class="text-center">
                    <div style="margin-top: 20px">
                        <i class="fa fa-sign-in" style="font-size: 180px;color: #e5e5e5 "></i>
                    </div>
                </div>
            </div>
        </div>
    </fieldset>

    <h1>Finish</h1>
    <fieldset>
        <h2>Review User Details</h2>
        
    </fieldset>
</form>
</div>  
</div>
</div>
@endsection