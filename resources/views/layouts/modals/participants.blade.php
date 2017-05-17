<form action="/projects/user/add/{{ $project->id }}" method="POST" class="form-horizontal" id="add-participants-form">
{{ csrf_field() }}
<input type="hidden" name="selected_users" id="selected_users"/>
    <div class="modal inmodal form-horizontal" id="add-participants-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h6 class="modal-title">Add Test Participants</h6>
                </div>
                <div class="modal-body">
                    <div class="alert alert-info alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        Only available Test Participants are displayed from the selection. Click <a href="{{ url('users/create') }}">here</a> if you want a new user.
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Available Users:</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <select name="project_users[]"data-placeholder="Select Participants" class="chosen-select" multiple tabindex="4">
                                    @foreach($participants as $participant)
                                    
                                    <option value="{{ $participant->id }}">{{ $participant->first_name . ' ' . $participant->last_name . ' <' . $participant->email . '>' }}</option>
                                    
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="button" id="add-participants-row-btn" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>
</form>