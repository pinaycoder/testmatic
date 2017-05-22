@extends('layouts.master')

@section('content')

<div class="wrapper wrapper-content animated fadeInUp">
   @if(isset($success_message) || Session::has('message'))
      @include('layouts.success')
   @endif
   @if(count($errors->all()) > 0)
      @include('layouts.errors')
   @endif
   <form action='/users/update/{{ $user->id }}'method="post" class="form-horizontal">
         {{ csrf_field() }} 
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
                        <dt><span class="required-span">*</span>Role:</dt>
                        <dd>
                           <select class="form-control" name="role" required>
                            <option value="Super Administrator" {{ ($user->role == 'Super Administrator' ? 'selected' : '') }}>Super Administrator</option>
                            <option value="Test Administrator" {{ ($user->role == 'Test Administrator' ? 'selected' : '') }}>Test Administrator</option>
                            <option value="Test Participant" {{ ($user->role == 'Test Participant' ? 'selected' : '') }}>Test Participant</option>
                        </select>
                        </dd>
                     </dl>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-6">
                     <dl class="dl-horizontal  user-details-dl">
                        <dt><span class="required-span">*</span>Email:</dt>
                        <dd>
                           <input type="text" name="email" required value="{{ $user->email }}" class="form-control"/>
                        </dd>
                     </dl>
                  </div>
                  <div class="col-lg-6">
                     <dl class="dl-horizontal  user-details-dl">
                        <dt>Status:</dt>
                        <dd>
                           <select class="form-control" name="inactive">
                                <option value="0" {{ ($user->inactive == false ? 'selected' : '') }}>Active</option>
                                <option value="1" {{ ($user->inactive == true ? 'selected' : '') }}>Inactive</option>
                            </select>
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
                  <div class="row">
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="col-sm-3 control-label">First Name: </label>
                           <div class="col-sm-9">
                              <input type="text" name="first_name" value="{{ $user->first_name }}" class="form-control"/>
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                           <label class="col-sm-3 control-label">Middle Name: </label>
                           <div class="col-sm-9">
                              <input type="text" name="middle_name" value="{{ $user->middle_name }}" class="form-control"/>
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                           <label class="col-sm-3 control-label">Last Name: </label>
                           <div class="col-sm-9">
                              <input type="text" name="last_name" value="{{ $user->last_name }}" class="form-control"/>
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                     </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                           <label class="col-sm-3 control-label">Gender: </label>
                           <div class="col-sm-9">
                              <select class="form-control" name="gender">
                                <option value="Male" {{ ($user->gender == 'Male' ? 'selected' : '') }}>Male</option>
                                <option value="Female" {{ ($user->gender == 'Female' ? 'selected' : '') }}>Female</option>
                            </select>
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                           <label class="col-sm-3 control-label">Contact Num: </label>
                           <div class="col-sm-9">
                              <input type="text" name="contact_num" value="{{ $user->contact_num}}" class="form-control"/>
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group">
                           <label class="col-sm-3 control-label">Birthday: </label>
                           <div class="col-sm-9">
                              <input type="text" name="birthdate" value="{{ $user->birthdate }}" class="form-control"/>
                           </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                     </div>
                  </div>
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
                  <div class="form-group">
                     <label class="col-sm-3 control-label">Security Question 1: </label>
                     <div class="col-sm-9">
                        <select class="form-control" name="question_id_1">
                           @foreach($security_questions as $security_question)
                             <option value="{{ $security_question->id }}" {{ ($user->question_id_1 == $security_question->id ? 'selected' : '') }}>{{ $security_question->question }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <label class="col-sm-3 control-label">Security Question 1 Answer: </label>
                     <div class="col-sm-9">
                     <input type="text" name="question_ans_1" value="{{ $user->question_ans_1 }}" class="form-control"/>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <label class="col-sm-3 control-label">Security Question 2: </label>
                     <div class="col-sm-9">
                        <select class="form-control" name="question_id_2">
                           @foreach($security_questions as $security_question)
                             <option value="{{ $security_question->id }}" {{ ($user->question_id_2 == $security_question->id ? 'selected' : '') }}>{{ $security_question->question }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
                  <div class="form-group">
                     <label class="col-sm-3 control-label">Security Question Answer 2: </label>
                     <div class="col-sm-9">
                        <input type="text" name="question_ans_2" value="{{ $user->question_ans_2 }}" class="form-control"/>
                     </div>
                  </div>
                  <div class="hr-line-dashed"></div>
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
@endsection