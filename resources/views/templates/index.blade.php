@extends('layouts.master')

@section('content')
	@if(isset($success_message) || Session::has('message'))
      @include('layouts.success')
    @endif
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>All Templates</h5>
            <div class="ibox-tools">
                <a href="/templates/create" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> New Template </a>
            </div>
        </div>
        <div class="ibox-content">
       		<div class="row">
                <div class="col-lg-12">
			        <table class="table table-hover dt-tables" >
			        <thead>
			        <tr>
			        	<th>Active?</th>
			            <th>Template</th>
			            <th>Created</th>
			            <th>Options</th>
			        </tr>
			        </thead>
			        <tbody>
			        @foreach($templates as $template)
			        <tr>
			        	<td class="is-active-td"><span class="label {{ ($template->inactive == false ? 'label-primary' : 'label-default') }}">{{ ($template->inactive == false ? 'Active' : 'Inactive') }}</span></td>
			            <td class="table-title">
			            	<a href="/templates/show/{{ $template->id }}" class="text-navy">{{ $template->name }}</a>
			            	<br/>
			            	<small>{{ str_limit($template->description, 100) }}</small>
			            </td>
			            <td class="table-title">
			            	<a href="/users/show/{{ $template->created_by }}" class="text-navy">{{ $template->created_full_name }}</a>
			            	<br/>
			            	<small>{{ $template->created_date }}</small>
			            </td>
			            <td class="center options-td">
			            	@if(Auth::check() && Auth::user()->role != 'Test Participant')
			            	@if($template->inactive == false)
                            <a href="/templates/deactivate/{{ $template->id }}" class="btn btn-danger btn-xs">Deactivate</a>
                            @endif

                            @if($template->inactive == true)
                            <a href="/templates/activate/{{ $template->id }}" class="btn btn-success btn-xs">Activate</a>
                            @endif
                            @endif
			            </td>
			        </tr>
			        @endforeach
			        </tbody>
			        </table>
				</div>
			</div>
		</div>
	</div>
@endsection