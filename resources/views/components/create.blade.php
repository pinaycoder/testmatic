@extends('layouts.master')

@section('content')
	
    <div class="col-lg-12">
            <div class="ibox">
                <div class="ibox-title">
                    <h5>Create New Template</h5>

                    <div ibox-tools></div>
                </div>
                <div class="ibox-content wizard">
                    
                    <div class="steps clearfix">
                        <ul>

                            <li ui-sref-active="current">
                                <a ui-sref=".step_two" class="btn-default"><span>1.</span> Basic Info</a>
                            </li>
                            <li ui-sref-active="current">
                                <a ui-sref=".step_two" class="btn-default"><span>2.</span> Components</a>
                            </li>
                            <li ui-sref-active="current">
                                <a ui-sref=".step_two" class="btn-default"><span>3.</span> Review</a>
                            </li>
                        </ul>
                    </div>
                    <div class="wizard">
                        <div class="content">

                        <form name="signupForm" ng-submit="processForm()" class="p-lg">

                            <!-- our nested state views will be injected here -->
                            <div id="form-views" ui-view></div>
                        </form>

                        </div>
                        </div>
                </div>
            </div>
        </div>
@endsection