@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New customer
                    <div class="pull-right">
                    @if(isset($potential))
                        <a href="{{ url('/admin/potential') }}/{{ $potential->id }}" title="Back"><button class="btn btn-primary btn-xs"><i aria-hidden="true" class="fa fa-times-circle"></i> Cancel</button></a>
                    @else
                        <a href="{{ url('/admin/customer') }}" title="Back"><button class="btn btn-primary btn-xs"><i aria-hidden="true" class="fa fa-times-circle"></i> Cancel</button></a>
                    @endif
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

                        {!! Form::open(['url' => '/admin/customer', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('admin.customer.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
