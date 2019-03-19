@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | User Profile</title>
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

 
 

  <!-- Content Wrapper. Contains page content -->
  
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          
   <form enctype="multipart/form-data" method="POST" action="{{ url('/user/profile/image') }}" >
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src='{{ asset("images/$user->image") }}' alt="User profile picture">
             <input type="file" name="image">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Change
                                </button>
                            </div>
                        </div> <br>
              <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

              <p class="text-muted text-center">Software Engineer</p>

             

            </div>
          </form>
           
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

              
              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">{{Auth::user()->address}}</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i>Phone Number</strong>

              <p class="text-muted">{{Auth::user()->phone_number}}</p>

              

              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
           
            <div class="tab-content">
              
            

             
              <div class="form-horizontal">

                {!! Form::open(['action' => ['ProfileController@update',Auth::user()->id],'method' => 'PATCH'],['class'=>'form-horizontal']) !!}
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="text" name="name" class="form-control" value="{{Auth::user()->name}}" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>

                  
                  
                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Phone Number</label>

                    <div class="col-sm-10">
                      <input class="form-control" value="{{Auth::user()->phone_number}}" name="phone_number" type="text" id="inputExperience" placeholder="Phone Number">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Address</label>

                    <div class="col-sm-10">
                      <input type="text" name="address" value="{{Auth::user()->address}}" class="form-control" id="inputSkills" placeholder="Address">
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Latitude</label>

                    <div class="col-sm-10">
                      <input type="text" name="lat" value="{{Auth::user()->lat}}" class="form-control" id="inputSkills" placeholder="Latitude">
                    </div>
                  </div>
                   <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Longitude</label>

                    <div class="col-sm-10">
                      <input type="text" name="lng" value="{{Auth::user()->lng}}" class="form-control" id="inputSkills" placeholder="Longitude">
                    </div>
                  </div>
                
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-danger">Submit</button>
                    </div>
                  </div>
                  {!! Form::close() !!}
                  </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 

 
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
