@extends('layouts.app')

@section('content')
<div class="container">
 @if(Session::has('flash_message'))
          <p class="alert alert-success">{{ Session::get('flash_message') }}</p>
    @elseif(Session::has('flash_error'))
            <p class="alert alert-warning">{{ Session::get('flash_message') }}</p>
  @endif
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background: rgb(4, 105, 154); color: rgb(255, 255, 255);">
                    My profile
                     <div class="pull-right">
                        Since: {{ Auth::user()->created_at->format('d.m.Y') }}
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



                    {!! Form::model($user, ['method' => 'PATCH','url' => ['/admin/profile', Auth::user()->id]]) !!}
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

