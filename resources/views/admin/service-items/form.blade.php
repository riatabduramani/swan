
@foreach (config('app.language') as $lang => $suffix)
<div class="col-md-6">
    <div class="form-group {{ $errors->has('name'.$suffix) ? 'has-error' : ''}}">
        {!! Form::label('name', 'Name ['.$lang.']', ['class' => 'col-md-1 control-label']) !!}
        <div class="col-md-12">
           
            {!! Form::text('name'.$suffix, (isset($serviceitem) ? $serviceitem->{"name:$lang"} : null), ['class' => 'form-control','required']) !!}
         
            {!! $errors->first('name'.$suffix, '<p class="help-block">:message</p>') !!}
        </div>
    </div><div class="form-group {{ $errors->has('description'.$suffix) ? 'has-error' : ''}}">
        {!! Form::label('description'.$suffix, 'Description ['.$lang.']', ['class' => 'col-md-1 control-label']) !!}
        <div class="col-md-12">
            {!! Form::textarea('description'.$suffix, (isset($serviceitem) ? $serviceitem->{"description:$lang"} : null), ['class' => 'form-control', 'required']) !!}
            {!! $errors->first('description'.$suffix, '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
@endforeach

<div class="form-group">
    <div class="col-md-offset-5 col-md-6">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
