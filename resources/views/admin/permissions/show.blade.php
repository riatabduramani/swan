@extends('layouts.app')
 
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	Show Permission
                	 <div class="pull-right">
			            <a class="btn btn-primary btn-xs" href="/admin/roles/"><i aria-hidden="true" class="fa fa-times-circle"></i> Cancel</a>
			        </div>
                </div>
                <div class="panel-body">
                	<div class="col-xs-12 col-sm-12 col-md-12">
		            <div class="form-group">
			                <strong>Name:</strong>
			                {{ $permission->display_name }}
			            </div>
			        </div>

			        <div class="col-xs-12 col-sm-12 col-md-12">
			            <div class="form-group">
			                <strong>Description:</strong>
			                {{ $permission->description }}
			            </div>
			        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

