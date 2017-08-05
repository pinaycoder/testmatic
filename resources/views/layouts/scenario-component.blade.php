<div class="row gray-bg testing-iframe-panel">
    <div class="col-lg-12 iframe-div">
		<iframe id="scenario-iframe" src="{{ $project->entry_url }}" sandbox="allow-forms allow-pointer-lock allow-popups allow-same-origin allow-scripts"></iframe>
	</div>
</div>

<div class="row testing-footer">
    <div class="col-lg-3">
    	<div class="footer-desc" style="text-align: center;">
	        <div class="running-time-div">Running Time:
            <br/>
            ({{ $project_component->time_limit }})
            </div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="footer-desc">
        	<div>
                Scenario: {{ $project_component->description }}
            </div>
        </div>
    </div>
    <div class="col-lg-2">
    	<div class="footer-desc">
	        <button type="button" class="btn btn-sm btn-default btn-block" id="mark_complete">Mark Complete</button>
	        <a href="/projects/test/{{$project->id}}/{{$next_order}}" class="btn btn-sm btn-default btn-block" id="scenario-next-btn">Next</a>
	    </div>
    </div>
</div>