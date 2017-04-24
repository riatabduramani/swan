@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Customer CRM Status #{{ $customerstatus->id }}
                         <div class="pull-right">
                            <a href="{{ url('/admin/potential') }}" title="Cancel"><button class="btn btn-primary btn-xs">
                            <i aria-hidden="true" class="fa fa-times-circle"></i> Cancel</button></a>
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

                        {!! Form::model($customerstatus, [
                            'method' => 'PATCH',
                            'url' => ['/admin/customer-status', $customerstatus->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.customer-status.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
