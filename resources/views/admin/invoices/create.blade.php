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
                    {!! Form::open(['url' => '/admin/invoice', 'class' => 'form-horizontal', 'files' => true]) !!}
                        @if($invoicetype==2)
                            @include ('admin.invoices.custominvoice')
                        @endif
                        @if($invoicetype==1)
                            @include ('admin.invoices.packetinvoice')
                        @endif
                    {!! Form::close() !!}
                </div>
               
            </div>
        </div>
    </div>
@endsection
