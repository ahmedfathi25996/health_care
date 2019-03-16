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

 
 
<section class="content-header">
        <h1>
          Symptoms Control
         
        </h1>
        
      </section>
<section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Hover Data Table</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#ID</th>
                    <th>Name</th>
                  
                    <th>Created AT</th>
                    <th> Control </th>
                  </tr>
                  </thead>
                  <tbody>
                      @foreach($symptoms as $sym)
                  <tr>
                    <td>{{$sym->id}}</td>
                    <td>{{$sym->name}}</td>
                    
                  <td>{{$sym->created_at}}</td>
                  <td>
                      <a href="/doctor/symptoms/{{$sym->id}}/edit" class="btn btn-primary"> Edit </a>
                      {!! Form::open(['action'=>['symptomByDoctor@destroy',$sym->id],'method'=>'POST','class'=>'pull-right' ])  !!}
                        {{ Form::hidden('_method','DELETE') }}
                        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}    

                      {!! Form::close() !!}
                  </td>
                    
                  </tr>
                @endforeach
                </table>
              </div>
              <!-- /.box-body -->
            </div>
           
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <div class="box-footer clearfix">
              <a href="/doctor/symptoms/create" class="btn btn-sm btn-info btn-flat center ">Add New Symptom</a>
              
            </div>
@endsection

@section('footer')
{!! Html::script('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}

{!! Html::script('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}
<script type="text/javascript">
    $('#example2').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : true,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true
      })

 

 
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
