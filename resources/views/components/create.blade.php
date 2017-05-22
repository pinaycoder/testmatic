<div class="modal inmodal form-horizontal" id="add-component-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <form action="" method="post" class="form-horizontal" id="add-component-form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h6 class="modal-title">Add Component</h6>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Type:</label>
                        <div class="col-sm-4">
                            <select class="form-control required" name="type" id="type">
                                <option value="">Select type</option>
                                <option value="Question">Question</option>
                                <option value="Scenario">Scenario</option>
                            </select>
                        </div>
                        <label class="col-sm-2 control-label">Order: </label>
                        <div class="col-sm-4">
                            <input type="text" name="order" id="order" class="form-control"/>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Description:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control required" rows="2" name="description" id="description"></textarea>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">HelpText:</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="2" name="help_text" id="help_text"></textarea>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>

                    <div class="form-group question-mandatory">
                        <label class="col-sm-2 control-label">Selections:</label>
                        <div class="col-sm-10">
                            <input type="text" name="selections" id="selections" class="form-control required"/>
                        </div>
                    </div>
                    <div class="hr-line-dashed question-mandatory"></div>

                    <div class="form-group scenario-mandatory">
                        <label class="col-sm-2 control-label">Target:</label>
                        <div class="col-sm-4">
                            <input type="text" name="target" id="target" class="form-control required"/>
                        </div>
                        <label class="col-sm-3 control-label">Time Limit:</label>
                        <div class="col-sm-3">
                            <input type="text" name="time_limit" id="time_limit" class="form-control required"/>
                        </div>
                    </div>
                    <div class="hr-line-dashed scenario-mandatory"></div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="button" id="add-component-row-btn" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
