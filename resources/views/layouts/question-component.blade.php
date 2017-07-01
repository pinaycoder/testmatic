<div class="row gray-bg testing-main-panel">
    <div class="col-lg-12">
        <div>
            <span>{{ $project_component->order }}. {{ $project_component->description }}</span>
            <ul class="question-selections-ul">
                @foreach(explode(',', $project_component->selections) as $selection)
                <li class="question-selections-li">
                    <input type="checkbox"/> {{ trim($selection) }}
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
        <a href="/projects/test/{{$project->id}}/{{$next_order}}" class="btn btn-sm btn-default btn-block">Next</a>
    </div>
</div>