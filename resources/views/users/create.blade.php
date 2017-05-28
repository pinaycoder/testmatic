@extends('layouts.master')

@section('content')
<div class="wrapper wrapper-content animated fadeInUp">
<div class="ibox">
		<div class="ibox-title">
            <h5>Create New Test User</h5></div>
      <div class="ibox-content">
        @if(count($errors->all()) > 0)
            @include('layouts.errors')
        @endif
<form id="new-user-form" action="/users/store" method="POST" class="wizard-big form-wizards">
    {{ csrf_field() }}
    <h1>Basic Info</h1>
    <fieldset>
        <h2>Basic Information</h2>
        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>First name *</label>
                    <input id="first_name" name="first_name" type="text" class="form-control required">
                </div>
                <div class="form-group">
                    <label>Middle name *</label>
                    <input id="middle_name" name="middle_name" type="text" class="form-control required">
                </div>
                <div class="form-group">
                    <label>Last name *</label>
                    <input id="last_name" name="last_name" type="text" class="form-control required">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>Birthday</label>
                    <div class="input-group date">
	                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="birthdate" name="birthdate" class="form-control" value="yyyy-mm-dd">
	                </div>
                </div>
                <div class="form-group">
                    <label>Gender *</label>
                    <select class="form-control required" name="gender">
                    	<option value="">Please select gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Contact Number </label>
                    <input id="contact_num" name="contact_num" type="text" class="form-control">
                </div>
            </div>
        </div>

    </fieldset>
    <h1>Account Info</h1>
    <fieldset>
        <h2>Account Information</h2>
                <div class="row">
            <div class="col-lg-8">
                <div class="form-group">
                    <label>Email Address *</label>
                    <input id="email" name="email" type="text" class="form-control required">
                </div>
                <div class="form-group">
                    <label>Username *</label>
                    <input id="username" name="username" type="text" class="form-control required">
                </div>
                <div class="form-group">
                    <label>Role *</label>
                    <select class="form-control required" name="role" required>
                    	<option value="">Please select user role</option>
	                    <option value="Test Administrator">Test Administrator</option>
	                    <option value="Test Participant">Test Participant</option>
	                </select>
                </div>
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