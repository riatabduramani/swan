@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="background: rgb(4, 105, 154); color: rgb(255, 255, 255);">
                	Role Management
                	 <div class="pull-right">
			            <a class="btn btn-primary btn-xs" href="/admin/roles/create"><i aria-hidden="true" class="fa fa-plus"></i> Create New Role</a>
			        </div>
                </div>
                <div class="panel-body">
                 @if ($message = Session::get('success'))
					<div class="alert alert-success">
						<p>{{ $message }}</p>
					</div>
				@endif
               		<table class="table table-bordered table-striped">
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Display Name</th>
							<th>Description</th>
							<th width="280px">Action</th>
						</tr>
					@foreach ($roles as $key => $role)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $role->name }}</td>
						<td>{{ $role->display_name }}</td>
						<td>{{ $role->description }}</td>
						<td>
							<a class="btn btn-info btn-xs" href="{{ route('roles.show',$role->id) }}">Show</a>
							
							<a class="btn btn-primary btn-xs" href="/admin/roles/{{ $role->id }}/edit">Edit</a>
							

							
							{!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
				            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
				        	{!! Form::close() !!}
				        	
						</td>
					</tr>
					@endforeach
					</table>

					{!! $roles->render() !!}
                </div>
            </div>
        </div>

<div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="background: rgb(4, 105, 154); color: rgb(255, 255, 255);">
                	Permission Management
                	 <div class="pull-right">
		            	<a class="btn btn-primary btn-xs" href="/admin/permissions/create"><i aria-hidden="true" class="fa fa-plus"></i> Create Permission</a>
			        </div>
                </div>
                <div class="panel-body">
                 @if ($message = Session::get('permission_success'))
					<div class="alert alert-success">
						<p>{{ $message }}</p>
					</div>
				@endif
               		<table class="table table-bordered table-striped">
						<tr>
							<th>No</th>
							<th>Name</th>
							<th>Display Name</th>
							<th>Description</th>
							<th width="280px">Action</th>
						</tr>
					@foreach ($permissions as $key => $permission)
					<tr>
						<td>{{ ++$i }}</td>
						<td>{{ $permission->name }}</td>
						<td>{{ $permission->display_name }}</td>
						<td>{{ $permission->description }}</td>
						<td>
							<a class="btn btn-info btn-xs" href="{{ route('permissions.show',$permission->id) }}">Show</a>
							
							<a class="btn btn-primary btn-xs" href="/admin/permissions/{{ $permission->id }}/edit">Edit</a>
							

							
							{!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
				            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs']) !!}
				        	{!! Form::close() !!}
				        	
						</td>
					</tr>
					@endforeach
					</table>

					{!! $permissions->render() !!}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

