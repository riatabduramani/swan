@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">

                    @role(['admin','superadmin'])
                        <p>This is visible to users with the admin|superadmin role. </p>
                    @endrole

                    @role('employee')
                        <p>This is visible to users with the employee role. </p>
                    @endrole
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
