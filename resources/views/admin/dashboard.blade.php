@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="panel panel-default">
                    <div class="panel-heading">Number of clients</div>
                    <div class="panel-body text-center">
                        <a href="/admin/customer" style="text-decoration: none">
                            <h1><b>37</b></h1>
                            <h3>customers</h3>
                        </a>
                    </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                    <div class="panel-heading">Tasks</div>
                    <div class="panel-body">

                    </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                    <div class="panel-heading">Unpaid invoices</div>
                    <div class="panel-body">

                    </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="panel panel-default">
                    <div class="panel-heading">Latest comments</div>
                    <div class="panel-body">

                    </div>
            </div>
        </div>
       
    </div>
</div>
@endsection
