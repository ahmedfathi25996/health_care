@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  {!!Html::style('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
  <!-- Font Awesome -->
  {!!Html::style('admin/bower_components/font-awesome/css/font-awesome.min.css') !!}
  <!-- Ionicons -->
  <!-- Ionicons -->
  {!!Html::style('admin/bower_components/Ionicons/css/ionicons.min.css') !!}
  
  <!-- Theme style -->
  {!!Html::style('admin/dist/css/AdminLTE.min.css') !!}
  
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
       {!!Html::style('admin/dist/css/skins/_all-skins.min.css') !!}
  
  
  <!-- Morris chart -->
  {!!Html::style('admin/bower_components/morris.js/morris.css') !!}
  
  <!-- jvectormap -->
  {!!Html::style('admin/bower_components/jvectormap/jquery-jvectormap.css') !!}
  
  <!-- Date Picker -->
  {!!Html::style('admin/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') !!}
  
  <!-- Daterange picker -->
  {!!Html::style('admin/bower_components/bootstrap-daterangepicker/daterangepicker.css') !!}
  
  <!-- bootstrap wysihtml5 - text editor -->
  {!!Html::style('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}
  
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<form class="form-horizontal" role="form" method="POST" action="{{ url('/doctor/diseases') }}" enctype="multipart/form-data">

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Disease</div>
                <div class="panel-body">

                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Disease name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}">

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('symptoms[]') ? ' has-error' : '' }}">
                            <label for="symptom1" class="col-md-4 control-label">Symptom 1</label>

                            <div class="col-md-6">
                                <select name="symptoms[]" class="form-control input-sum">
                                    <option value="null">Null</option>
                                   @foreach($symptoms as $sym)
                                   <option value="{{$sym->id}}">{{$sym->name}}</option>
                                   @endforeach
                               </select>

                                @if ($errors->has('symptoms[]'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('symptoms[]') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('symptoms[]') ? ' has-error' : '' }}">
                            <label for="symptom1" class="col-md-4 control-label">Symptom 2</label>

                            <div class="col-md-6">
                                <select name="symptoms[]" class="form-control input-sum">
                                    <option value="null">Null</option>
                                   @foreach($symptoms as $sym)
                                   <option value="{{$sym->id}}">{{$sym->name}}</option>
                                   @endforeach
                               </select>

                                @if ($errors->has('symptoms[]'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('symptoms[]') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('symptoms[]') ? ' has-error' : '' }}">
                            <label for="symptom1" class="col-md-4 control-label">Symptom 3</label>

                            <div class="col-md-6">
                                <select name="symptoms[]" class="form-control input-sum">
                                    <option value="null">Null</option>
                                   @foreach($symptoms as $sym)
                                   <option value="{{$sym->id}}">{{$sym->name}}</option>
                                   @endforeach
                               </select>

                                @if ($errors->has('symptoms[]'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('symptoms[]') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      
                        

                          
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                </button>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
 
 


 
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

{!!Html::script('admin/bower_components/jquery/dist/jquery.min.js')  !!}

<!-- jQuery UI 1.11.4 -->
{!!Html::script('admin/bower_components/jquery-ui/jquery-ui.min.js')  !!}

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
{!!Html::script('admin/bower_components/bootstrap/dist/js/bootstrap.min.js')  !!}

<!-- Morris.js charts -->
{!!Html::script('admin/bower_components/raphael/raphael.min.js')  !!}

{!!Html::script('admin/bower_components/morris.js/morris.min.js')  !!}

<!-- Sparkline -->
{!!Html::script('admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')  !!}

<!-- jvectormap -->
{!!Html::script('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')  !!}

{!!Html::script('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')  !!}

<!-- jQuery Knob Chart -->
{!!Html::script('admin/bower_components/jquery-knob/dist/jquery.knob.min.js')  !!}

<!-- daterangepicker -->
{!!Html::script('admin/bower_components/moment/min/moment.min.js')  !!}

{!!Html::script('admin/bower_components/bootstrap-daterangepicker/daterangepicker.js')  !!}

<!-- datepicker -->
{!!Html::script('admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')  !!}

<!-- Bootstrap WYSIHTML5 -->
{!!Html::script('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')  !!}

<!-- Slimscroll -->
{!!Html::script('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')  !!}

<!-- FastClick -->
{!!Html::script('admin/bower_components/fastclick/lib/fastclick.js')  !!}

<!-- AdminLTE App -->
{!!Html::script('admin/dist/js/adminlte.min.js')  !!}

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{!!Html::script('admin/dist/js/pages/dashboard.js')  !!}


<!-- AdminLTE for demo purposes -->
{!!Html::script('admin/dist/js/demo.js')  !!}

</body>
</html>


@endsection
