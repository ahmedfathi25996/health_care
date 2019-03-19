<!DOCTYPE HTML>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Healthcare Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
    <meta property="og:title" content=""/>
    <meta property="og:image" content=""/>
    <meta property="og:url" content=""/>
    <meta property="og:site_name" content=""/>
    <meta property="og:description" content=""/>
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {!!Html::style('website/css/animate.css') !!}
    {!!Html::style('website/css/icomoon.css') !!}
    {!!Html::style('website/css/bootstrap.css') !!}
    {!!Html::style('website/css/owl.carousel.min.css') !!}
    {!!Html::style('website/css/owl.theme.default.min.css') !!}
    {!!Html::style('website/css/flexslider.css') !!}
    {!!Html::style('website/fonts/flaticon/font/flaticon.css') !!}

    {!!Html::style('website/css/style.css') !!}

  {!!Html::script('website/js/modernizr-2.6.2.min.js') !!}


    </head>
    <body>

    <div class="colorlib-loader"></div>

    <div id="page">
    <nav class="colorlib-nav" role="navigation">
        <div class="top-menu">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="top">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="colorlib-logo"><a href="/">Health<span>care </span></a></div>
                                </div>
                                
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-10">
                            <div class="menu-1">
                                <ul>
                                    <li class="active"><a href="{{ url('/') }}">Home</a></li>

                   
                                   
                                   
                                    <li><a href="{{ url('/diseases') }}">Check Diseases</a></li>
                                     
                                    <li><a href="{{ url('/contactus') }}">Contact</a></li>

                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                    @if(Auth::user()->role != 'admin' && Auth::user()->role == 'patient')
                    <li class="has-dropdown">  <a href="{{ url('/doctors') }}">Chat</a></li>
                    <li class="has-dropdown">  <a href="{{ url('/show/doctors') }}">Show Doctors</a></li>
                                       @endif

                     @if(Auth::user()->role == 'doctor')
                      <li class="has-dropdown">  <a href="{{ url('/show/patients') }}">Show Patients</a></li>
                     @endif                  
                        <li class="has-dropdown">
                                        <a href="#"> {{ Auth::user()->name }}</a>
                                        <ul class="dropdown">
                                            <li><a href="{{ url('/user/profile') }}">My Profile</a></li>
                                            @if(Auth::user()->role == 'admin')
                                            <li><a href="{{ url('/adminpanel') }}">Adminpanel</a></li>
                                            @endif
                                             @if(Auth::user()->role == 'doctor')
                                            <li><a href="{{ url('/doctor/symptoms') }}">Symptoms</a></li>
                                            <li><a href="{{ url('/doctor/diseases') }}">Diseases</a></li>
                                            @endif

                                            <li><a href="{{ url('auth/logout') }}">Logout</a></li>

                                        </ul>
                                    </li>
                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
    </div>
      {!!Html::script('website/js/jquery.min.js') !!}
      {!!Html::script('website/js/jquery.easing.1.3.js') !!}
      {!!Html::script('website/js/bootstrap.min.js') !!}
      {!!Html::script('website/js/jquery.waypoints.min.js') !!}
      {!!Html::script('website/js/jquery.stellar.min.js') !!}
      {!!Html::script('website/js/owl.carousel.min.js') !!}
      {!!Html::script('website/js/jquery.flexslider-min.js') !!}
      {!!Html::script('website/js/jquery.countTo.js') !!}
      {!!Html::script('website/js/jquery.magnific-popup.min.js') !!}
      {!!Html::script('website/js/magnific-popup-options.js') !!}
      {!!Html::script('website/js/sticky-kit.min.js') !!}
      {!!Html::script('website/js/main.js') !!}
@include('sweetalert::alert')`


<!-- Footer -->
<footer class="page-footer font-small blue pt-4">

    

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2019 Copyright:
      <a href="#">Ahmed Fathi</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->









    </body>
</html>
