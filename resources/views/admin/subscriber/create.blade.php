@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-offset-3 col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background: rgb(4, 105, 154); color: rgb(255, 255, 255);">Create New Subscriber</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/subscriber') }}" title="Back"><button class="btn btn-primary btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                        {!! Form::open(['url' => '/admin/subscriber', 'class' => 'form-horizontal', 'files' => true]) !!}

                        @include ('admin.subscriber.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
