<div class="row gray-bg testing-welcome jumbotron">
    <div class="col-lg-12">
		<p>Welcome {{ Auth::user()->first_name }}!</p>

		<p>This study will let you experience the website under test from a user's perspective. The entire usability testing should take a maximum of {{ $project->duration }}.</p>

		<p>Thank you and have fun!</p>
	</div>
</div>

<div class="row testing-footer">
    <div class="col-lg-8">
        &nbsp;
    </div>
    <div class="col-lg-2">
        <div class="footer-btn">
            <div>
                <a href="/projects/test/{{ $project->id }}/1" class="btn btn-sm btn-default btn-block">Start Testing Now</a>
            </div>
        </div>
    </div>
    <div class="col-lg-2">
        <div class="footer-btn">
            <div>
                <a href="/projects" class="btn btn-sm btn-default btn-block">Exit</a>
            </div>
        </div>
    </div>       
</div>
