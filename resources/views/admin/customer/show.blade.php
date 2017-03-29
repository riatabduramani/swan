@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Customer informations
                    
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
                            <div class="col-md-4">
                            <ul class="list-group">
                              <li class="list-group-item" style="background: #f5f8fa;">
                              <h4 class="text-uppercase">
                                    {{ $customer->user->name }} {{ $customer->user->surname }}
                                </h4>
                                <p>
                                     <small class="label label-default">28.03.2017</small>
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
                            <div class="row">
                              <div class="col-md-12">
                                <h4>INVOICES</h4>
                                <table class="table table-bordered">
                                  <thead>
                                    <tr>
                                      <th>Invoice Nr.</th> 
                                      <th>Type</th>
                                      <th>Date</th>
                                      <th>Total</th>
                                      <th>Status</th>
                                      <th>Method</th>
                                      <th>Actions</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>134628</td>
                                      <td>Packet</td>
                                      <td>28.05.2017</td>
                                      <td>$120.00</td>
                                      <td><label class="label label-success">Paid</label></td>
                                      <td><label>Cash</label></td>
                                      <td>Options</td>
                                    </tr>
                                   </tbody>
                                </table>
                              </div>
                            </div>
                              
                            </div>
                         
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
