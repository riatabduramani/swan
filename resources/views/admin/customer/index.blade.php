@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background: rgb(4, 105, 154); color: rgb(255, 255, 255);">
                        Customers
                    @permission('create-customer')
                    <div class="pull-right">
                        <a href="{{ url('/admin/customer/create') }}" class="btn btn-primary btn-xs" title="Add New customer">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    </div>
                    @endpermission
                    </div>
                    <div class="panel-body">

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/customer', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search...">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}
                       
                        {!! Form::open(['method' => 'GET', 'url' => '/admin/customer', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="form-group">
                            {!! Form::select('confirmed', [ 0 => 'All confirmes', 1 =>'Yes', 'false' =>'No'], $confirmed, ['class' => 'form-control required','onchange'=>"this.form.submit()"]) !!}
                        </div>
                        {!! Form::close() !!}

                         {!! Form::open(['method' => 'GET', 'url' => '/admin/customer', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                        <div class="form-group">
                            {!! Form::select('status', [ 0 => 'All statuses', 1 =>'Active', 'false' =>'Disabled'], $status, ['class' => 'form-control required','onchange'=>"this.form.submit()"]) !!}
                        </div>
                        {!! Form::close() !!}

                     
                        <div class="table-responsive" style="clear:both;">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Email</th>
                                        <th>Phone Out</th>
                                        <th>Status</th>
                                        <th>Confirmed</th>
                                        <th>Created By</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($customer) > 0)
                                @foreach($customer as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->user->name }}
                                        </td>
                                        <td>{{ $item->user->surname }}</td>
                                        <td>{{ $item->user->email }}</td>
                                        <td>{{ $item->phone_out }}</td>
                                        <td>{!! $item->user->showStatusOf($item->user) !!}</td>
                                        <td>{!! $item->user->showConfirmedOf($item->user) !!}</td>
                                        <td>{{ $item->created_by}}</td>
                                        <td>

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                Options <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                @permission('view-customer')

                                                <li>
                                                    <a href="{{ url('/admin/customer/' . $item->id) }}" title="View customer">
                                                        <i class="fa fa-search"></i> View
                                                    </a>
                                                </li>
                                                @endpermission
                                                @permission('edit-customer')
                                                <li>
                                                    <a href="{{ url('/admin/customer/' . $item->id . '/edit') }}" title="Edit customer">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                </li>
                                                @endpermission
                                                @permission('create-custominvoice')
                                                <li>
                                                <a>
                                                {!! Form::open(['route' => ['invoice_path']]) !!}
                                                    {!! Form::hidden('customer_id', $item->id ) !!}
                                                    {!! Form::hidden('invoice_type', 2 ) !!}
                                                    {!! Form::button('<i class="fa fa-external-link" aria-hidden="true"></i>
                                                        Custom Invoice', array('style' => 'border: none;background: none;padding: 0;', 'type'=>'submit')) !!}
                                                    {!! Form::close() !!}

                                                </a>
                                                </li>
                                                @endpermission
                                                @permission('create-packetinvoice')
                                                <li>
                                                <a>
                                                {!! Form::open(['route' => ['invoice_packet_path']]) !!}
                                                    {!! Form::hidden('customer_id', $item->id ) !!}
                                                    {!! Form::hidden('invoice_type', 2 ) !!}
                                                    {!! Form::button('<i class="fa fa-external-link" aria-hidden="true"></i>
                                                        Packet Invoice', array('style' => 'border: none;background: none;padding: 0;', 'type'=>'submit')) !!}
                                                    {!! Form::close() !!}

                                                </a>
                                                </li>
                                                @endpermission
                                                @permission('delete-customer')
                                                <li>
                                                    <a>
                                                    {!! Form::open([
                                                        'method'=>'DELETE',
                                                        'url' => ['/admin/customer', $item->id],
                                                        'style' => 'display:inline'
                                                    ]) !!}

                                                        {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                                'type' => 'submit',
                                                                'title' => 'Delete customer',
                                                                'style' => 'padding: 0;background: none;border: none',
                                                                'onclick'=>'return confirm("Confirm delete?")'
                                                        )) !!}
                                                    {!! Form::close() !!}
                                                    </a>
                                                </li>
                                                @endpermission
                                            </ul>
                                        </div>

                                        </td>
                                    </tr>

                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="9" class="text-center">No actual customers</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            </div>
                            <div class="pagination-wrapper"> {!! $customer->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
