@extends('layouts.app')

@section('content')
    <div class="container">

     @if(Session::has('flash_message'))
          <p class="alert alert-success">{{ Session::get('flash_message') }}</p>
        @endif
        
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background: rgb(4, 105, 154); color: rgb(255, 255, 255);">Create New Potential Customer
                    <div class="pull-right">
                        <a href="{{ url('/admin/potential') }}" title="Cancel"><button class="btn btn-primary btn-xs"><i class="fa fa-times-circle" aria-hidden="true"></i> Cancel</button></a>
                    </div>
                    </div>
                    <div class="panel-body">
                        
                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/potential', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('admin.potential.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
