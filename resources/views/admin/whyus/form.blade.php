
@foreach (config('app.language') as $lang => $suffix)
<div class="col-md-6">
    <div class="form-group {{ $errors->has('title'.$suffix) ? 'has-error' : ''}}">
        {!! Form::label('title', 'Title ['.$lang.']', ['class' => 'col-md-4 control-label','style'=>'text-align: left']) !!}
        <div class="col-md-12">
           
            {!! Form::text('title'.$suffix, (isset($whyus) ? $whyus->{"title:$lang"} : null), ['class' => 'form-control','required']) !!}
         
            {!! $errors->first('title'.$suffix, '<p class="help-block">:message</p>') !!}
        </div>
    </div><div class="form-group {{ $errors->has('description'.$suffix) ? 'has-error' : ''}}">
        {!! Form::label('description'.$suffix, 'Description ['.$lang.']', ['class' => 'col-md-5 control-label','style'=>'text-align: left']) !!}
        <div class="col-md-12">
            {!! Form::textarea('description'.$suffix, (isset($whyus) ? $whyus->{"description:$lang"} : null), ['class' => 'form-control', 'required']) !!}
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
