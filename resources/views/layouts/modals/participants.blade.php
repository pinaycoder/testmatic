<div class="modal inmodal form-horizontal" id="add-participants-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            @if(isset($project->id))
            <form action="/projects/user/add/{{ $project->id }}" method="POST" class="form-horizontal" id="add-participants-form">
                {{ csrf_field() }}
                <input type="hidden" name="selected_users" id="selected_users"/>
            @else
            <form action="" method="POST" class="form-horizontal" id="add-participants-form">
            @endif
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h6 class="modal-title">Add Test Participant</h6>
                </div>
                <div class="modal-body">
                    <!--<div class="alert alert-info alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        Only available Test Participants are displayed from the selection. Click <a href="{{ url('users/create') }}">here</a> if you want a new user.
                    </div>-->
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Order: </label>
                        <div class="col-sm-2">
                            <input type="text" name="order" id="order" class="form-control"/>
                        </div>
                        <label class="col-sm-5 control-label">Create New Test Participant?: </label>
                        <div class="col-sm-2">
                            <input type="checkbox" name="new_user" id="new_user"/>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group new-participant">
                        <label class="col-sm-3 control-label">*First Name: </label>
                        <div class="col-sm-9">
                            <input type="text" name="first_name" id="first_name" class="form-control  required"/>
                        </div>
                    </div>
                    <div class="hr-line-dashed new-participant"></div>
                    <div class="form-group new-participant">
                        <label class="col-sm-3 control-label">Middle Name: </label>
                        <div class="col-sm-9">
                            <input type="text" name="middle_name" id="middle_name" class="form-control"/>
                        </div>
                    </div>
                    <div class="hr-line-dashed new-participant"></div>
                    <div class="form-group new-participant">
                        <label class="col-sm-3 control-label">*Last Name: </label>
                        <div class="col-sm-9">
                            <input type="text" name="last_name" id="last_name" class="form-control  required"/>
                        </div>
                    </div>
                    <div class="hr-line-dashed new-participant"></div>
                    <div class="form-group new-participant">
                       <label class="col-sm-3 control-label">*Gender: </label>
                       <div class="col-sm-9">
                          <select class="form-control  required" name="gender" id="gender">
                            <option value="">Please select gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                       </div>
                    </div>
                    <div class="hr-line-dashed new-participant"></div>
                    <!--<div class="form-group new-participant">
                        <label class="col-sm-3 control-label">*Birthday</label>
                        <div class="col-sm-9">
                            <div class="input-group date">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="birthdate" name="birthdate" class="form-control  required" value="yyyy-mm-dd">
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed new-participant"></div>-->
                    @if(isset($participants))
                    <div class="form-group old-participant">
                        <label class="col-sm-3 control-label">*Name:</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <select id="name" name="project_users[]" data-placeholder="Select Participants" class="chosen-select   required">
                                    <option></option>
                                    @foreach($participants as $participant)
                                    
                                    <option
                                    data-userid = "{{ $participant->id }}" 
                                    data-email = "{{ $participant->email }}"
                                    data-name ="{{ $participant->last_name . ', ' . $participant->first_name}}" data-userrole ="{{ $participant->role }}" value="{{ $participant->id }}">{{ $participant->last_name . ', ' . $participant->first_name . ' (' . $participant->email . ')' }}</option>
                                    
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="hr-line-dashed 
                    old-participant"></div>
                    @endif
                    <div class="form-group">
                        <label class="col-sm-3 control-label">*Email: </label>
                        <div class="col-sm-9">
                            <input type="text" name="email" id="email" class="form-control  required"/>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">*Status: </label>
                        <div class="col-sm-9">
                            <select class="form-control  required" name="inactive" id="inactive">
                                <option value="0">Active</option>
                                <option value="1">Inactive</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="button" id="add-participants-row-btn" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
