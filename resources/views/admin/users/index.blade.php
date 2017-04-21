@extends('layouts.app')
 
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="background: rgb(4, 105, 154); color: rgb(255, 255, 255);">
                	Employee Management
                	 <div class="pull-right">
	            		<a class="btn btn-primary btn-xs" href="{{ route('users.create') }}">
	            		<i class="fa fa-plus" aria-hidden="true"></i> Create New Employee</a>
			        </div>
                </div>
                <div class="panel-body">

                 <div class="row">
			        	{!! Form::open(['method' => 'GET', 'url' => '/admin/users', 'class' => 'navbar-form navbar-left', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" id="searchboxstatus" name="search" placeholder="Search...">
                           
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/users', 'class' => 'navbar-form navbar-left', 'role' => 'search'])  !!}
                        <div class="input-group">
                               
                            {!! Form::select('is_active', ['0'=>'All', '1' => 'Active', 'false' => 'Disabled'],  $filterstatus, ['class' => 'form-control', 'onchange'=>"this.form.submit()"]) !!}
                            <span class="input-group-btn">
                            </span>
                        </div>
                        {!! Form::close() !!}

			       </div>

				<div class="table-responsive">

				<table class="table table-striped table-bordered table-hover">
					<thead>
						<th>#</th>
						<th>Name</th>
						<th>Surname</th>
						<th>Email</th>
						<th>Confirmed</th>
						<th>Status</th>
						<th>Roles</th>
						<th>Registered</th>
						<th width="280px">Action</th>
					</thead>
			@if(count($data) > 0)
				@foreach ($data as $key => $user)
				<tr>
					<td>{{ ++$i }}</td>
					<td>{{ $user->name }} </td>
					<td>{{ $user->surname }} </td>
					<td>{{ $user->email }}</td>
					<td>{!! $user->showConfirmedOf($user) !!}</td>
					<td>{!! $user->showStatusOf($user) !!}</td>
					<td>
						@if(!empty($user->roles))
							@foreach($user->roles as $v)
								<label class="label label-success">{{ $v->display_name }}</label>
							@endforeach
						@endif
					</td>
					
					<td>{{ $user->created_at->format('d/m/Y') }}</td>
					<td> 
												
						<a class="btn btn-primary btn-xs" href="{{ route('users.edit',$user->id) }}"><i aria-hidden="true" class="fa fa-pencil-square-o"></i></a>
						

		             	{!! Form::open([
                            'method'=>'DELETE',
                            'route' => ['users.destroy', $user->id],
                            'style' => 'display:inline',
                            'name' => 'myform',
                            'id' => 'myform',
                            'class'=> 'myform',
                        ]) !!}
                        {!! Form::button('<i aria-hidden="true" class="fa fa-trash-o"></i>', array(
                                'type' => 'submit',
                                'id' => 'delete',
                                'class' => 'btn btn-danger btn-xs',
                                'title' => 'Delete Employee',
                                'onclick'=>'return confirm()'
                        )) !!}
			        	{!! Form::close() !!}
			        	

					</td>
				</tr>
				@endforeach
			@else
			<tr>
				<td colspan="9" class="text-center">There is no registered user</td>
			</tr>
			
			@endif
				</table>
				</div>
				<div class="pagination-wrapper"> {!! $data->appends(['search' => Request::get('search')])->render() !!} </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

