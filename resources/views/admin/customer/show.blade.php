@extends('layouts.app')

@section('content')
    <div class="container">
    @if(Session::has('flash_message'))
          <p class="alert alert-success">{{ Session::get('flash_message') }}</p>
        @endif

        <div class="row">
            <div class="col-md-4">
                            <ul class="list-group">
                              <li class="list-group-item">
                              <h4 class="text-uppercase">
                                    {{ $customer->user->name }} {{ $customer->user->surname }}
                                </h4>
                                <p>
                                     <small class="label label-default">{{ $customer->user->created_at->format('d.m.Y') }}</small>
                                    &nbsp;{!! $customer->user->showStatusOf($customer->user) !!} {!! $customer->user->showConfirmedOf($customer->user) !!}
                                </p>
                            </li>
                              <li class="list-group-item">
                                <i class="fa fa-envelope" aria-hidden="true"></i> <abbr title="E-mail: {{ $customer->user->email }}">{{ $customer->user->email }}</abbr>
                              </li>
                              <li class="list-group-item"><i class="fa fa-phone-square" aria-hidden="true"></i> {{ $customer->phone_in }}</li>
                              <li class="list-group-item"><i class="fa fa-phone-square" aria-hidden="true"></i> {{ $customer->phone_out }}</li>
                              <li class="list-group-item">
                                  <h4>
                                     Packet: <span class="label label-primary">Exclusive</span>
                                 </h4>
                              </li>
                              <li class="list-group-item">
                                 <i class="fa fa-plus-circle" aria-hidden="true"></i> <b>EMERGENCY CONTACT</b><br />
                                    &nbsp;&nbsp;&nbsp;&nbsp;Name: <b>{{ $customer->emergencycontact }}</b><br />
                                    &nbsp;&nbsp;&nbsp;&nbsp;Phone: <b>{{ $customer->emergencyphone }}</b>
                              </li>
                            </ul>

                            </div>

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">CUSTOMER ADDRESS
                    
                     <div class="pull-right">
                        <a href="{{ url('/admin/customer') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/customer/' . $customer->id . '/edit') }}" title="Edit customer"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/customer', $customer->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete customer',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                            <div class="row">
                              <div class="col-md-6">
                                <address>
                                <strong>Contact in Macedonia</strong><br>
                                {{ $customer->address_in }}<br>
                                {{ $customer->district->name }}, {{ $customer->cities->name }}<br>
                                {{ $customer->countryin->name }}<br />
                                <abbr title="Phone">P:</abbr> {{ $customer->phone_in }}
                              </address>
                              </div>
                              <div class="col-md-6">
                                <address>
                                <strong>Contact outside</strong><br>
                                {{ $customer->address_out }}<br>
                                {{ $customer->postal_out }} {{ $customer->city }}, {{ $customer->countryout->name }}<br />
                                <abbr title="Phone">P:</abbr> {{ $customer->phone_out }}
                              </address>
                              </div>
                            </div>
                              
                            </div>
                         
                        </div>

                    </div>
                </div>
  

                <div class="panel panel-default">
                    <div class="panel-heading">INVOICES
                    <div class="pull-right">
                       {!! Form::open(['route' => ['invoice_path']]) !!}
                                    {!! Form::hidden('customer_id', $customer->user->id ) !!}
                                    {!! Form::hidden('invoice_type', 2 ) !!}
                                    {!! Form::button('<i class="fa fa-plus" aria-hidden="true"></i>
 Custom Invoice', array('class' => 'btn btn-primary btn-xs','type'=>'submit')) !!}
                                    {!! Form::close() !!}
                                    </div>
<div class="pull-right" style="margin-right: 10px;">
                      {!! Form::open(['route' => ['invoice_packet_path']]) !!}
                                    {!! Form::hidden('customer_id', $customer->user->id ) !!}
                                    {!! Form::hidden('invoice_type', 1 ) !!}
                                    {!! Form::button('<i class="fa fa-plus" aria-hidden="true"></i>
 Packet Invoice', array('class' => 'btn btn-primary btn-xs','type'=>'submit')) !!}
                                    {!! Form::close() !!}
                    </div>
              </div>
                 <div class="panel-body"> 
                 @if(count($customer->invoice) > 0)             
                                <table class="table table-bordered" id="listinvoice">
                                  <thead>
                                    <tr>
                                      <th>Invoice Nr.</th> 
                                      <th>Type</th>
                                      <th>Date/Time</th>
                                      <th>Total</th>
                                      <th>Status</th>
                                      <th>Method</th>
                                      <th>Actions</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                  @foreach($customer->invoice as $invoice)
                                    <tr>
                                      <td>{{ $invoice->id }}</td>
                                      <td>{!! $invoice->showInvoiceType($invoice) !!}</td>
                                      <td>{{ date('d.m.Y - H:s', strtotime($invoice->invoice_date)) }}</td>
                                      <td>{{ $invoice->total_sum }}</td>
                                      <td>{!! $invoice->showPaidStatus($invoice) !!}</td>
                                      <td>{!! $invoice->showPaidMethod($invoice) !!}</td>
                                      <td>
                                      @if($invoice->invoice_type == 2)
                                        <a href="/admin/invoice/custominvoice/{{$invoice->id}}" class="btn btn-primary btn-xs">
                                          <i class="fa fa-search" aria-hidden="true"></i>
                                        </a>
                                      @else
                                        <a href="/admin/invoice/{{$invoice->id}}" class="btn btn-primary btn-xs">
                                          <i class="fa fa-search" aria-hidden="true"></i>
                                        </a>
                                      @endif

                                      {!! Form::open([
                                        'method'=>'GET',
                                        'url' => ['/admin/customer/invoice', $invoice->id],
                                        'style' => 'display:inline'
                                    ]) !!}
                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                'type' => 'submit',
                                                'class' => 'btn btn-danger btn-xs',
                                                'onclick'=>'return confirm("Are you sure to delete the invoice #'.$invoice->id.'?")'
                                        ))!!}
                                    {!! Form::close() !!}    

                                      </td>
                                    </tr>
                                  @endforeach
                                    
                                   </tbody>
                                </table>
                              @else
                                There is no invoice yet
                              @endif
                 </div>
              </div>

              <!-- TO  DO LIST SECTION -->
              <div class="panel panel-default">
                <div class="panel-heading">TO DO LIST</div>
                <div class="panel-body">   

                </div>
              </div><!--END TO DO LIST -->

               <!-- COMMENTS -->
              <div class="panel panel-default" id="comments">
                <div class="panel-heading">ALL COMMENTS</div>
                <div class="panel-body" style="background: #efefef;">   

                @if(count($customer->comments) > 0)
                @foreach ($customer->comments as $comment)
                   <div class="col-md-12" id="comment-{{$comment->id}}">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <strong>{{ $comment->createdby->name }} {{ $comment->createdby->surname }}</strong> <span class="text-muted">{{ $comment->created_at->format("d.m.y - H:i") }}</span>
                        <div class="pull-right">
                         
                           {!! Form::open([
                            'method'=>'GET',
                            'url' => ['/admin/customer/comment', $comment->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-default btn-xs',
                                    'onclick'=>'return confirm("Are you sure to delete the comment?")'
                            ))!!}
                        {!! Form::close() !!}
                        </div>
                        
                        </div>
                        <div class="panel-body">
                            {{ $comment->body }}
                        </div><!-- /panel-body -->
                    </div><!-- /panel panel-default -->
                </div><!-- /col-sm-5 -->
                @endforeach
                @else 
                  <div class="col-md-12">
            
                        <div class="well">
                           No comments yet...
                        </div>

                  </div>
                @endif
          <div class="col-md-12">
           {!! Form::open(array('method'=>'POST', 'id'=>'frmaddComment', 
              'action'=>'Admin\\CustomerController@storecomment')) !!}
              <div class="form-group">

                  {!! Form::textarea('comment',null,['placeholder'=>'Add a comment...','class' => 'form-control',
                  'rows'=>'2','required']) !!}
                  {!! Form::hidden('customer_id', $customer->id ) !!}
              </div>
              <div class="form-group buttoncomment">
                  {!! Form::submit('Comment',['class'=>'btn btn-primary','id'=>'btn-save']) !!}
              </div>
              {!! Form::close() !!}
                </div>
              </div>
              </div><!--COMMENTS -->

        </div>

    </div>
@endsection

