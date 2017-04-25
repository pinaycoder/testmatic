@extends('layouts.master')

@section('content')
	
	<button type="button" class="btn btn-primary pull-right">New Project</button>
	
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>All Test Projects</h5>
        </div>
        <div class="ibox-content">
       		<div class="row">
                <div class="col-lg-12">
			        <table class="table table-striped table-bordered table-hover dataTables-example" >
			        <thead>
			        <tr>
			            <th>Test Template Name</th>
			            <th>Description</th>
			            <th>Created By</th>
			            <th>Date Created</th>
			            <th>Last Modified</th>
			            <th>Options</th>
			        </tr>
			        </thead>
			        <tbody>
			        <tr>
			            <td>Trident</td>
			            <td>Internet
			                Explorer 4.0
			            </td>
			            <td>Win 95+</td>
			            <td class="center">4</td>
			            <td class="center">X</td>
			            <td class="center">X</td>
			        </tr>
			        
			        </tbody>
			        <tfoot>
			        <tr>
			            <th>Test Template Name</th>
			            <th>Description</th>
			            <th>Created By</th>
			            <th>Date Created</th>
			            <th>Last Modified</th>
			            <th>Options</th>
			        </tr>
			        </tfoot>
			        </table>
				</div>
			</div>
		</div>
	</div>
@endsection