<div class="row gray-bg testing-main-panel">
    <div class="col-lg-12 iframe-div">
		<iframe src="{{ $project->entry_url }}" sandbox="allow-forms allow-pointer-lock allow-popups allow-same-origin allow-scripts allow-top-navigations"></iframe>
	</div>
</div>

<div class="row testing-footer">
    <div class="col-lg-3">
    	<div class="footer-desc align-middle">
	        <div>Running Time Display</div>
	        <div>({{ $project_component->time_limit }})</div>
        </div>
    </div>
    <div class="col-lg-7">
        <div class="footer-desc align-middle">
        	Scenario: {{ $project_component->description }}
        </div>
    </div>
    <div class="col-lg-2">
    	<div class="footer-desc">
	        <button type="button" class="btn btn-sm btn-default btn-block">Mark Complete</button>
	        <a href="/projects/test/{{$project->id}}/{{$next_order}}" class="btn btn-sm btn-default btn-block">Next</a>
	    </div>
    </div>
</div>