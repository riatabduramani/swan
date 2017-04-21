@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Edit Permission
                	 <div class="pull-right">
			            <a class="btn btn-primary btn-xs" href="/admin/roles/"><i aria-hidden="true" class="fa fa-times-circle"></i> Cancel</a>
			        </div>
                </div>
                <div class="panel-body">
                	
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					{!! Form::model($permission, ['method' => 'PATCH','route' => ['permissions.update', $permission->id]]) !!}
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
				            <div class="form-group">
				                <strong>Name: </strong>{{ $permission->name }}
				            </div>
				        </div>
						<div class="col-xs-12 col-sm-12 col-md-12">
				            <div class="form-group">
				                <strong>Display name:</strong>
				                {!! Form::text('display_name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
				            </div>
				        </div>

				        <div class="col-xs-12 col-sm-12 col-md-12">
				            <div class="form-group">
				                <strong>Description:</strong>
				                {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
				            </div>
				        </div>

				      
				        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
								<button type="submit" class="btn btn-primary">Submit</button>
				        </div>

					</div>
					{!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
