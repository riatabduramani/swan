@extends('layouts.app')

@section('content')
<div class="container">
 @if(Session::has('flash_message'))
          <p class="alert alert-success">{{ Session::get('flash_message') }}</p>
    @elseif(Session::has('flash_error'))
            <p class="alert alert-warning">{{ Session::get('flash_message') }}</p>
  @endif
    <div class="row">
        <div class="col-md-12">
        <!-- START PANEL -->
        {!! Form::model($settings, ['method' => 'PATCH','url' => ['/admin/settings', 1]]) !!}
            <div class="panel panel-default">
                <div class="panel-heading" style="background: rgb(4, 105, 154); color: rgb(255, 255, 255);">
                    COMPANY DETAILS
                    <div class="pull-right">
                        <button type="submit" class="btn btn-primary btn-xs">Update</button>
                    </div>
                </div>
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                        <div class="col-md-12">
                          <!-- Nav tabs -->
                          <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#company" aria-controls="company" role="tab" data-toggle="tab">Company</a></li>
                            <li role="presentation"><a href="#contact" aria-controls="contact" role="tab" data-toggle="tab">Contact</a></li>
                            <li role="presentation"><a href="#social" aria-controls="social" role="tab" data-toggle="tab">Social</a></li>
                            <li role="presentation"><a href="#mapanalytics" aria-controls="mapanalytics" role="tab" data-toggle="tab">Map, SEO & Analytics</a></li>
                          </ul>

                          <!-- Tab panes -->
                          <div class="tab-content" style="margin-top: 10px;">
                            <div role="tabpanel" class="tab-pane active" id="company">
                                <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Company name:</label>
                                        {!! Form::text('company_name', null, array('placeholder' => 'enter the company name','class' => 'form-control')) !!}
                                    </div>
                                </div>
                               
                                </div>
                                <div class="row">
                               
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Company Slogan [sq]:</label>
                                        {!! Form::text('company_slogan_sq', null, array('placeholder' => 'enter the company slogan in albanian','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Company Slogan [en]:</label>
                                        {!! Form::text('company_slogan_en', null, array('placeholder' => 'enter the company slogan in english','class' => 'form-control')) !!}
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Address [sq]:</label>
                                        {!! Form::textarea('address_sq', null, array('placeholder' => 'enter the address in albanian language','class' => 'form-control','rows'=>3)) !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Address [en]:</label>
                                        {!! Form::textarea('address_en', null, array('placeholder' => 'enter the address in english language','class' => 'form-control','rows'=>3)) !!}
                                    </div>
                                </div>
                                </div>
                                
                            </div>
                            <div role="tabpanel" class="tab-pane" id="contact">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>E-mail:</label>
                                            {!! Form::text('email', null, array('placeholder' => 'company e-mail','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>E-mail 1:</label>
                                            {!! Form::text('email1', null, array('placeholder' => 'another company e-mail','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                            <label>Phone:</label>
                                            {!! Form::text('phone', null, array('placeholder' => 'phone number','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                            <label>Phone 1:</label>
                                            {!! Form::text('phone1', null, array('placeholder' => 'another phone number','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                            <label>Fax:</label>
                                            {!! Form::text('fax', null, array('placeholder' => 'fax number','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                            <label>Mobile:</label>
                                            {!! Form::text('mob', null, array('placeholder' => 'mobile number','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                       <div class="form-group">
                                            <label>Mobile 1:</label>
                                            {!! Form::text('mob1', null, array('placeholder' => 'another mobile number','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="social">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Facebook</label>
                                            {!! Form::text('facebook', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Youtube</label>
                                            {!! Form::text('youtube', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Linkedin</label>
                                            {!! Form::text('linkedin', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Google+</label>
                                            {!! Form::text('googleplus', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Instagram</label>
                                            {!! Form::text('instagram', null, array('class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="mapanalytics">
                            <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Google MAP embed code:</label>
                                            {!! Form::textarea('googlemap', null, array('placeholder' => 'enter keywords by comma separated','class' => 'form-control','rows'=>3)) !!}
                                        </div>
                                    </div>
                                     <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Google Analytics script code:</label>
                                            {!! Form::textarea('googleanalytics', null, array('placeholder' => 'enter meta description','class' => 'form-control')) !!}
                                        </div>
                                    </div>
                                </div>
                            <hr />
                              <h4>SEO: Meta data</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Keywords:</label>
                                            {!! Form::textarea('company_keywords', null, array('placeholder' => 'enter keywords by comma separated','class' => 'form-control','rows'=>3)) !!}
                                        </div>
                                    </div>
                                     <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Meta description:</label>
                                            {!! Form::textarea('company_shortdescription', null, array('placeholder' => 'enter meta description','class' => 'form-control','maxlength'=>"160")) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                </div>
            </div>
             {!! Form::close() !!}
            <!--END PANEL -->
        </div>
    </div>
</div>
@endsection

