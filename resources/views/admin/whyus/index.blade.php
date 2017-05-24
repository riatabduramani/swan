@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Why us!</div>
                    <div class="panel-body">
                        <a href="{{ url('/admin/whyus/create') }}" class="btn btn-success btn-sm" title="Add New ServiceItem">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Title [EN]</th><th>Title [AL]</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($whyus as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->translate('sq')->name }}</td>
                                        <td>
                                            <a href="{{ url('/admin/whyus/' . $item->id . '/edit') }}" title="Edit ServiceItem"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/whyus', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete WhyUs Item',
                                                        'onclick'=>'return confirm("Confirm to delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                          
                        </div>

                    </div>
                </div>
            </div>



            
        </div>
    </div>
@endsection
