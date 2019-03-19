
@foreach (config('app.language') as $lang => $suffix)

<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label("name$suffix", 'Name ['.$lang.']', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
      
        {!! Form::text('name'.$suffix, (isset($packet) ? $packet->{"name:$lang"} : null), ['class' => 'form-control', 'required']) !!}
       
        {!! $errors->first('name'.$suffix, '<p class="help-block">:message</p>') !!}
    </div>
 
</div>
 @endforeach

<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    {!! Form::label('price', 'Old Price', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="input-group">
        {!! Form::text('price', null, ['class' => 'form-control text-right', 'placeholder'=>'0.00', 'min'=>'0','pattern'=>'^\d+(?:\.\d{0,2})']) !!}
        <div class="input-group-addon">&euro;</div>
        {!! $errors->first('price', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    {!! Form::label('new_price', 'New Price', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="input-group">
        {!! Form::text('new_price', null, ['class' => 'form-control text-right', 'required', 'placeholder'=>'0.00', 'min'=>'0','pattern'=>'^\d+(?:\.\d{0,2})']) !!}
        <div class="input-group-addon">&euro;</div>
        {!! $errors->first('new_price', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group {{ $errors->has('price') ? 'has-error' : ''}}">
    {!! Form::label('yearlyprice', 'Yearly Price', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        <div class="input-group">
        {!! Form::text('yearlyprice', null, ['class' => 'form-control text-right', 'required', 'placeholder'=>'0.00', 'min'=>'0','pattern'=>'^\d+(?:\.\d{0,2})']) !!}
        <div class="input-group-addon">&euro;</div>
        {!! $errors->first('yearlyprice', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group {{ $errors->has('options') ? 'has-error' : ''}}">
    {!! Form::label('options', 'Options', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('options', config('app.packettype'), null, ['class' => 'form-control']) !!}
        {!! $errors->first('options', '<p class="help-block">:message</p>') !!}
    </div>
</div>
<div class="form-group {{ $errors->has('months') ? 'has-error' : ''}}">
    {!! Form::label('months', 'Months', ['class' => 'col-md-4 control-label']) !!}
    <div class="col-md-6">
        {!! Form::select('months', [1=>1,2=>2,3=>3,4=>4,5=>5,6=>6,7=>7,8=>8,9=>9,10=>10,11=>11,12=>12], null, ['class' => 'form-control','placeholder' => 'Select months','required']) !!}
        {!! $errors->first('months', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="well">
<h4>Select <span class="label label-warning">Services</span></h4>

   <div class="form-group">
        @foreach($services as $ingd => $ing)
                <div class="col-md-3">
                    <label class="checkbox-inline">
                        {{ Form::checkbox('services[]', $ingd, (in_array($ingd, $listservice) ? true : null)) }}  
                        {{ $ing }}
                    </label>
                </div>
        @endforeach
    </div>
</div>



<div class="form-group">
    <div class="col-md-offset-5 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>

