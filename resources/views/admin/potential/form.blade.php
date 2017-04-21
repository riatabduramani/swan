<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('surname') ? 'has-error' : ''}}">
    {!! Form::label('surname', 'Surname:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('surname', null, ['class' => 'form-control']) !!}
        {!! $errors->first('surname', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
    {!! Form::label('phone', 'Phone:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('phone', null, ['class' => 'form-control']) !!}
        {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
    {!! Form::label('email', 'Email:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('email', null, ['class' => 'form-control']) !!}
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('distrit') ? 'has-error' : ''}}">
    {!! Form::label('district', 'District:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('district', $district, (isset($potential->district_id)) ? $potential->district_id : null, ['class' => 'form-control']) !!}
        {!! $errors->first('customer_status_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('customer_status_id') ? 'has-error' : ''}}">
    {!! Form::label('customer_status_id', 'Customer Status:', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('customer_status_id', $customerstatus, null, ['class' => 'form-control']) !!}
        {!! $errors->first('customer_status_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

@if(empty($potential))

<div class="col-md-12">
<div class="form-group {{ $errors->has('comment') ? 'has-error' : ''}}">
    <div class="col-md-8 col-md-offset-2">
        {!! Form::textarea('comment', null, ['placeholder'=>'Add comment', 'class' => 'form-control']) !!}
        {!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
    </div>
</div>
</div>
@endif
<div class="form-group">
    <div class="col-md-offset-5 col-md-5">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
