@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
     <div class="col-md-12">
         @if(Session::has('flash_message'))
            <p class="alert alert-success">{{ Session::get('flash_message') }}</p>
            @elseif(Session::has('flash_error'))
                    <p class="alert alert-warning">{{ Session::get('flash_message') }}</p>
          @endif
        </div>
      </div>
    <div class="row">
        <div class="col-md-12">
            <!-- START -->
            {!! Form::model($pages, ['method' => 'PATCH','url' => ['/admin/pages', 1]]) !!}
            <div class="panel panel-default"><div class="panel-heading" style="background: rgb(4, 105, 154); color: rgb(255, 255, 255);">
                    SWAN PAGES
            <div class="pull-right"><button type="submit" class="btn btn-primary btn-xs">Update</button></div></div> 
            <div class="panel-body">

                @foreach (config('app.language') as $lang => $suffix)
                <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="aboutus{{$suffix}}">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#about{{$suffix}}" aria-expanded="true" aria-controls="about{{$suffix}}">
                          About us [{{ $lang }}]
                        </a>
                      </h4>
                    </div>
                    <div id="about{{$suffix}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="aboutus{{$suffix}}">
                      <div class="panel-body">
                        {!! Form::textarea('about'.$suffix, (isset($pages) ? $pages->{"about:$lang"} : null), array('placeholder' => 'about us text '.$lang,'class' => 'form-control', 'rows'=>'10')) !!}
                      </div>
                    </div>
                  </div>

                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="ourvision{{$suffix}}">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#vision{{$suffix}}" aria-expanded="true" aria-controls="vision{{$suffix}}">
                          Vision [{{ $lang }}]
                        </a>
                      </h4>
                    </div>
                    <div id="vision{{$suffix}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="ourvision{{$suffix}}">
                      <div class="panel-body">
                        {!! Form::textarea('vision'.$suffix, (isset($pages) ? $pages->{"vision:$lang"} : null), array('placeholder' => 'vision text '.$lang,'class' => 'form-control', 'rows'=>'10')) !!}
                      </div>
                    </div>
                  </div>

                  <div class="panel panel-default">
                    <div class="panel-heading" role="tab" id="ourmission{{$suffix}}">
                      <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#mission{{$suffix}}" aria-expanded="true" aria-controls="mission{{$suffix}}">
                          Mission [{{ $lang }}]
                        </a>
                      </h4>
                    </div>
                    <div id="mission{{$suffix}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="ourmission{{$suffix}}">
                      <div class="panel-body">
                        {!! Form::textarea('mission'.$suffix, (isset($pages) ? $pages->{"mission:$lang"} : null), array('placeholder' => 'mission text '.$lang,'class' => 'form-control', 'rows'=>'10')) !!}
                      </div>
                    </div>
                  </div>

                </div>

                </div>

                @endforeach
                 </div>
            {!! Form::close() !!}
            <!--END -->
        </div>
    </div>
</div>
<div class="row">
  <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background: rgb(4, 105, 154); color: rgb(255, 255, 255);">
                        WhyUs items
                    <div class="pull-right">
                        <a href="{{ url('/admin/whyus/create') }}" class="btn btn-primary btn-xs" title="Add New WhyUs">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>
                    </div>
                    </div>
                    <div class="panel-body">
                        
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th><th>Title [EN]</th><th>Title [AL]</th><th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($whyus) > 0)
                                @foreach($whyus as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->translate('sq')->title }}</td>
                                        <td>
                                            <a href="{{ url('/admin/whyus/' . $item->id . '/edit') }}" title="Edit ServiceItem"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                            {!! Form::open([
                                                'method'=>'DELETE',
                                                'url' => ['/admin/whyus', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-xs',
                                                        'title' => 'Delete WhyUs option',
                                                        'onclick'=>'return confirm("Confirm to delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">
                                            No data registered
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                           
                        </div>

                    </div>
                </div>
            </div>
</div>
</div>
@endsection

