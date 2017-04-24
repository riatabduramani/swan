@extends('layouts.app')

@section('content')
    <div class="container">
    
     @if(Session::has('flash_message'))
          <p class="alert alert-success">{{ Session::get('flash_message') }}</p>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Potential Customer: #{{ $potential->id }}
                    <div class="pull-right">
                        <a href="{{ url('/admin/potential') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
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
                        @permission('transfer-potential-to-customer')
                        <a href="/admin/potential/tocustomer/{{ $potential->id }}" class="btn btn-primary">
                          <i class="fa fa-exchange" aria-hidden="true"></i> Transfer to customer
                        </a>
                        @endpermission

                        {!! Form::model($potential, [
                            'method' => 'PATCH',
                            'url' => ['/admin/potential', $potential->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        @include ('admin.potential.form', ['submitButtonText' => 'Update'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
