@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
               <div class="panel panel-default">
                    <div class="panel-heading" style="background: rgb(4, 105, 154); color: rgb(255, 255, 255);">
                        Edit Credit details ID: {{ $credit->id }} / Customer: {{ $credit->customer->user->name }} {{ $credit->customer->user->surname }}
                        <div class="pull-right">
                            <a href="/admin/customer/{{ $credit->customer_id }}" class="btn btn-primary btn-xs">
                            <i aria-hidden="true" class="fa fa-times-circle"></i> Cancel
                            </a>
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

                        {!! Form::model($credit, [
                            'method' => 'PATCH',
                            'url' => ['/admin/credits', $credit->id],
                            'class' => 'form-horizontal',
                            'files' => true
                        ]) !!}

                        <div class="form-group {{ $errors->has('amount') ? 'has-error' : ''}}">
                            {!! Form::label('amount', 'Amount:', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                <div class="input-group">
                                    {!! Form::text('amount',null,['placeholder'=>"0.00",'class' => 'form-control text-right','required']) !!} 
                                    <div class="input-group-addon">&euro;</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('balance') ? 'has-error' : ''}}">
                            {!! Form::label('balance', 'Balance:', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-4">
                                <div class="input-group">
                                    {!! Form::text('balance',null,['placeholder'=>"0.00",'class' => 'form-control text-right','required']) !!} 
                                    <div class="input-group-addon">&euro;</div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('notes') ? 'has-error' : ''}}">
                            {!! Form::label('notes', 'Notes:', ['class' => 'col-md-4 control-label']) !!}
                            <div class="col-md-6">
                                <div class="input-group">
                                {!! Form::textarea('notes', null, ['class' => 'form-control', 'required','rows'=>'3']) !!}
                                {!! $errors->first('notes', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                        <div class="col-md-offset-5 col-md-4">
                            {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                        </div>
                    </div>
                        {!! Form::hidden('customer_id', $credit->customer_id ) !!}
                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
