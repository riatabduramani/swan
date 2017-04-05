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
               <textarea id="description" class="form-control" placeholder="Service description"></textarea>
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
