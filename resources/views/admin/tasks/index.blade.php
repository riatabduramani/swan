@extends('layouts.app')

@section('content')
    <div class="container">
    @if(Session::has('flash_message'))
          <p class="alert alert-success">{{ Session::get('flash_message') }}</p>
        @endif

        <div class="row">
            <div class="col-md-6">
              <div class="row">
                
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
                          'action'=>'Admin\\TodolistController@createtask')) !!}
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
                          <div class="col-md-5">
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
                          <div class="col-md-3">
                            <div class="form-group">
                              {!! Form::label('repeat', 'Repeat every:', ['class' => 'control-label']) !!}
                              {!! Form::select('repeat',array_combine(range(1,30),range(1,30)), null,['placeholder'=>'days...','class' => 'form-control']) !!}
                              <p class="help-block">days</p>
                            </div>
                          </div>
                           <div class="col-md-12">
                          <div class="form-group">
                              
                              {!! Form::submit('Create Task',['class'=>'btn btn-primary','id'=>'btn-save']) !!}
                          </div>
                           </div>
                          {!! Form::close() !!}
                        </div>
                     </div>
                  </div>
                  @endpermission
                  <!-- END OF CREATE TASK -->
              </div>
                <div class="panel panel-default">
                <div class="panel-heading" style="background: #04699a;color: #fff;">
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
                      @if($task->customer)
                          <span class="text-muted">
                              <i class="fa fa-user" aria-hidden="true"></i> <b>Customer:</b>
                              <a href="/admin/customer/{{ $task->customer->id}}">{{ $task->customer->user->name}} {{ $task->customer->user->surname}}</a>
                          </span>
                          @endif
                      </td>
                    </tr>
                  @endforeach
                  </table>
                {!! $tasksdone->render() !!}
                </div>
                </div>
            </div>
        <div class="col-md-6">
        		<!-- TO  DO LIST SECTION -->
              <div class="panel panel-default">
                <div class="panel-heading" style="background: #04699a;color: #fff;">
                <i class="fa fa-calendar-check-o" aria-hidden="true"></i> TO DO LIST
               
                </div>
                <div class="panel-body"> 
                <div class="col-md-12">

                @if(count($tasks) > 0)
                  @foreach($tasks as $todolist)
                  <div id="todolist-{{ $todolist->id }}">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <strong>{{ $todolist->title }}</strong>
                           @role(['admin','superadmin'])
                           <div class="pull-right">
                           {!! Form::open([
                                  'method'=>'GET',
                                  'url' => ['/admin/tasks/done', $todolist->id],
                                  'style' => 'display:inline'
                              ]) !!}
                                  {!! Form::button('<i class="fa fa-check" aria-hidden="true"></i>', array(
                                          'type' => 'submit',
                                          'class' => 'btn btn-success btn-xs',
                                          'title' => 'Mark as Done!',
                                          'onclick'=>'return confirm("Are you sure to mark it as Done?")'
                                  ))!!}
                                  
                              {!! Form::close() !!}
                              
                              @if($todolist->repeat != null)
                              {!! Form::open([
                                    'method'=>'GET',
                                    'url' => ['/admin/tasks/done', $todolist->id],
                                    'style' => 'display:inline'
                                ]) !!}
                                    {{ Form::hidden('norepeat', 'secret') }}
                                    {!! Form::button('<i class="fa fa-check" aria-hidden="true"></i> ! <i class="fa fa-repeat" aria-hidden="true"></i>', array(
                                            'type' => 'submit',
                                            'title' => 'Mark as DONE and do not Repeat this task!',
                                            'class' => 'btn btn-warning btn-xs',
                                            'onclick'=>'return confirm("Are you sure to mark it as Done and stop Repeating?")'
                                    ))!!}
                                {!! Form::close() !!}
                              @endif
                              
                              {!! Form::open([
                                  'method'=>'DELETE',
                                  'url' => ['/admin/tasks', $todolist->id],
                                  'style' => 'display:inline'
                              ]) !!}
                                  {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                          'type' => 'submit',
                                          'class' => 'btn btn-danger btn-xs',
                                          'onclick'=>'return confirm("Are you sure to delete the task?")'
                                  ))!!}
                              {!! Form::close() !!}
                           </div>
                           @endrole

                           @role('employee')
                           @if($todolist->assigned_to == Auth::user()->id)
                             <div class="pull-right">
                             {!! Form::open([
                                    'method'=>'GET',
                                    'url' => ['/admin/tasks/done', $todolist->id],
                                    'style' => 'display:inline'
                                ]) !!}
                                    {!! Form::button('<i class="fa fa-check" aria-hidden="true"></i> Mark as Done!', array(
                                            'type' => 'submit',
                                            'class' => 'btn btn-success btn-xs',
                                            'onclick'=>'return confirm("Are you sure to mark it as Done?")'
                                    ))!!}
                                
                              @if($todolist->created_by == Auth::user()->id)
                                {!! Form::open([
                                    'method'=>'GET',
                                    'url' => ['/admin/tasks', $todolist->id],
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
                           @endrole


                        </div>
                        <div class="panel-body">
                        <div class="col-md-12">
                          @if(\Carbon\Carbon::now() > $todolist->duedate)
                            <span class="text-muted" style="color: red">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                             {{ date('d.m.Y', strtotime($todolist->duedate)) }}</span> 
                          @else
                          <span class="text-muted">
                          <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                           {{ date('d.m.Y', strtotime($todolist->duedate)) }}</span> 
                          @endif
                          @role(['admin','superadmin'])
                          <span class="text-muted">
                              <i class="fa fa-user" aria-hidden="true"></i> 
                              {{ $todolist->assignedto->name}} {{ $todolist->assignedto->surname}}
                          </span>
                          @endrole
                          @if($todolist->customer)
                          <span class="text-muted">
                              <i class="fa fa-user" aria-hidden="true"></i> <b>Customer:</b>
                              <a href="/admin/customer/{{ $todolist->customer->id}}">{{ $todolist->customer->user->name}} {{ $todolist->customer->user->surname}}</a>
                          </span>
                          @endif
                        </div>
                        <div class="col-md-12" style="margin-top: 12px">
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

                </div>
              </div><!--END TO DO LIST -->
              </div>
       	</div>
    </div>
@endsection