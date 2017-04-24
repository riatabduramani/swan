@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background: rgb(4, 105, 154); color: rgb(255, 255, 255);">
                    Edit Employee
                     <div class="pull-right">
                        <a class="btn btn-primary btn-xs" href="{{ route('users.index') }}">
                        <i aria-hidden="true" class="fa fa-times-circle"></i> 
                        Cancel</a>
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

                    {!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
                     <div class="row">
                        <div class="col-md-12">
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                               
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">

                                {!! Form::text('surname', null, array('placeholder' => 'Surname','class' => 'form-control')) !!}
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 10px;">

                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                
                                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                            </div>

                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6">
                            <div class="form-group">
                                {!! Form::text('phone', null, array('placeholder' => 'Phone','class' => 'form-control')) !!}
                            </div>

                        </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 10px;">
                        <div class="col-xs-12 col-sm-12 col-md-5">
                            <div class="form-group">
                                
                                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-5">
                            <div class="form-group">
                                
                                {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
                            </div>
                        </div>
                        </div>
                        <div class="col-md-12" style="margin-top: 30px; margin-bottom: 30px; background: rgb(245, 248, 250); padding: 10px;">
                        <div class="col-xs-12 col-sm-12 col-md-4">
                            <div class="form-group">
                                <strong>Role:</strong>
                                {!! Form::select('roles', $roles, $userRole, array('class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-2">
                            <div class="form-group">
                                <strong>Confirmed:</strong>
                                {!! Form::select('confirmed', array('1'=>'Yes', '2'=>'No'),$user->confirmed, array('class' => 'form-control')) !!}
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-2">
                            <div class="form-group">
                                <strong>Status:</strong>
                                {!! Form::select('status', array('1'=>'Active', '2'=>'Disabled'),$user->status, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                        </div>
                       

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>

                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

