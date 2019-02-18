@extends('layouts.app')

@section('content')
<aside id="colorlib-hero" class="breadcrumbs">
		<div class="flexslider">
			<ul class="slides">
		   	<li style="background-image: url(website/images/img_bg_6.jpg);">
		   		<div class="overlay"></div>
		   		<div class="container">
		   			<div class="row">
			   			<div class="col-md-8 col-md-offset-2 col-md-pull-2 slider-text">
			   				<div class="slider-text-inner">
			   					<h1>Get in <strong>touch</strong></h1>
									<h2>html5 Bootstrap Templates Made by colorlib.com</h2>
			   				</div>
			   			</div>
			   		</div>
		   		</div>
		   	</li>
		  	</ul>
	  	</div>
	</aside>

	<div id="colorlib-contact">
		<div class="container">
			<div class="row">
				<div class="col-md-12 animate-box">
					<h2>Contact Information</h2>
					<div class="row contact-info-wrap">
						<div class="col-md-3">
							<p><span><i class="icon-location"></i></span> 198 West 21th Street, <br> Suite 721 New York NY 10016</p>
						</div>
						<div class="col-md-3">
							<p><span><i class="icon-phone"></i></span> <a href="tel://1234567920">+ 1235 2355 98</a></p>
						</div>
						<div class="col-md-3">
							<p><span><i class="icon-mail"></i></span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
						</div>
						<div class="col-md-3">
							<p><span><i class="icon-globe-outline"></i></span> <a href="#">yoursite.com</a></p>
						</div>
					</div>
				</div>
				<div class="col-md-12 animate-box">
					<div class="row">
						<div class="col-md-6">
							<h2>Get In Touch</h2>
							<form action="#">
								<div class="row form-group">
									<div class="col-md-6">
										<label for="fname">First Name</label>
										<input type="text" id="fname" class="form-control mb" placeholder="Your firstname">
									</div>
									<div class="col-md-6">
										<label for="lname">Last Name</label>
										<input type="text" id="lname" class="form-control" placeholder="Your lastname">
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="email">Email</label>
										<input type="text" id="email" class="form-control" placeholder="Your email address">
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="subject">Subject</label>
										<input type="text" id="subject" class="form-control" placeholder="Your subject of this message">
									</div>
								</div>

								<div class="row form-group">
									<div class="col-md-12">
										<label for="message">Message</label>
										<textarea name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us"></textarea>
									</div>
								</div>
								<div class="form-group text-center">
									<input type="submit" value="Send Message" class="btn btn-primary">
								</div>
							</form>
						</div>
						<div class="col-md-6">
							<div id="map" class="colorlib-map"></div>
						</div>
					</div>		
				</div>
			</div>
		</div>
	</div>



@endsection