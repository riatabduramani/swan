@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in Admin!
                    @role('admin')
                        <p>This is visible to users with the admin role. </p>
                    @endrole

                    @role('agent')
                        <p>This is visible to users with the agent role. </p>
                    @endrole

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
