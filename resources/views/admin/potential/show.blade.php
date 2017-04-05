@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Potential customer: {{ $potential->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/admin/potential') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/potential/' . $potential->id . '/edit') }}" title="Edit Potential"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['admin/potential', $potential->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Potential',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-bordered table-condensed table-striped">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $potential->id }}</td>
                                    </tr>
                                    <tr><th> Name </th><td> {{ $potential->name }} </td></tr>
                                    <tr><th> Surname </th><td> {{ $potential->surname }} </td></tr>
                                    <tr><th> Phone </th><td> {{ $potential->phone }} </td></tr>
                                    <tr><th> E-mail </th><td> {{ $potential->email }} </td></tr>
                                    <tr><th> District </th><td> {{ $potential->district }} </td></tr>
                                    <tr><th> Status </th><td> {{ $potential->status->name }} </td></tr>
                                </tbody>
                            </table>
                        </div>

<h4>Comments</h4><hr />
@if(isset($potential))
@foreach ($potential->comments as $comment)
   <div class="col-sm-12">
    <div class="panel panel-default">
        <div class="panel-heading" style="background: rgb(245, 245, 245);">
        <strong>{{ $comment->createdby->name }} {{ $comment->createdby->surname }}</strong> <small class="text-muted label label-success">{{ $comment->created_at->format("d.m.y - H:i") }}</small>  <small class="label label-default">{{ $comment->created_at->diffForHumans()}}</small>
        </div>
        <div class="panel-body">
            {{ $comment->body }}
        </div><!-- /panel-body -->
    </div><!-- /panel panel-default -->
</div><!-- /col-sm-5 -->
@endforeach
@endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
