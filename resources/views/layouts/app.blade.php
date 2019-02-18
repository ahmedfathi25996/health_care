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

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
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
                                    <div id="colorlib-logo"><a href="index.html">Health<span>care</span></a></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="num">
                                        <span class="icon"><i class="icon-phone"></i></span>
                                        <p><a href="#">111-222-333</a><br><a href="#">99-222-333</a></p>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="loc">
                                        <span class="icon"><i class="icon-location"></i></span>
                                        <p><a href="#">88 Route West 21th Street, Suite 721 New York NY 10016</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="menu-wrap">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-8">
                            <div class="menu-1">
                                <ul>
                                    <li class="active"><a href="{{ url('/') }}">Home</a></li>
                                    <li class="has-dropdown">
                                        <a href="{{ url('/doctors') }}">Chat Doctors</a>
                                       
                                    </li>
                                   
                                    <li class="has-dropdown">
                                        <ul class="dropdown">
                                            <li><a href="departments-single.html">Plasetic Surgery Department</a></li>
                                            <li><a href="departments-single.html">Dental Department</a></li>
                                            <li><a href="departments-single.html">Psychological Department</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ url('/diseases') }}">Check Diseases</a></li>
                                    <li><a href="{{ url('/contactus') }}">Contact</a></li>

                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="has-dropdown">
                                        <a href="#"> {{ Auth::user()->name }}</a>
                                        <ul class="dropdown">
                                            <li><a href="{{ url('/profile') }}">My Profile</a></li>
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

    <footer id="colorlib-footer" role="contentinfo">
        <div class="overlay"></div>
        <div class="container">
            <div class="row row-pb-md">
                <div class="col-md-3 colorlib-widget">
                        <h3>Head Office</h3>
                        <ul class="colorlib-footer-links">
                            <li>291 South 21th Street, <br> Suite 721 New York NY 10016</li>
                            <li><a href="tel://1234567920"><i class="icon-phone"></i> + 1235 2355 98</a></li>
                            <li><a href="mailto:info@yoursite.com"><i class="icon-mail"></i> info@yoursite.com</a></li>
                            <li><a href="http://luxehotel.com"><i class="icon-location4"></i> yourwebsite.com</a></li>
                            <li>Mon-Thu: 9:30 – 21:00</li>
                            <li>Fri: 6:00 – 21:00</li>
                            <li>Sat: 10:00 – 15:00</li>
                        </ul>
                    </div>
                    <div class="col-md-2 colorlib-widget">
                        <h3>Departments</h3>
                        <p>
                            <ul class="colorlib-footer-links">
                                <li><a href="#">Neurology</a></li>
                                <li><a href="#">Traumotology</a></li>
                                <li><a href="#">Gynaecology</a></li>
                                <li><a href="#">Nephrology</a></li>
                                <li><a href="#">Cardiology</a></li>
                                <li><a href="#">Pulmonary</a></li>
                            </ul>
                        </p>
                    </div>
                    <div class="col-md-2 colorlib-widget">
                        <h3>Useful Links</h3>
                        <p>
                            <ul class="colorlib-footer-links">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Departments</a></li>
                                <li><a href="#">Doctors</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">News</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </p>
                    </div>

                    <div class="col-md-2 colorlib-widget">
                        <h3>Support</h3>
                        <p>
                            <ul class="colorlib-footer-links">
                                <li><a href="#">Documentation</a></li>
                                <li><a href="#">Forums</a></li>
                                <li><a href="#">Help &amp; Support</a></li>
                                <li><a href="#">Scholarship</a></li>
                                <li><a href="#">Student Transport</a></li>
                                <li><a href="#">Release Status</a></li>
                            </ul>
                        </p>
                    </div>

                <div class="col-md-3 colorlib-widget">
                    <h3>Make an Appointment</h3>
                    <form class="contact-form">
                        <div class="form-group">
                            <label for="name" class="sr-only">Name</label>
                            <input type="name" class="form-control" id="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="message" class="sr-only">Message</label>
                            <textarea class="form-control" id="message" rows="3" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" id="btn-submit" class="btn btn-primary btn-send-message btn-md" value="Send Message">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row copyright">
            <div class="col-md-12 text-center">
                <p>
                    <small class="block">&copy; <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></small>
                    <small class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a> , <a href="https://www.pexels.com/" target="_blank">Pexels</a></small>
                </p>
            </div>
        </div>
    </footer>
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












    </body>
</html>
