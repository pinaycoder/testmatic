@extends('layouts.master')

@section('content')
	
<div class="wrapper wrapper-content animated fadeInUp">
   @if(isset($success_message) || Session::has('message'))
      @include('layouts.success')
   @endif
   @if(count($errors->all()) > 0)
      @include('layouts.errors')
   @endif
   <div class="ibox">
      <div class="ibox-content">
         <div class="row">
            <div class="col-lg-3">
               <div class="m-b-md user-details-img-div">
                  <img alt="image" class="img-circle m-t-s img-responsive user-details-img" src="/img/default-user-img.png">
               </div>
            </div>
            <div class="col-lg-9">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="m-b-md">
                        <a href="/users/edit/{{ $user->id }}" class="btn btn-white btn-xs pull-right">Edit User Details</a>
                        <h2>{{ $user->first_name . ' ' . $user->last_name}}</h2>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-6">
                     <dl class="dl-horizontal user-details-dl">
                        <dt>Username:</dt>
                        <dd>
                           {{ $user->username }}
                        </dd>
                     </dl>
                  </div>
                  <div class="col-lg-6">
                     <dl class="dl-horizontal  user-details-dl">
                        <dt>Role:</dt>
                        <dd>
                           {{ $user->role }}
                        </dd>
                     </dl>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-6">
                     <dl class="dl-horizontal  user-details-dl">
                        <dt>Email:</dt>
                        <dd>
                           {{ $user->email }}
                        </dd>
                     </dl>
                  </div>
                  <div class="col-lg-6">
                     <dl class="dl-horizontal  user-details-dl">
                        <dt>Status:</dt>
                        <dd>
                           <span class="label {{ ($user->inactive == false ? 'label-primary' : 'label-default') }}">{{ ($user->inactive == false ? 'Active' : 'Inactive') }}</span>
                        </dd>
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
               <h5>Basic Info</h5>
               <div class="ibox-tools">
                  <a class="collapse-link">
                  <i class="fa fa-chevron-up"></i>
                  </a>
               </div>
            </div>
            <div class="ibox-content">
               <form method="get" class="form-horizontal">
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="col-sm-3 control-label">First Name: </label>
                           <div class="col-sm-9">
                              <span>{{ $user->first_name }}</span> 
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                           <label class="col-sm-3 control-label">Middle Name: </label>
                           <div class="col-sm-9">
                              <span>{{ $user->middle_name }}</span> 
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                           <label class="col-sm-3 control-label">Last Name: </label>
                           <div class="col-sm-9">
                              <span>{{ $user->last_name }}</span> 
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="col-sm-3 control-label">Gender: </label>
                           <div class="col-sm-9">
                              <span>{{ $user->gender }}</span> 
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                           <label class="col-sm-3 control-label">Contact Num: </label>
                           <div class="col-sm-9">
                              <span>{{ $user->contact_num }}</span> 
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                           <label class="col-sm-3 control-label">Birthday: </label>
                           <div class="col-sm-9">
                              <span>{{ $user->birthdate }}</span>
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                     </div>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col-lg-12">
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
                     <label class="col-sm-3 control-label">Security Question 1: </label>
                     <div class="col-sm-9">
                        <span>{{ $security_question_1->question }}</span> 
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <label class="col-sm-3 control-label">Security Question 1 Answer: </label>
                     <div class="col-sm-9">
                        <span>{{ $user->question_ans_1 }}</span> 
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <label class="col-sm-3 control-label">Security Question 2: </label>
                     <div class="col-sm-9">
                        <span>{{ $security_question_2->question }}</span> 
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <label class="col-sm-3 control-label">Security Question Answer 2: </label>
                     <div class="col-sm-9">
                        <span>{{ $user->question_ans_2 }}</span> 
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection