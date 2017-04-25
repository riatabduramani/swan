@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                    <div class="panel-heading" style="background: rgb(4, 105, 154); color: rgb(255, 255, 255);">
                    <i class="fa fa-users" aria-hidden="true"></i> Number of clients</div>
                    <div class="panel-body text-center">
                        <a href="/admin/customer" style="text-decoration: none">
                            <h1><b>@if($customers) {{ $customers }} @else 0 @endif</b></h1>
                            <h3>active customers</h3>
                        </a>
                    </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                    <div class="panel-heading" style="background: rgb(4, 105, 154); color: rgb(255, 255, 255);">
                    <i class="fa fa-tasks" aria-hidden="true"></i> Tasks</div>
                    <div class="panel-body">
                    <ul class="list-group">
                    @if(count($tasks) > 0)
                    @foreach($tasks as $task)
                        @if($task->customer_id != null)
                            <a href="/admin/customer/{{$task->customer_id}}#todolist-{{$task->id}}" class="list-group-item">
                        @else
                            <a href="/admin/tasks#todolist-{{$task->id}}" class="list-group-item">
                        @endif
                        
                        {{ $task->title }}<br />
                        <small><i aria-hidden="true" class="fa fa-calendar-check-o"></i> {{ date('d.m.Y', strtotime($task->duedate)) }}</small>
                        </a>
                    @endforeach
                     @else
                        No tasks
                    @endif
                    </ul>
                    </div>
            </div>
        </div>
        @permission('view-listedinvoices')
        <div class="col-md-3">
            <div class="panel panel-default">
                    <div class="panel-heading" style="background: rgb(4, 105, 154); color: rgb(255, 255, 255);">
                    <i class="fa fa-file-text" aria-hidden="true"></i> Unpaid invoices</div>
                    <div class="panel-body">
                    <ul class="list-group">
                    @if(count($invoices) > 0)
                        @foreach($invoices as $invoice)
                        @if($invoice->invoice_type == 2)
                            <a href="/admin/invoice/custominvoice/{{ $invoice->id }}" class="list-group-item">
                        @else
                            <a href="/admin/invoice/packetinvoice/{{ $invoice->id }}" class="list-group-item">
                        @endif
                                <i class="fa fa-search" aria-hidden="true"></i>
                                 Invoice#: {{ $invoice->id }}<small>/{{ date('Y', strtotime($invoice->invoice_date)) }}</small>
                            </a>
                        @endforeach
                    @else
                        No unpaid invoices
                    @endif
                    </ul>
                    </div>
            </div>
        </div>
        @endpermission
        <div class="col-md-3">
            <div class="panel panel-default">
                    <div class="panel-heading" style="background: rgb(4, 105, 154); color: rgb(255, 255, 255);"> 
                        <i class="fa fa-commenting" aria-hidden="true"></i> Latest comments
                    </div>
                    <div class="panel-body">
                        @if(count($comments) > 0)
                            <ul class="list-group">
                            @foreach($comments as $comment)
                            <li class="list-group-item">
                                @if($comment->commentable_type == 'App\Models\Customer')
                                    <a href="/admin/customer/{{ $comment->commentable_id }}#comment-{{ $comment->id }}">
                                @else
                                    <a href="/admin/potential/{{ $comment->commentable_id }}#comment-{{ $comment->id }}">
                                @endif
                                <i class="fa fa-comment-o" aria-hidden="true"></i> {{ str_limit($comment->body, 100) }}
                                </a>
                            </li>
                            @endforeach
                            </ul>
                        @else
                            No comments
                        @endif
                    </div>
            </div>
        </div>
       
    </div>
</div>
@endsection
