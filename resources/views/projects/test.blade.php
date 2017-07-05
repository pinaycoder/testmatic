@extends('layouts.testing')

@section('content')
	@if($component_order == 0)
		@include('layouts.testing-welcome')
	@elseif($component_order > $component_count)
		@include('layouts.testing-complete')
	@elseif($component_order != 0 && $project_component->type == 'Scenario')
		@include('layouts.scenario-component')
	@else
		@include('layouts.question-component')
	@endif
@endsection
