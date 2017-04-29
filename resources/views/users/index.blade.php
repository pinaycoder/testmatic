@extends('layouts.master')

@section('content')
<div class="wrapper wrapper-content animated fadeInUp">
	@if(isset($success_message))
      @include('layouts.success')
   @endif
    <div class="ibox">
        <div class="ibox-title">
            <h5>All Users</h5>
            <div class="ibox-tools">
                <a href="/users/create" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> New User </a>
            </div>
        </div>
        <div class="ibox-content">
       		<div class="row">
                <div class="col-lg-12">
			        <table class="table table-hover dt-tables" >
			        <thead>
			        <tr>
			        	<th>Status</th>
			            <th>Username</th>
			            <th>Name</th>
			            <th>Email</th>
			            <th>Role</th>
			            <th>Actions</th>
			        </tr>
			        </thead>
			        <tbody>
			        @foreach($users as $user)
			        <tr>
			        	<td class="is-active-td"><span class="label {{ ($user->inactive == false ? 'label-primary' : 'label-default') }}">{{ ($user->inactive == false ? 'Active' : 'Inactive') }}</span></td>
			        	<td>
			            	{{ $user->username }}
			            </td>
			            <td class="table-title">
			            	<a href="/users/show/{{ $user->id }}">{{ $user->first_name . ' ' . $user->last_name  }}</a>
			            	<br/>
			            	<!--<small>{{ $user->email }}</small>-->
			            </td>
			            <td>
			            	{{ $user->email }}
			            </td>
			            <td>
			            	{{ $user->role }}
			            </td>
			            <td class="center options-td">
			            	<!--<a href="/users/show/{{ $user->id }}" class="btn btn-info btn-xs option-buttons"><i class="fa fa-folder"></i> View </a>-->
			            	<a href="/users/edit/{{ $user->id }}" class="btn btn-white btn-xs option-buttons"><i class="fa fa-pencil"></i> Edit </a>
			            	<a href="/users/delete/{{ $user->id }}" class="btn btn-danger btn-xs option-buttons"><i class="fa fa-trash"></i> Delete </a>
			            </td>
			        </tr>
			        @endforeach
			        </tbody>
			        </table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection