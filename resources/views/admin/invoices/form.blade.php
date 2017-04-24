<div class="form-group {{ $errors->has('service_title') ? 'has-error' : ''}}">
    {!! Form::label('service_title', 'Service Title', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::text('service_title', null, ['class' => 'form-control']) !!}
        {!! $errors->first('service_title', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('service_description') ? 'has-error' : ''}}">
    {!! Form::label('service_description', 'Service Description', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('service_description', null, ['class' => 'form-control']) !!}
        {!! $errors->first('service_description', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('service_price') ? 'has-error' : ''}}">
    {!! Form::label('service_price', 'Service Price', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('service_price', null, ['class' => 'form-control']) !!}
        {!! $errors->first('service_price', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('service_note') ? 'has-error' : ''}}">
    {!! Form::label('service_note', 'Service Note', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::textarea('service_note', null, ['class' => 'form-control']) !!}
        {!! $errors->first('service_note', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
