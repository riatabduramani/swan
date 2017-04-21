@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Permission Management
                	 <div class="pull-right">
			            <a class="btn btn-success btn-xs" href="/admin/permissions/create"> Create New Permission</a>
			        </div>
                </div>
                <div class="panel-body">
                 @if ($message = Session::get('success'))
					<div class="alert alert-success">
						<p>{{ $message }}</p>
					</div>
				@endif
               		<table class="table table-bordered">
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

