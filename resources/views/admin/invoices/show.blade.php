@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                            <ul class="list-group">
                              <li class="list-group-item" style="background: #04699a;color: #fff;">
                              <h4 class="text-uppercase">
                                  {{ $invoice->customer->user->name }} {{ $invoice->customer->user->surname }}
                                </h4>
                                <p>
                                     <small class="label label-success">{{ $invoice->customer->user->created_at->format('d.m.Y') }}</small>
                                    &nbsp;{!! $invoice->customer->user->showStatusOf($invoice->customer->user) !!} {!! $invoice->customer->user->showConfirmedOf($invoice->customer->user) !!}
                                </p>
                            </li>
                              <li class="list-group-item">
                                <i class="fa fa-envelope" aria-hidden="true"></i> <abbr title="E-mail: {{ $invoice->customer->user->email }}">{{ $invoice->customer->user->email }}</abbr>
                              </li>
                              <li class="list-group-item"><i class="fa fa-phone-square" aria-hidden="true"></i> {{ $invoice->customer->phone_in }}</li>
                              <li class="list-group-item"><i class="fa fa-phone-square" aria-hidden="true"></i> {{ $invoice->customer->phone_out }}</li>

                              <li class="list-group-item">
                                 <i class="fa fa-plus-circle" aria-hidden="true"></i> <b>EMERGENCY CONTACT</b><br />
                                    &nbsp;&nbsp;&nbsp;&nbsp;Name: <b>{{ $invoice->customer->emergencycontact }}</b><br />
                                    &nbsp;&nbsp;&nbsp;&nbsp;Phone: <b>{{ $invoice->customer->emergencyphone }}</b>
                              </li>
                            </ul>

                            </div>

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background: #04699a;color: #fff;">Invoice view
                        <div class="pull-right">
                            <a href="{{ url('/admin/customer/' . $invoice->customer->id) }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button>
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                Invoice date: {{ date('d.m.Y', strtotime($invoice->invoice_date)) }} <br />
                                Status: {!! $invoice->showPaidStatus($invoice) !!}<br />
                                @if($invoice->payment_status == 2)
                                Due date: {{ date('d.m.Y ', strtotime($invoice->due_date)) }}<br />
                                @endif
                                @if($invoice->payment_status == 1)
                                    Payment method: {!! $invoice->showPaidMethod($invoice) !!}<br />
                                    Paid at: {{ date('d.m.Y - H:s', strtotime($invoice->paid_at)) }}<br />
                                @endif
                                @if($invoice->payment_status == 3)
                                   Declined at: {{ date('d.m.Y - H:s', strtotime($invoice->declined_at)) }}<br />
                                @endif
                            </div>
                            
                        </div>
                      <h2>Invoice#: {{ $invoice->id }}<small>/{{ date('Y', strtotime($invoice->invoice_date)) }}</small></h2>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="active">
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th class="text-center">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> {{ $invoice->customservice->name }} </td>
                                        <td> {{ $invoice->customservice->description }} </td>
                                        <td class="text-right"> {{ $invoice->total_sum }} </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="text-right" style="border-bottom: 1px solid #fff;border-left: 1px solid #fff;"><b>Total:</b></td>
                                        <td class="text-right"><b>{{ $invoice->total_sum }}</b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                        @if($invoice->payment_status == 1)
                            <div class="col-md-6">
                                <div class="well">
                                    <b>Notes:</b> <br />
                                   
                                   {{$invoice->description}}
                                  
                                </div>
                            </div>
                        @endif
                         @if($invoice->payment_status != 1)
                            {!! Form::open(['route' => ['invoice_update']]) !!}
                           
                            <div class="col-md-6">
                                <div class="well">
                                    <b>Notes:</b> <br />
                                   
                                    {!! Form::textarea('notes',(count($invoice->description)>0) ? $invoice->description : '',['placeholder'=>'Add a note...','class' => 'form-control',
                  'rows'=>'2']) !!}
                                  
                                </div>
                            </div>
                      
                            <div class="col-md-6">
                           
                                <div class="form-group {{ $errors->has('invoice_status') ? 'has-error' : ''}}">
                                    <div class="col-md-12">
                                    {!! Form::label('invoice_status', 'Invoice status:', ['class' => 'col-md-6 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::select('invoice_status', config('app.invoicestatus'), null, ['class' => 'form-control','placeholder'=>'Select...','onchange'=>"enable()"]) !!}
                                        {!! $errors->first('invoice_status', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    </div>
                                </div>
                                <div id="payment_method_opt" style="display:none;" class="form-group {{ $errors->has('payment_method') ? 'has-error' : ''}}">
                                    <div class="col-md-12" style=" margin-top: 10px;">
                                    {!! Form::label('payment_method', 'Payment method:', ['class' => 'col-md-6 control-label']) !!}
                                    <div class="col-md-6">
                                        {!! Form::select('payment_method', config('app.paymentmenthod'), null, ['class' => 'form-control']) !!}
                                        {!! $errors->first('payment_method', '<p class="help-block">:message</p>') !!}
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group update">
                                  {!! Form::hidden('invoice_id', $invoice->id ) !!}
                                    <div class="col-md-12 text-right" style="margin-top: 10px;padding-right: 31px;">
                                        <button class="btn btn-primary" type="submit"><i class="fa fa-pencil-square" aria-hidden="true"></i>
 Update</button>
                                    </div>
                                </div>
                                
                              @endif
                              
                                
                            </div>
                            @if($invoice->payment_status == 1)
                                <div class="col-md-12">
                                    
            <button class="btn btn-primary"><i class="fa fa-file-pdf-o" aria-hidden="true"></i> Download Invoice</button>
                             
                            </div>
                            @endif
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
