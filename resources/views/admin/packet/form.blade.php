
@foreach (['en'=>'','sq'=>'_sq'] as $lang => $suffix)

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label("name$suffix", 'Name'.$suffix, ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        @if(isset($packet))
        {!! Form::text('name'.$suffix, $packet->{"name:$lang"}, ['class' => 'form-control']) !!}
        @else
        {!! Form::text('name'.$suffix, null, ['class' => 'form-control']) !!}
        @endif
        {!! $errors->first('name'.$suffix, '<p class="help-block">:message</p>') !!}
    </div>
 
</div>
 @endforeach
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    {!! Form::label('price', 'Price', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::number('price', null, ['class' => 'form-control']) !!}
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
    </div>
</div><div class="form-group {{ $errors->has('options') ? 'has-error' : ''}}">
    {!! Form::label('options', 'Options', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('options', ['normal', 'popular', 'extended'], null, ['class' => 'form-control']) !!}
        {!! $errors->first('options', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
