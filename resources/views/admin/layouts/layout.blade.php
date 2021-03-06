<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
    AdminLTE 2 
    |
@yield('title')

  </title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  @yield('header')
  {!! Charts::styles() !!}
  <!-- Bootstrap 3.3.7 -->
  {!!Html::style('admin/bower_components/bootstrap/dist/css/bootstrap.min.css') !!}
 
  <!-- Font Awesome -->
  {!!Html::style('admin/bower_components/font-awesome/css/font-awesome.min.css') !!}
  
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
  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
       
        <div class="wrapper">

                <header class="main-header">
                  <!-- Logo -->
                  <a href="{{url('/adminpanel')}}" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>LT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Admin</b>LTE</span>
                  </a>
                  <!-- Header Navbar: style can be found in header.less -->
                  <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                      <span class="sr-only">Toggle navigation</span>
                    </a>
              
                    <div class="navbar-custom-menu">
                      <ul class="nav navbar-nav">
                        
                        
                        
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/images/{{ Auth::user()->image  }}" class="user-image" alt="User Image">
                          <span class="hidden-xs">{{Auth::user()->name}}</span>
                          </a>
                          <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                              <img src="/images/{{ Auth::user()->image  }}" class="img-circle" alt="User Image">
              
                              <p>
                              {{Auth::user()->name}}- Web Developer
                              <small>Member since {{Auth::user()->created_at}}</small>
                              </p>
                            </li>
                            <!-- Menu Body -->
                           
                            <!-- Menu Footer-->
                            <li class="user-footer">
                              <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                              </div>
                              <div class="pull-right">
                                <a href="auth/logout" class="btn btn-default btn-flat">Sign out</a>
                              </div>
                            </li>
                          </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <li>
                          <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                      </ul>
                    </div>
                  </nav>
                </header>
                <!-- Left side column. contains the logo and sidebar -->
                <aside class="main-sidebar">
                  <!-- sidebar: style can be found in sidebar.less -->
                  <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                      <div class="pull-left image">
                      <img src="/images/{{ Auth::user()->image  }}" class="img-circle" alt="User Image">
                      </div>
                      <div class="pull-left info">
                      <p>{{Auth::user()->name}}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                      </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                      <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                              </button>
                            </span>
                      </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    
                      <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MAIN NAVIGATION</li>
                        <li class="active treeview">
                            <ul class="treeview-menu">
                                <li class="active"><a href="/"><i class="fa fa-home"></i>Go To Website</a></li>
                                
                              </ul>
                        </li>


                        <li class="active treeview">
                          <a href="#">
                            <i class="fa fa-users"></i> <span>User Control</span>
                            <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                            </span>
                          </a>
                          <ul class="treeview-menu">
                            <li class="active"><a href="/adminpanel/users/create"><i class="fa fa-user-plus"></i>Add New User</a></li>
                            <li><a href="/adminpanel/users"><i class="fa fa-user"></i> All Users</a></li>
                          </ul>
                        </li>

                       


                          <li class="active treeview">
                            <a href="#">
                              <i class="fa fa-stethoscope"></i> <span>Diseases Control</span>
                              <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                              </span>
                            </a>
                            <ul class="treeview-menu">
                              <li class="active"><a href="/adminpanel/diseases/create"><i class="fa fa-stethoscope"></i>Add New Disease</a></li>
                              <li><a href="/adminpanel/diseases"><i class="fa fa-stethoscope"></i> All Diseases</a></li>
                            </ul>
                          </li>

                          <li class="active treeview">
                              <a href="#">
                                <i class="fa fa-h-square" ></i> <span>Symptoms Control</span>
                                <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                                </span>
                              </a>
                              <ul class="treeview-menu">
                                <li class="active"><a href="/adminpanel/symptoms/create"><i class="fa fa-h-square" style="color:white"></i>Add New Symptom</a></li>
                                <li><a href="/adminpanel/symptoms"><i class="fa fa-h-square" style="color:white"></i> All Symptoms</a></li>
                              </ul>
                            </li>
                              <li class="active treeview">
                              <a href="#">
                                <i class="fa fa-tasks" ></i> <span>Users Activities</span>
                                <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                                </span>
                              </a>
                              <ul class="treeview-menu">
                                <li class="active"><a href="/adminpanel/activites"><i class="fa fa-tasks" style="color:white"></i>Show All Activites</a></li>
                              </ul>
                            </li>
<li class="active treeview">
                              <a href="#">
                                <i class="fa fa-comments-o" ></i> <span>Feedbacks</span>
                                <span class="pull-right-container">
                                  <i class="fa fa-angle-left pull-right"></i>
                                </span>
                              </a>
                              <ul class="treeview-menu">
                                <li class="active"><a href="/adminpanel/feedbacks"><i class="fa fa-comments-o" style="color:white"></i>Show All Feedbacks</a></li>
                              </ul>
                            </li>

                            



                             
  


                     

                        
                       
                      
                      
                       
                       
                     
                        
                        
                       
                       
                      
                    </ul>
                  </section>
                  <!-- /.sidebar -->
                </aside>
                <div class="content-wrapper">
                        
                        @yield('content')

                      </div>


      


               
                      <!-- Control Sidebar -->
                      <aside class="control-sidebar control-sidebar-dark">
                        <!-- Create the tabs -->
                        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                          <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                          <!-- Home tab content -->
                          <div class="tab-pane" id="control-sidebar-home-tab">
                            <h3 class="control-sidebar-heading">Recent Activity</h3>
                            <ul class="control-sidebar-menu">
                              <li>
                                <a href="javascript:void(0)">
                                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                    
                                  <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    
                                    <p>Will be 23 on April 24th</p>
                                  </div>
                                </a>
                              </li>
                              <li>
                                <a href="javascript:void(0)">
                                  <i class="menu-icon fa fa-user bg-yellow"></i>
                    
                                  <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                    
                                    <p>New phone +1(800)555-1234</p>
                                  </div>
                                </a>
                              </li>
                              <li>
                                <a href="javascript:void(0)">
                                  <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                    
                                  <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                    
                                    <p>nora@example.com</p>
                                  </div>
                                </a>
                              </li>
                              <li>
                                <a href="javascript:void(0)">
                                  <i class="menu-icon fa fa-file-code-o bg-green"></i>
                    
                                  <div class="menu-info">
                                    <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                    
                                    <p>Execution time 5 seconds</p>
                                  </div>
                                </a>
                              </li>
                            </ul>
                            <!-- /.control-sidebar-menu -->
                    
                            <h3 class="control-sidebar-heading">Tasks Progress</h3>
                            <ul class="control-sidebar-menu">
                              <li>
                                <a href="javascript:void(0)">
                                  <h4 class="control-sidebar-subheading">
                                    Custom Template Design
                                    <span class="label label-danger pull-right">70%</span>
                                  </h4>
                    
                                  <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                  </div>
                                </a>
                              </li>
                              <li>
                                <a href="javascript:void(0)">
                                  <h4 class="control-sidebar-subheading">
                                    Update Resume
                                    <span class="label label-success pull-right">95%</span>
                                  </h4>
                    
                                  <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                                  </div>
                                </a>
                              </li>
                              <li>
                                <a href="javascript:void(0)">
                                  <h4 class="control-sidebar-subheading">
                                    Laravel Integration
                                    <span class="label label-warning pull-right">50%</span>
                                  </h4>
                    
                                  <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                                  </div>
                                </a>
                              </li>
                              <li>
                                <a href="javascript:void(0)">
                                  <h4 class="control-sidebar-subheading">
                                    Back End Framework
                                    <span class="label label-primary pull-right">68%</span>
                                  </h4>
                    
                                  <div class="progress progress-xxs">
                                    <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                                  </div>
                                </a>
                              </li>
                            </ul>
                            <!-- /.control-sidebar-menu -->
                    
                          </div>
                          <!-- /.tab-pane -->
                          <!-- Stats tab content -->
                          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                          <!-- /.tab-pane -->
                          <!-- Settings tab content -->
                          <div class="tab-pane" id="control-sidebar-settings-tab">
                            <form method="post">
                              <h3 class="control-sidebar-heading">General Settings</h3>
                    
                              <div class="form-group">
                                <label class="control-sidebar-subheading">
                                  Report panel usage
                                  <input type="checkbox" class="pull-right" checked>
                                </label>
                    
                                <p>
                                  Some information about this general settings option
                                </p>
                              </div>
                              <!-- /.form-group -->
                    
                              <div class="form-group">
                                <label class="control-sidebar-subheading">
                                  Allow mail redirect
                                  <input type="checkbox" class="pull-right" checked>
                                </label>
                    
                                <p>
                                  Other sets of options are available
                                </p>
                              </div>
                              <!-- /.form-group -->
                    
                              <div class="form-group">
                                <label class="control-sidebar-subheading">
                                  Expose author name in posts
                                  <input type="checkbox" class="pull-right" checked>
                                </label>
                    
                                <p>
                                  Allow the user to show his name in blog posts
                                </p>
                              </div>
                              <!-- /.form-group -->
                    
                              <h3 class="control-sidebar-heading">Chat Settings</h3>
                    
                              <div class="form-group">
                                <label class="control-sidebar-subheading">
                                  Show me as online
                                  <input type="checkbox" class="pull-right" checked>
                                </label>
                              </div>
                              <!-- /.form-group -->
                    
                              <div class="form-group">
                                <label class="control-sidebar-subheading">
                                  Turn off notifications
                                  <input type="checkbox" class="pull-right">
                                </label>
                              </div>
                              <!-- /.form-group -->
                    
                              <div class="form-group">
                                <label class="control-sidebar-subheading">
                                  Delete chat history
                                  <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                                </label>
                              </div>
                              <!-- /.form-group -->
                            </form>
                          </div>
                          <!-- /.tab-pane -->
                        </div>
                      </aside>
                      <!-- /.control-sidebar -->
                      <!-- Add the sidebar's background. This div must be placed
                           immediately after the control sidebar -->
                      <div class="control-sidebar-bg"></div>
                    </div>


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
  @include('sweetalert::alert')`

@yield('footer')

<style>
  .chat {
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .chat li {
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
  }

  .chat li .chat-body p {
    margin: 0;
    color: #777777;
  }

  .panel-body {
    overflow-y: scroll;
    height: 350px;
  }

  ::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
  }

  ::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5;
  }

  ::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
  }
</style>

</body>
</html>