@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <ul class="list-group">
                              <li class="list-group-item">
                              <h4 class="text-uppercase">
                                    {{ $user->name }} {{ $user->surname }}<br/>
                                </h4>
                                <p>
                                     <small class="label label-default">{{ $user->created_at->format('d.m.Y') }}</small>
                                    &nbsp;{!! $user->showStatusOf($user) !!} {!! $user->showConfirmedOf($user) !!}
                                   
                                </p>
                            </li>
                              <li class="list-group-item">
                                <i class="fa fa-envelope" aria-hidden="true"></i> <abbr title="E-mail: {{ $user->email }}">{{ $user->email }}</abbr>
                              </li>
                              <li class="list-group-item"><i class="fa fa-phone-square" aria-hidden="true"></i> {{ $user->customer->phone_in }}</li>
                              <li class="list-group-item"><i class="fa fa-phone-square" aria-hidden="true"></i> {{ $user->customer->phone_out }}</li>
                              <li class="list-group-item">
                                  <h4>
                                     Packet: <span class="label label-primary">Exclusive</span>
                                 </h4>
                              </li>
                            </ul>
                    </div>
              <!--{!! Form::open(['url' => '/admin/invoice/packetinvoice', 'class' => 'form-horizontal', 'files' => true]) !!} -->
              {!! Form::open(array('method'=>'POST', 'id'=>'frmPacketInvoice', 'action'=>'Admin\\InvoiceController@storePacketInvoice', 'class' => 'form-horizontal')) !!}

                        <div class="col-md-8">
                             <div class="panel panel-default">
                                <div class="panel-heading">
                                    Create Invoice #
                                </div>
                                <div class="panel-body">
                              
                                <div class="col-md-12">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <h4>Invoice Description</h4>
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('packets') ? 'has-error' : ''}}">
                                        <div class="col-md-12">
                                            {!! Form::select('packets', $packets, null, ['class' => 'form-control','placeholder'=>'Select the packet...','id'=>'packets', 'required']) !!}
                                            {!! $errors->first('packets', '<p class="help-block">:message</p>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('service_description') ? 'has-error' : ''}}">
                                        <div class="col-md-12" style="margin-top:10px">
                                           <textarea id="service_description" class="form-control" placeholder="Service description" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <h4>Price</h4>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                            <div class="col-md-12" id="price">
                                                
                                            </div>
                                        </div>
                                    <div class="form-group {{ $errors->has('service_price') ? 'has-error' : ''}}">
                                            <div class="col-md-12" id="total_price">                                            
                                            </div>
                                        </div>
                                </div>
                                </div><!-- END COL-MD-12-->

                                </div><!--END BODY-->
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                          <div class="col-md-12 well well-sm" style="margin-top: 10px">
                                            <div class="col-md-6" style="margin-top: 10px">
                                                <div class="form-group {{ $errors->has('service_note') ? 'has-error' : ''}}">
                                                    <div class="col-md-12">
                                                        {!! Form::textarea('service_note', null, ['class' => 'form-control','placeholder'=>'Notes','rows'=>'4']) !!}
                                                        {!! $errors->first('service_note', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                </div>
                                            </div>
                                           <div class="col-md-6">
                                                <div class="form-group {{ $errors->has('invoice_status') ? 'has-error' : ''}}">
                                                    <div class="col-md-12">
                                                    {!! Form::label('invoice_status', 'Invoice status:', ['class' => 'col-md-6 control-label']) !!}
                                                    <div class="col-md-6">
                                                        {!! Form::select('invoice_status', config('app.invoicestatus'), null, ['class' => 'form-control','placeholder'=>'Select...','onchange'=>"enable()", 'required']) !!}
                                                        {!! $errors->first('invoice_status', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                    </div>
                                                </div>
                                                <div id="payment_method_opt" style="display:none" class="form-group {{ $errors->has('payment_method') ? 'has-error' : ''}}">
                                                    <div class="col-md-12">
                                                    {!! Form::label('payment_method', 'Payment method:', ['class' => 'col-md-6 control-label']) !!}
                                                    <div class="col-md-6">
                                                        {!! Form::select('payment_method', config('app.paymentmenthod'), null, ['class' => 'form-control']) !!}
                                                        {!! $errors->first('payment_method', '<p class="help-block">:message</p>') !!}
                                                    </div>
                                                    </div>
                                                </div>
                                                 <div class="form-group" id="due_date_opt" style="display:none">
                                                     <div class="col-md-12">
                                                     {!! Form::label('duedate', 'Due date:', ['class' => 'col-md-6 control-label']) !!}
                                                     
                                                        <div class="col-md-6">
                                                             {!! Form::text('duedate', $duedate->format('d.m.Y'), ['class' => 'form-control text-center']) !!}
                                                        </div>
                                                     </div>
                                                    
                                                </div>
                                           </div>
                                        </div>
                                        <div class="col-md-12">
                                         <div class="col-md-6">
                                                  <div class="form-group">
                                                    <div class="col-md-12" style="margin-top: 10px">
                                                        {!! Form::hidden('invoice_type', 1 ) !!}
                                                        {!! Form::hidden('customer_id', $user->customer->id ) !!}
                                                        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create Invoice', ['class' => 'btn btn-primary']) !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                            

                            {!! Form::close() !!}
                </div>
               
            </div>
        </div>
    </div>
@endsection
