<div class="modal inmodal form-horizontal" id="edit-template-info-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content animated bounceInRight">
                <form action="/templates/update/{{ $template->id }}" method="POST" class="form-horizontal" id="edit-template-info-form">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h6 class="modal-title">Edit Template Basic Info</h6>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Name:</label>
                                <div class="col-lg-10">
                                    <input type="text" name="name" value="{{ $template->name }}" class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Description:</label>
                                <div class="col-lg-10">
                                    <textarea class="form-control" rows="5" name="description">{{ $template->description }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Entry URL:</label>
                                <div class="col-lg-4">
                                    <input type="text" name="entry_url" value="{{ $template->entry_url }}" class="form-control"/>
                                </div>
                                <label class="col-sm-2 control-label">Active:</label>
                                <div class="col-lg-4">
                                    <select class="form-control" name="inactive">
                                        <option value="0" {{ ($template->inactive == false ? 'selected' : '') }}>Active</option>
                                        @if($template->status != 'In Progress')
                                        <option value="1" {{ ($template->inactive == true ? 'selected' : '') }}>Inactive</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                        <button type="submit" id="edit-template-info-btn" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>