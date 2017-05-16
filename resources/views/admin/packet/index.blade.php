@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background: rgb(4, 105, 154); color: rgb(255, 255, 255);">
                        Packet
                    <div class="pull-right">
                        <a href="{{ url('/admin/packet/create') }}" class="btn btn-primary btn-xs" title="Add New packet">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    </div>
                    </div>
                    <div class="panel-body">
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Name [EN]</th><th>Name [AL]</th><th>Price</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($packet))
                                @foreach($packet as $it=>$item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->translate('sq')->name }}</td>
                                        <td>
                                        @if($item->price)
                                            <del style="color: red">{{ $item->price }}€</del> / 
                                        @endif
                                        {{ $item->new_price }}€</td>
                                        <td>
                                            <a href="{{ url('/admin/packet/' . $item->id . '/edit') }}" title="Edit packet"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/packet', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete packet',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            No packets registered
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $packet->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>


            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background: rgb(4, 105, 154); color: rgb(255, 255, 255);">
                        Service items
                    <div class="pull-right">
                        <a href="{{ url('/admin/service-items/create') }}" class="btn btn-primary btn-xs" title="Add New ServiceItem">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    </div>
                    </div>
                    <div class="panel-body">
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Name [EN]</th><th>Name [AL]</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($serviceitems) > 0)
                                @foreach($serviceitems as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->translate('sq')->name }}</td>
                                        <td>
                                            <a href="{{ url('/admin/service-items/' . $item->id . '/edit') }}" title="Edit ServiceItem"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/service-items', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete ServiceItem',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            No service items registered
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $serviceitems->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
