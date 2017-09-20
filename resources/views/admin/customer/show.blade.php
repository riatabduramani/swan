@extends('layouts.app')

@section('content')
    <div class="container">
    @if(Session::has('flash_message'))
          <p class="alert alert-success">{{ Session::get('flash_message') }}</p>
        @endif

        <div class="row">
            <div class="col-md-4">
                            <ul class="list-group">
                              <li class="list-group-item" style="background: #04699a;color: #fff;">
                              <h4 class="text-uppercase">
                                    {{ $customer->user->name }} {{ $customer->user->surname }}
                                </h4>
                                <p>
                                     <small class="label label-success">{{ $customer->user->created_at->format('d.m.Y') }}</small>
                                    &nbsp;{!! $customer->user->showStatusOf($customer->user) !!} {!! $customer->user->showConfirmedOf($customer->user) !!}
                                </p>
                              @permission('change-customer-login-status')
                              <p>
                                <label class="checkbox-inline">
                                  <input type="checkbox" class="allowlogin" id="{{$customer->user->id}}" data-id="{{$customer->user->id}}" @if ($customer->user->status) checked @endif> Allow login
                                </label>
                              </p>
                              @endpermission
                              {!! Form::open(array('method'=>'POST', 
                                'action'=>'Admin\\CustomerController@generateNewPassword')) !!}
                              {!! Form::hidden('email', $customer->user->email ) !!}
                              {!! Form::button('<i class="fa fa-key" aria-hidden="true"></i> Send new password', array('class' => 'btn btn-default btn-xs','type'=>'submit')) !!}
                              {!! Form::close() !!}
                            </li>
                              <li class="list-group-item">
                                <i class="fa fa-envelope" aria-hidden="true"></i> <abbr title="E-mail: {{ $customer->user->email }}">{{ $customer->user->email }}</abbr>
                              </li>
                              <li class="list-group-item"><i class="fa fa-phone-square" aria-hidden="true"></i> {{ $customer->phone_in }}</li>
                              <li class="list-group-item"><i class="fa fa-phone-square" aria-hidden="true"></i> {{ $customer->phone_out }}</li>
                              <li class="list-group-item" style="background: #ddd">
                                  <h4>
                                     Packet: 
                                     @if(isset($chosenpacket) && $chosenpacket->invoice->payment_status == 1)
                                     
                                        <span class="label label-primary">{{ $chosenpacket->packet->name }}</span>
                                        <br />
                                        <small>(
                                        {{ date('d.m.Y',strtotime($chosenpacket->start)) }} -
                                        {{ date('d.m.Y',strtotime($chosenpacket->end)) }}
                                        )</small>

                                     @foreach($chosenpacketnextpacket as $chosenpacketnext)
                                       @if(isset($chosenpacketnext) && ($chosenpacketnext->invoice_id != $chosenpacket->invoice_id) && $chosenpacketnext->invoice->payment_status == 1)
                                       <br /><br />
                                        <small>Next packet: <b>{{ $chosenpacketnext->packet->name }}</b></small>
                                        <br />
                                         <small>(
                                         {{ date('d.m.Y',strtotime($chosenpacketnext->start)) }} -
                                         {{ date('d.m.Y',strtotime($chosenpacketnext->end)) }}
                                         )</small>
                                       @endif
                                      @endforeach
                                     @else
                                     <span class="label label-warning">NO CHOSEN PACKET</span>
                                     @endif
                                 </h4>
                                 
                              </li>
                              <li class="list-group-item">
                                 <i class="fa fa-plus-circle" aria-hidden="true"></i> <b>EMERGENCY CONTACT</b><br />
                                    &nbsp;&nbsp;&nbsp;&nbsp;Name: <b>{{ $customer->emergencycontact }}</b><br />
                                    &nbsp;&nbsp;&nbsp;&nbsp;Phone: <b>{{ $customer->emergencyphone }}</b>
                              </li>
                            </ul>
             @permission('upload-documents')
                <div class="panel panel-default">
                  <div class="panel-heading"  style="background: #04699a;color: #fff;">
                    <i class="fa fa-paperclip" aria-hidden="true"></i> Attach Document
                  </div>
                  <div class="panel-body">
                      @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li style="margin-left: 10px">{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif

                {!! Form::open(array('method'=>'POST','action' => 'Admin\\CustomerController@attachdocument','files' => true)) !!}
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="file" id="attach" placeholder="Attach" name="attach" class="" required/>
                        </div>
                    </div> 
                    <div class="form-group">
                      <div class="col-md-12" style="margin-top: 10px; margin-bottom: 10px">
                        {!! Form::textarea('doc_description', null, array('placeholder'=>'File description','class' => 'form-control','rows'=>'3')) !!}
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <label>
                        {!! Form::radio('type', 1, true) !!} To Swan
                        </label>
                        <label>
                        {!! Form::radio('type', 2, false) !!} To customer
                        </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        {!! Form::hidden('customer_id', $customer->id ) !!}
                          <button type="submit" id="btnUpload" class="btn btn-primary btn-sm">
                          <i class="fa fa-upload" aria-hidden="true"></i> Upload</button>
                      </div>  
                    </div>    
                  {!! Form::close() !!}
                  </div>
                </div>
              @endpermission
              @permission('view-documents')
               <div class="panel panel-default">
                  <div class="panel-heading"  style="background: #04699a;color: #fff;">
                    <i class="fa fa-file-text-o" aria-hidden="true"></i> Documents for Swan
                  </div>
                  <div class="panel-body">
                    <ul class="panel-body list-group" style="height: 250px; overflow-y: auto;">
                    @if(count($customer->document) > 0)
                    @foreach($customer->document as $document)
                    @if($document->type == 1)
                    <li class="list-group-item">
                     <div class="pull-right">
                        <a href="/public/uploads/documents/{{ $document->renamed }}" target="_blank" class="btn btn-primary btn-xs">
                          <i class="fa fa-download" aria-hidden="true"></i>
                        </a>

                        @if(($document->createdby->id == Auth::user()->id) || Auth::user()->hasRole(['admin','superadmin']))
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/customer/attachdoc', $document->id],
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete document',
                                    'onclick'=>'return confirm("Confirm to delete the document?")'
                            ))!!}
                        {!! Form::close() !!}
                        @endif

                      </div>
                      <a href="/public/uploads/documents/{{ $document->renamed }}" target="_blank">
                          <h4 class="list-group-item-heading">{{ $document->name }}</h4>
                      </a>

                      @if($document->description)
                        <small><b>Description:</b> {{ $document->description }}</small><br />
                      @endif
                      <small><b>Created by:</b> {{ $document->createdby->name }} {{ $document->createdby->surname }}</small>
                    </li>
                    @endif
                    @endforeach
                    @else
                    No documents attached
                      @endif
                    </ul>
                  </div>
                </div>
                @endpermission
                
              @permission('view-documents')
               <div class="panel panel-default">
                  <div class="panel-heading"  style="background: #04699a;color: #fff;">
                    <i class="fa fa-file-text-o" aria-hidden="true"></i> Documents for customer
                  </div>
                  <div class="panel-body">
                    <ul class="panel-body list-group" style="height: 250px; overflow-y: auto;">
                    @if(count($customer->document) > 0)
                    @foreach($customer->document as $document)
                     @if($document->type == 2)
                    <li class="list-group-item">
                     <div class="pull-right">
                        <a href="/public/uploads/documents/{{ $document->renamed }}" target="_blank" class="btn btn-primary btn-xs">
                          <i class="fa fa-download" aria-hidden="true"></i>
                        </a>

                        @if(($document->createdby->id == Auth::user()->id) || Auth::user()->hasRole(['admin','superadmin']))
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/customer/attachdoc', $document->id],
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash" aria-hidden="true"></i>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete document',
                                    'onclick'=>'return confirm("Confirm to delete the document?")'
                            ))!!}
                        {!! Form::close() !!}
                        @endif

                      </div>
                      <a href="/public/uploads/documents/{{ $document->renamed }}" target="_blank">
                          <h4 class="list-group-item-heading">{{ $document->name }}</h4>
                      </a>

                      @if($document->description)
                        <small><b>Description:</b> {{ $document->description }}</small><br />
                      @endif
                      <small><b>Created by:</b> {{ $document->createdby->name }} {{ $document->createdby->surname }}</small>
                    </li>
                    @endif
                    @endforeach
                    @else
                    No documents attached
                      @endif
                    </ul>
                  </div>
                </div>
                @endpermission
            </div>

            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading"  style="background: #04699a;color: #fff;">
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                      CUSTOMER ADDRESS 

                      @if($customer->latitude && $customer->longitude)
                      <br />
                      <a href="http://www.google.com/maps/place/{{ $customer->latitude }}, {{ $customer->longitude }}" class="btn btn-success btn-xs" target="_blank">Show on map</a>
                      @endif

                     <div class="pull-right">
                        <a href="{{ url('/admin/customer') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>

                        @permission('edit-customer')
                        <a href="{{ url('/admin/customer/' . $customer->id . '/edit') }}" title="Edit customer"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        @endpermission
                        @permission('delete-customer')
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
                        @endpermission
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
                              <div class="col-md-6" style="border-left: 1px solid #d3e0e9;">
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
  
@permission('view-listedinvoices')
                <div class="panel panel-default">
                    <div class="panel-heading"  style="background: #04699a;color: #fff;"><i class="fa fa-sticky-note" aria-hidden="true"></i>
 INVOICES
                    @permission('create-custominvoice')
                    <div class="pull-right">
                       {!! Form::open(['route' => ['invoice_path']]) !!}
                                    {!! Form::hidden('customer_email', $customer->user->email ) !!}
                                    {!! Form::hidden('customer_id', $customer->id ) !!}
                                    {!! Form::hidden('invoice_type', 2 ) !!}
                                    {!! Form::button('<i class="fa fa-plus" aria-hidden="true"></i>
 Custom Invoice', array('class' => 'btn btn-primary btn-xs','type'=>'submit')) !!}
                                    {!! Form::close() !!}
                                    </div>
                      @endpermission
                      @permission('create-packetinvoice')
<div class="pull-right" style="margin-right: 10px;">
                      {!! Form::open(['route' => ['invoice_packet_path']]) !!}
                                    {!! Form::hidden('customer_email', $customer->user->email ) !!}
                                    {!! Form::hidden('customer_id', $customer->id ) !!}
                                    {!! Form::hidden('customer_user_id', $customer->user->id ) !!}
                                    {!! Form::hidden('invoice_type', 1 ) !!}
                                    {!! Form::button('<i class="fa fa-plus" aria-hidden="true"></i>
 Packet Invoice', array('class' => 'btn btn-primary btn-xs','type'=>'submit')) !!}
                                    {!! Form::close() !!}
                    </div>
                    @endpermission
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
                                        <a href="/admin/invoice/packetinvoice/{{$invoice->id}}" class="btn btn-primary btn-xs">
                                          <i class="fa fa-search" aria-hidden="true"></i>
                                        </a>
                                      @endif
                                      
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
@endpermission

@permission('manage-credits')
                <div class="panel panel-default">
                    <div class="panel-heading"  style="background: #04699a;color: #fff;">
                    <i class="fa fa-usd" aria-hidden="true"></i>
                        CREDITS
                      <div class="pull-right">
                        <b>Credit Balance:</b> {{ $credit }} &euro;
                      </div>
              </div>
                 <div class="panel-body">
                 <div class="row" id="credits">
                 <div class="col-md-12">
                 
                  {!! Form::open([
                      'route' => 'credits.store'
                  ]) !!}

                        <div class="col-md-6">
                            <div class="form-group">
                              {!! Form::textarea('notes',null,['placeholder'=>'Notes','class' => 'form-control','required','rows'=>'1']) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                           <div class="input-group">
                                {!! Form::text('amount',null,['placeholder'=>"0.00",'class' => 'form-control text-right','required','min'=>'0','pattern'=>'^\d+(?:\.\d{0,2})']) !!} 
                              <div class="input-group-addon">&euro;</div>
                            </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                              {!! Form::hidden('customer_id', $customer->id ) !!}
                              {!! Form::hidden('customer_email', $customer->user->email ) !!}
                              {!! Form::submit('Add credit',['class'=>'btn btn-primary','id'=>'btn-save']) !!}
                          </div>
                        </div>

                  {!! Form::close() !!}
                </div>
                </div>

                 @if(count($customer->credits) > 0)             
                                <table class="table table-bordered" id="listinvoice">
                                  <thead>
                                    <tr>
                                      <th>ID.</th> 
                                      <th>Notes</th>
                                      <th>Amount</th>
                                      <th>Balance</th>
                                      <th>Credit date</th>
                                      <th>Actions</th>
                                    </tr>
                                  </thead>
                                  <tbody>

                                  @foreach($customer->credits as $credit)
                                    <tr>
                                      <td>{{ $credit->id }}</td>
                                      <td>{{ $credit->notes }}</td>
                                      <td>{{ $credit->amount }}</td>
                                      <td 
                                      @if($credit->balance < 0) 
                                        style="color:red" 
                                      @elseif($credit->balance == 0)
                                        style="color:#ecc00c"
                                      @elseif($credit->balance > 0)
                                        style="color:green"
                                      @endif
                                      > 

                                      {{ $credit->balance }}</td>
                                      <td>{{ date('d.m.Y', strtotime($credit->created_at)) }}</td>
                                      <td>

                                      {!! Form::open([
                                          'method'=>'DELETE',
                                          'url' => ['/admin/credits', $credit->id],
                                          'style' => 'display:inline'
                                      ]) !!}
                                          {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                  'type' => 'submit',
                                                  'class' => 'btn btn-danger btn-xs',
                                                  'onclick'=>'return confirm("Are you sure to delete the credit?")'
                                          ))!!}
                                      {!! Form::close() !!}

                                       <a href="{{ route('credits.edit', $credit->id) }}" class="btn btn-primary btn-xs">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                       </a>

                                    </td>
                                    </tr>
                                  @endforeach
                                    
                                   </tbody>
                                </table>
                              @else
                                No credits added!
                              @endif
                 </div>
              </div>
@endpermission
              <!-- TO  DO LIST SECTION -->
              <div class="panel panel-default">
                <div class="panel-heading" style="background: #04699a;color: #fff;">
                <i class="fa fa-calendar-check-o" aria-hidden="true"></i> TO DO LIST
                @permission('create-task')
                <div class="pull-right">
                  <a href="#createtask" class="btn btn-primary btn-xs"><i aria-hidden="true" class="fa fa-plus"></i> Create Task</a>
                </div>
                @endpermission
                </div>
                <div class="panel-body"> 
                <div class="col-md-12">

                @if(count($tasks) > 0)
                  @foreach($tasks as $todolist)
                  <div id="todolist-{{ $todolist->id }}">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <strong>{{ $todolist->title }}</strong>

                           @if($todolist->assigned_to == Auth::user()->id || Auth::user()->hasRole(['admin','superadmin']))
                             <div class="pull-right">
                                {!! Form::open([
                                    'method'=>'GET',
                                    'url' => ['/admin/customer/todolist/done', $todolist->id],
                                    'style' => 'display:inline'
                                ]) !!}
                                    {!! Form::button('<i class="fa fa-check" aria-hidden="true"></i>', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-success btn-xs',
                                            'title' => 'Mark as DONE!',
                                            'onclick'=>'return confirm("Are you sure to mark it as Done?")'
                                    ))!!}
                                {!! Form::close() !!}

                                @if($todolist->repeat != null)
                                 {!! Form::open([
                                    'method'=>'GET',
                                    'url' => ['/admin/customer/todolist/done', $todolist->id],
                                    'style' => 'display:inline'
                                ]) !!}
                                    {{ Form::hidden('norepeat', 'secret') }}
                                    {!! Form::button('<i class="fa fa-check" aria-hidden="true"></i> ! <i class="fa fa-repeat" aria-hidden="true"></i>', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-warning btn-xs',
                                            'title' => 'Mark as DONE and do not Repeat this task!',
                                            'onclick'=>'return confirm("Are you sure to mark it as Done and stop Repeating?")'
                                    ))!!}
                                {!! Form::close() !!}
                                @endif

                              @if($todolist->created_by == Auth::user()->id)
                                {!! Form::open([
                                    'method'=>'GET',
                                    'url' => ['/admin/customer/todolist', $todolist->id],
                                    'style' => 'display:inline'
                                ]) !!}
                                    {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-danger btn-xs',
                                            'onclick'=>'return confirm("Are you sure to delete the task?")'
                                    ))!!}
                                {!! Form::close() !!}
                               @endif
                             </div>
                             @endif


                        </div>
                        <div class="panel-body">
                        <div class="col-md-4">
                          @if(\Carbon\Carbon::now() > $todolist->duedate)
                            <span class="text-muted" style="color: red">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                             {{ date('d.m.Y', strtotime($todolist->duedate)) }}</span> 
                             <br />
                          @else
                          <span class="text-muted">
                          <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                           {{ date('d.m.Y', strtotime($todolist->duedate)) }}</span> 
                           <br />
                          @endif
                          <span class="text-muted">
                              <i class="fa fa-user" aria-hidden="true"></i> 
                              {{ $todolist->assignedto->name}} {{ $todolist->assignedto->surname}}
                          </span>
                        </div>
                        <div class="col-md-8">
                          <div class="well well-sm">
                            {{ $todolist->description }}
                          </div>
                          
                        </div>
                        </div>
                     </div>
                  </div>
                    @endforeach
                  @else
                    <div class="well">No tasks yet</div>
                  @endif
                </div>
                <!-- CREATE TASK -->
                @permission('create-task')
                <div class="col-md-12" id="createtask" >
                     <div class="panel panel-default" style="background: rgb(245, 248, 250)">
                        <div class="panel-heading">
                           <strong><i class="fa fa-plus-square" aria-hidden="true"></i>
                            Create Task</strong>
                        </div>
                        <div class="panel-body">
                         {!! Form::open(array('method'=>'POST', 
                          'action'=>'Admin\\CustomerController@createtask')) !!}
                          <div class="col-md-12">
                            <div class="form-group">
                              {!! Form::text('title',null,['placeholder'=>'Task title','class' => 'form-control','required']) !!}
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                                {!! Form::textarea('description',null,['placeholder'=>'Add task description...','class' => 'form-control','rows'=>'2','required']) !!}
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                            {!! Form::label('duedate', 'Due date:', ['class' => 'control-label']) !!}
                              {!! Form::date('duedate',null,['class' => 'form-control','required']) !!}
                            </div>
                          </div>
                          @role(['admin','superadmin'])
                           <div class="col-md-4">
                            <div class="form-group">
                            {!! Form::label('assign_to', 'Assign to:', ['class' => 'control-label']) !!}
                              {!! Form::select('assign_to',$users, null,['class' => 'form-control']) !!}
                            </div>
                          </div>
                          @endrole
                          <div class="col-md-4">
                            <div class="form-group">
                              {!! Form::label('repeat', 'Repeat every:', ['class' => 'control-label']) !!}
                              {!! Form::select('repeat',array_combine(range(1,30),range(1,30)), null,['placeholder'=>'select...','class' => 'form-control']) !!}
                              <p class="help-block">days</p>
                            </div>
                          </div>
                          <div class="col-md-12">
                          <div class="form-group">
                              {!! Form::hidden('customer_id', $customer->id ) !!}
                              {!! Form::submit('Create Task',['class'=>'btn btn-primary','id'=>'btn-save']) !!}
                          </div>
                           </div>
                          {!! Form::close() !!}
                        </div>
                     </div>
                  </div>
                  @endpermission
                  <!-- END OF CREATE TASK -->
                  <div class="col-md-12">
                    <div class="panel panel-default">
                <div class="panel-heading" style="background: #737373;color: #fff;">
                    <i class="fa fa-history" aria-hidden="true"></i> TASKS HISTORY
                </div>
                <div class="panel-body"> 
                  <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Title</th>
                      <th>Done</th>
                      <th>Due</th>
                    </tr>
                  </thead>
                  @foreach($tasksdone as $task)
                    <tr>
                      <td> 
                          <a href="#task-{{ $task->id }}" data-toggle="collapse" data-target="#task-{{ $task->id }}">{{$task->title}} </a>
                      </td>
                      <td> 
                      @if(!empty($task->datedone))
                        @if($task->datedone < $task->duedate)
                          {{ date('d.m.Y', strtotime($task->datedone)) }} 
                        @else
                          <span style="color: red">{{ date('d.m.Y', strtotime($task->datedone)) }} </span>
                        @endif
                      @endif
                      </td>
                      <td> {{ date('d.m.Y', strtotime($task->duedate)) }} </td>
                    </tr>
                    <tr id="task-{{ $task->id }}" class="collapse" style="background: #f3f3f3">
                      <td colspan="3">
                      <b>Description:</b> {{ $task->description }}<br /><br />
                       @role(['admin','superadmin'])
                      <b>Assigned to:</b>  {{ $task->assignedto->name }} {{ $task->assignedto->surname }}
                      @endrole
                      </td>
                    </tr>
                  @endforeach
                  </table>
                </div>
                </div>
                  </div>
                </div>
              </div><!--END TO DO LIST -->

               <!-- COMMENTS -->
              <div class="panel panel-default" id="comments">
                <div class="panel-heading" style="background: #04699a;color: #fff;"><i class="fa fa-commenting" aria-hidden="true"></i>
 ALL COMMENTS
  @permission('create-comment')
  <div class="pull-right">
    <a href="#createcomment" class="btn btn-primary btn-xs"><i aria-hidden="true" class="fa fa-plus"></i> Add comment</a>
  </div>
  @endpermission
 </div>
                <div class="panel-body" style="background: #efefef;">   
                @if(count($customer->comments) > 0)
                @foreach ($customer->comments as $comment)
                   <div class="col-md-12" id="comment-{{$comment->id}}">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <strong>{{ $comment->created_by }}</strong> <span class="text-muted">{{ $comment->created_at->format("d.m.y - H:i") }}</span>

                        @role(['admin','superadmin'])
                        <div class="pull-right">
                           {!! Form::open([
                            'method'=>'GET',
                            'url' => ['/admin/customer/comment', $comment->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'onclick'=>'return confirm("Are you sure to delete the comment?")'
                            ))!!}
                        {!! Form::close() !!}
                        </div>
                        @endrole

                        @role(['employee'])
                        @if($comment->commented_by == Auth::user()->id )
                          <div class="pull-right">
                             {!! Form::open([
                              'method'=>'GET',
                              'url' => ['/admin/customer/comment', $comment->id],
                              'style' => 'display:inline'
                          ]) !!}
                              {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                      'type' => 'submit',
                                      'class' => 'btn btn-danger btn-xs',
                                      'onclick'=>'return confirm("Are you sure to delete the comment?")'
                              ))!!}
                          {!! Form::close() !!}
                          </div>
                          @endif
                        @endrole
                        
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
          @permission('create-comment')
              <div class="col-md-12" id="createcomment">
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
            @endpermission
              </div>
              </div><!--COMMENTS -->

        </div>

    </div>
@endsection

