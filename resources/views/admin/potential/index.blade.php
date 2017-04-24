@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background: rgb(4, 105, 154); color: rgb(255, 255, 255);">
                    Potential Customers
                    @permission('create-potential-customer')
                    <div class="pull-right">
                        <a href="{{ url('/admin/potential/create') }}" class="btn btn-primary btn-xs" title="Add New Potential">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    </div>
                    @endpermission
                    </div>
                    <div class="panel-body">
                     <div class="col-md-12">
                        <div class="pull-right">
                            {!! Form::open(['method' => 'GET', 'url' => '/admin/potential', 'class' => 'navbar-form navbar-right', 'role' => 'search'])  !!}
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            {!! Form::close() !!}
                        </div>
                      </div>   

                      <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Phone</th>
                                        <th>District</th>
                                        <th>Status</th>
                                        <th>Created By</th>
                                        <th>Updated By</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($potential) > 0)
                                @foreach($potential as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->surname }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->district->name }}</td>
                                        <td>{{ $item->status->name }}</td>
                                         <td>{{ $item->created_by }}</td>

                                            @if(isset($item->updatedby))
                                             <td>
                                                {{ $item->updatedby->name }} {{ $item->updatedby->surname }}
                                            </td>
                                            @else
                                                <td class="text-center">
                                                    -
                                                </td>
                                            @endif

                                        <td>
                                        @permission('view-potential-customer')
                                            <a href="{{ url('/admin/potential/' . $item->id) }}" title="View Potential"><button class="btn btn-default btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
                                        @endpermission
                                        @permission('edit-potential-customer')
                                            <a href="{{ url('/admin/potential/' . $item->id . '/edit') }}" title="Edit Potential"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                        @endpermission
                                        @permission('delete-potential-customer')
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/potential', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete Potential',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        @endpermission
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="9" class="text-center">No potential customers</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $potential->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
@permission('manage-statuses')
<div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background: rgb(4, 105, 154); color: rgb(255, 255, 255);">
                    Customer CRM Status
                    <div class="pull-right">
                        <a href="{{ url('/admin/customer-status/create') }}" class="btn btn-primary btn-xs" title="Add New CustomerStatus">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    </div>
                    </div>
                    <div class="panel-body">
                    <div class="col-md-12">
                        
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Status Type</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($customerstatus as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>
                                            
                                            <a href="{{ url('/admin/customer-status/' . $item->id . '/edit') }}" title="Edit CustomerStatus"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/customer-status', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete CustomerStatus',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $customerstatus->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            @endpermission
        </div>
    </div>
@endsection
