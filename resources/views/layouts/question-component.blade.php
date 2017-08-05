<div class="row gray-bg testing-question-panel jumbotron">
    <div class="col-lg-12">
        <div>
            <p>{{ $project_component->order }}. {{ $project_component->description }}</p>
            <ul class="question-selections-ul">
                @foreach(explode(',', $project_component->selections) as $selection)
                <li class="question-selections-li">
                    <input type="checkbox" class="question-selections-checkbox"/> {{ trim($selection) }}
                </li>
                @endforeach
            </ul>
        </div>
    </div>
 </div>
 <div class="row testing-footer">
    <div class="col-lg-10">
        &nbsp;
    </div>
    <div class="col-lg-2">
        <div class="footer-btn">
            <div>
                <a href="/projects/test/{{$project->id}}/{{$next_order}}" class="btn btn-sm btn-default btn-block" id="question-next-btn">Next</a>
            </div>
        </div>
    </div>
</div>