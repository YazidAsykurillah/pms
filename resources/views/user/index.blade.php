@extends('layouts.main')

@section('page_title')
    Users
@endsection

@section('additional_styles')

@endsection


@section('main_content')
	<div class="graphs">
        <h3><i class="lnr lnr-user"></i>&nbsp;Users</h3>
        <div class="panel panel-default">
        	<div class="panel-heading">

        		<h3 class="panel-title">
        			Users List
        		</h3>
        		<div class="pull-right">
        			<a href="{{ url('user/create') }}" class=""><i class="fa fa-plus"></i>&nbsp;Add</a>
        		</div>
        	</div>
        	<div class="panel-body">
        		<div class="table-responsive">
        			<table class="table" id="users-table">
        				<thead>
        					<tr>
        						<th style="width:5%;">#</th>
        						<th>Name</th>
        						<th>Email</th>
        						<th>Role</th>
        						<th style="width:13%;text-align:center;">Action</th>
        					</tr>
        				</thead>
        				<tbody>

        				</tbody>
        			</table>
        		</div>
        	</div>
        </div>
        
    </div>
@endsection


@section('additional_scripts')

	<script type="text/javascript">
		$('#users-table').DataTable({
	        processing: true,
	        serverSide: true,
	        ajax: '{!! route('datatables.getUsers') !!}',
	        columns: [
	            { data: 'rownum', name: 'rownum' },
	            { data: 'name', name: 'name' },
	            { data: 'email', name: 'email' },
	            { data: 'roles', name: 'roles.name' },
	            { data: 'actions', name: 'actions', orderable:false, searchable:false, className:'dt-body-center' },
	        ]
	    });
	</script>

@endsection