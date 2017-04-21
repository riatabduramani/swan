@extends('layouts.app')

@section('content')
    <div class="container">

        @if(Session::has('flash_message'))
          <p class="alert alert-success">{{ Session::get('flash_message') }}</p>
        @endif

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background: rgb(4, 105, 154); color: rgb(255, 255, 255);">
                    Potential customer
                    <div class="pull-right">

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

                      
                    </div>
                    </div>
                    <div class="panel-body">
                          <a href="/admin/potential/tocustomer/{{ $potential->id }}" class="btn btn-primary">
                          <i class="fa fa-exchange" aria-hidden="true"></i> Transfer to customer
                        </a>
                       
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-bordered table-condensed table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Surname</th>
                                        <th>Phone</th>
                                        <th>E-mail</th>
                                        <th>District</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>{{ $potential->name }}</td>
                                    <td>{{ $potential->surname }}</td>
                                    <td>{{ $potential->phone }}</td>
                                    <td>{{ $potential->email }}</td>
                                    <td>{{ $potential->district->name }}</td>
                                    <td>{{ $potential->status->name }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

<h4>Comments</h4><hr />
@if(count($potential->comments) > 0)
    @foreach ($potential->comments as $comment)
       <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading" style="background: rgb(245, 245, 245);">
            <strong>{{ $comment->created_by}}</strong> <small class="text-muted label label-success">{{ $comment->created_at->format("d.m.y - H:i") }}</small>  <small class="label label-default">{{ $comment->created_at->diffForHumans()}}</small>
            @role(['admin','superadmin'])
            <div class="pull-right">
                {!! Form::open([
                    'method'=>'GET',
                    'url' => ['/admin/potential/comment', $comment->id],
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
            @role('employee')
            @if($comment->commented_by == Auth::user()->id)
            <div class="pull-right">
                {!! Form::open([
                    'method'=>'GET',
                    'url' => ['/admin/potential/comment', $comment->id],
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
        <span class="small">NO COMMENTS...</span>
    </div>
    <br /><br />
@endif

          <div class="col-md-12" id="createcomment">
           {!! Form::open(array('method'=>'POST', 'id'=>'frmaddComment', 
              'action'=>'Admin\\PotentialController@storecomment')) !!}
              <div class="form-group">

                  {!! Form::textarea('comment',null,['placeholder'=>'Add a comment...','class' => 'form-control',
                  'rows'=>'2','required']) !!}
                  {!! Form::hidden('potential_id', $potential->id ) !!}
              </div>
              <div class="form-group buttoncomment">
                  {!! Form::submit('Comment',['class'=>'btn btn-primary','id'=>'btn-save']) !!}
              </div>
              {!! Form::close() !!}
                </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
