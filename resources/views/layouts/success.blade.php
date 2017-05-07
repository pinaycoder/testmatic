<div class="alert alert-success alert-dismissable">
	<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
	

	@if(isset($success_message))
		{!! $success_message !!}
	@endif

	@if(Session::has('message'))
		{!! Session::get('message') !!}
	@endif
</div>