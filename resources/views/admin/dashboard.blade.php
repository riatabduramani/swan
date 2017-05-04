@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                    <div class="panel-heading" style="background: rgb(4, 105, 154); color: rgb(255, 255, 255);">
                    <i class="fa fa-users" aria-hidden="true"></i> Number of clients</div>
                    <div class="panel-body text-center" style="height:130px;overflow-y:auto;">
                        @permission('view-customer')
                        <a href="/admin/customer" style="text-decoration: none">
                        @endpermission
                            <h2><b>@if($customers) {{ $customers }} @else 0 @endif</b></h2>
                            <h4>active customers</h4>
                        @permission('view-customer')
                        </a>
                        @endpermission
                    </div>
                    @permission('view-customer')
                    @if(!empty($expiry))
                    <ul class="panel-body list-group" style="height:120px;overflow-y:auto;">
                        @foreach($expiry as $expire)
                        <a href="/admin/customer/{{$expire->customer_id}}" class="list-group-item">
                            <i class="fa fa-exclamation" aria-hidden="true" style="color: red"></i>
 <b>Packet:</b> {{ $expire->packet->name }} <small>{{ date('d.m.Y', strtotime($expire->end)) }}</small> | <b>Customer:</b> {{ $expire->customer->user->name }} {{ $expire->customer->user->surname }}
                        </a>
                        @endforeach
                    </ul>
                    @endif
                    @endpermission
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                    <div class="panel-heading" style="background: rgb(4, 105, 154); color: rgb(255, 255, 255);">
                    <i class="fa fa-tasks" aria-hidden="true"></i> Tasks</div>
            
                    <ul class="panel-body list-group" style="height:250px;overflow-y:auto;">
                    @if(count($tasks) > 0)
                    @foreach($tasks as $task)
                        @if($task->customer_id != null)
                            <a href="/admin/customer/{{$task->customer_id}}#todolist-{{$task->id}}" class="list-group-item">
                        @else
                            <a href="/admin/tasks#todolist-{{$task->id}}" class="list-group-item">
                        @endif
                         <small style="color: #989898"><i><i aria-hidden="true" class="fa fa-calendar-check-o"></i> {{ date('d.m.Y', strtotime($task->duedate)) }}</i></small>
                         {{ $task->title }}
                        </a>
                    @endforeach
                     @else
                        No tasks
                    @endif
                    </ul>
                  
            </div>
        </div>
        @permission('view-listedinvoices')
        <div class="col-md-6">
            <div class="panel panel-default">
                    <div class="panel-heading" style="background: rgb(4, 105, 154); color: rgb(255, 255, 255);">
                    <i class="fa fa-file-text" aria-hidden="true"></i> Unpaid invoices</div>
                
                    <ul class="panel-body list-group" style="height:250px;overflow-y:auto;">
                        @if(count($invoices) > 0)
                        @foreach($invoices as $invoice)
                        @if($invoice->invoice_type == 2)
                            <a href="/admin/invoice/custominvoice/{{ $invoice->id }}" class="list-group-item">
                        @else
                            <a href="/admin/invoice/packetinvoice/{{ $invoice->id }}" class="list-group-item">
                        @endif
                                <i class="fa fa-search" aria-hidden="true"></i>
                                 <b>{{ $invoice->customer->user->name }} {{ $invoice->customer->user->surname }}</b>
                                 Invoice#: {{ $invoice->id }}<small>/{{ date('Y', strtotime($invoice->invoice_date)) }}</small>
                                <div class="pull-right"> {{ $invoice->total_sum }}&euro;</div>
                            </a>
                        @endforeach
                         @else
                            No unpaid invoices
                        @endif
                    </ul>
                    
                    
            </div>
        </div>
        @endpermission
        <div class="col-md-6">
            <div class="panel panel-default">
                    <div class="panel-heading" style="background: rgb(4, 105, 154); color: rgb(255, 255, 255);"> 
                        <i class="fa fa-commenting" aria-hidden="true"></i> Latest comments
                    </div>
                        
                            <ul class="panel-body list-group" style="height:250px;overflow-y:auto;">
                            @if(count($comments) > 0)
                            @foreach($comments as $comment)
                            <li class="list-group-item">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                <i>{{ $comment->created_at->diffForHumans() }}</i>
                                <b>{{ $comment->created_by }}:</b>
                                @if($comment->commentable_type == 'App\Models\Customer')
                                    <a href="/admin/customer/{{ $comment->commentable_id }}#comment-{{ $comment->id }}">
                                @else
                                    <a href="/admin/potential/{{ $comment->commentable_id }}#comment-{{ $comment->id }}">
                                @endif
                                {{ str_limit($comment->body, 100) }}
                                </a>
                            </li>
                            @endforeach
                             @else
                            No comments
                        @endif
                            </ul>
                       
            </div>
        </div>
       
    </div>
</div>
@endsection
