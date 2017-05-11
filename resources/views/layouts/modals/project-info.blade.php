<div class="modal inmodal form-horizontal" id="edit-project-info-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated bounceInRight">
                <form action="/projects/update/{{ $project->id }}" method="POST" class="form-horizontal" id="edit-project-info-form">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h6 class="modal-title">Edit Project Basic Info</h6>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Name:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="name" value="{{ $project->name }}" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Description:</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" rows="5" name="description">{{ $project->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Entry URL:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="entry_url" value="{{ $project->entry_url }}" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Active:</label>
                                <div class="col-lg-4">
                                    <select class="form-control" name="inactive">
                                        <option value="0" {{ ($project->inactive == false ? 'selected' : '') }}>Active</option>
                                        @if($project->status != 'In Progress')
                                        <option value="1" {{ ($project->inactive == true ? 'selected' : '') }}>Inactive</option>
                                        @endif
                                    </select>
                                </div>
                                <label class="col-sm-2 control-label">Status:</label>
                                <div class="col-lg-4">
                                    <select class="form-control" name="status">
                                        <option value="Closed" {{ ($project->status == 'Closed' ? 'selected' : '') }}>Closed</option>
                                        <option value="In Progress" {{ ($project->status == 'In Progress' ? 'selected' : '') }}>In Progress</option>
                                        <option value="Open" {{ ($project->status == 'Open' ? 'selected' : '') }}>Open</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Start Date</label>
                                <div class="col-lg-4">
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="start" name="start" class="form-control" value="{{ $project->start }}">
                                    </div>   
                                </div>
                                
                                <label class="col-sm-2 control-label">End Date</label>
                                <div class="col-lg-4">
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="end" name="end" class="form-control" value="{{ $project->end }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="submit" id="edit-project-info-btn" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>