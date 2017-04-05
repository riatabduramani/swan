@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Customer</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/customer/create') }}" class="btn btn-success btn-sm" title="Add New customer">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

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

                        <br/>
                        <br/>
                     
                        <div class="">
                            <table class="table table-bordered">
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
                                        <td>
                                            @if($item->created_by != null)
                                            {{ $item->createdby->name }} {{ $item->createdby->surname }}
                                            @else
                                            Null
                                            @endif
                                        </td>
                                        <td>

                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                                Options <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li>
                                                    <a href="{{ url('/admin/customer/' . $item->id) }}" title="View customer">
                                                        <i class="fa fa-search"></i> View
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('/admin/customer/' . $item->id . '/edit') }}" title="Edit customer">
                                                        <i class="fa fa-edit"></i> Edit
                                                    </a>
                                                </li>
                                                <li>
                                                <a>
                                    
                                                {!! Form::open(['route' => ['invoice_path']]) !!}
                                                    {!! Form::hidden('customer_id', $item->user->id ) !!}
                                                    {!! Form::hidden('invoice_type', 2 ) !!}
                                                    {!! Form::button('<i class="fa fa-external-link" aria-hidden="true"></i>
                                                        Custom Invoice', array('style' => 'border: none;background: none;padding: 0;', 'type'=>'submit')) !!}
                                                    {!! Form::close() !!}

                                                </a>
                                                </li>
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
                                            </ul>
                                        </div>

                                        </td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $customer->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
