<div class="panel panel-default">
  <div class="panel-heading">Customer basic contact:</div>
  <div class="panel-body">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
            {!! Form::label('name', 'First Name:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('name', (isset($customer) ? $customer->user->name : null), ['class' => 'form-control']) !!}
                {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('surname') ? 'has-error' : ''}}">
            {!! Form::label('surname', 'Last Name:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('surname', (isset($customer) ? $customer->user->surname : null), ['class' => 'form-control']) !!}
                {!! $errors->first('surname', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
            {!! Form::label('email', 'E-mail:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('email', (isset($customer) ? $customer->user->email : null), ['class' => 'form-control']) !!}
                {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
</div>

<div class="row">
        <div class="col-md-6">
               <div class="panel panel-default">
              <div class="panel-heading">Homeland contact:</div>
                <div class="panel-body">
                    <div class="form-group {{ $errors->has('address_in') ? 'has-error' : ''}}">
                    {!! Form::label('address_in', 'Address:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::textarea('address_in', null, ['class' => 'form-control', 'rows'=>'5']) !!}
                            {!! $errors->first('address_in', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                     <div class="form-group {{ $errors->has('district_in_id') ? 'has-error' : ''}}">
                    {!! Form::label('district_in_id', 'Place:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::select('district_in_id', $district, null, ['placeholder'=>'Select district/place...','class' => 'form-control required']) !!}
                            {!! $errors->first('district_in_id', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('city_in_id') ? 'has-error' : ''}}">
                    {!! Form::label('city_in_id', 'City:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::select('city_in_id', $city, 1, ['class' => 'form-control']) !!}
                            {!! $errors->first('city_in_id', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('country_in_id') ? 'has-error' : ''}}">
                    {!! Form::label('country_in_id', 'Country:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::select('country_in_id', $country, 128, ['class' => 'form-control']) !!}
                            {!! $errors->first('country_in_id', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('phone_in') ? 'has-error' : ''}}">
                    {!! Form::label('phone_in', 'Phone:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('phone_in', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('phone_in', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">Outside homeland:</div>
                <div class="panel-body">

                    <div class="form-group {{ $errors->has('address_out') ? 'has-error' : ''}}">
                        {!! Form::label('address_out', 'Address:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::textarea('address_out', null, ['class' => 'form-control','rows'=>'5']) !!}
                            {!! $errors->first('address_out', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('postal_out') ? 'has-error' : ''}}">
                        {!! Form::label('postal_out', 'Postal:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('postal_out', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('postal_out', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('city_id') ? 'has-error' : ''}}">
                        {!! Form::label('city_id', 'City:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::text('city', null, ['class' => 'form-control']) !!}
                            {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('country_id') ? 'has-error' : ''}}">
                        {!! Form::label('country_id', 'Country:', ['class' => 'col-md-3 control-label']) !!}
                        <div class="col-md-9">
                            {!! Form::select('country_id', $country, null, ['class' => 'form-control']) !!}
                            {!! $errors->first('country_id', '<p class="help-block">:message</p>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('phone_out') ? 'has-error' : ''}}">
                    {!! Form::label('phone_out', 'Phone:', ['class' => 'col-md-3 control-label']) !!}
                    <div class="col-md-9">
                        {!! Form::text('phone_out', null, ['class' => 'form-control']) !!}
                        {!! $errors->first('phone_out', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>
                </div>
             </div>
        </div>
</div>





<div class="panel panel-default">
  <div class="panel-heading">Emergency contact:</div>
    <div class="panel-body">
        <div class="form-group {{ $errors->has('emergencycontact') ? 'has-error' : ''}}">
            {!! Form::label('emergencycontact', 'Name & Last Name:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('emergencycontact', null, ['class' => 'form-control']) !!}
                {!! $errors->first('emergencycontact', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('emergencyphone') ? 'has-error' : ''}}">
            {!! Form::label('emergencyphone', 'Phone:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-6">
                {!! Form::text('emergencyphone', null, ['class' => 'form-control']) !!}
                {!! $errors->first('emergencyphone', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default">
  <div class="panel-heading">Active & Confirmation:</div>
    <div class="panel-body">


        <div class="form-group {{ $errors->has('confirmed') ? 'has-error' : ''}}">
            {!! Form::label('confirmed', 'Confirmed:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-2">
                {!! Form::select('confirmed', ['1' => 'Yes', '0' => 'No'], (isset($customer) ? $customer->user->status : null), [ 'placeholder' => 'Select...','class' => 'form-control required']) !!}
                {!! $errors->first('confirmed', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
        <div class="form-group {{ $errors->has('status') ? 'has-error' : ''}}">
            {!! Form::label('status', 'Allow login:', ['class' => 'col-md-4 control-label']) !!}
            <div class="col-md-2">
                {!! Form::select('status', ['1' => 'Yes', '0' => 'No'], (isset($customer) ? $customer->user->confirmed : null), ['placeholder' => 'Select...','class' => 'form-control required']) !!}
                {!! $errors->first('status', '<p class="help-block">:message</p>') !!}
            </div>
        </div>
  </div>
</div>

<div class="form-group">
    <div class="col-md-offset-4 col-md-4">
        {!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
    </div>
</div>
