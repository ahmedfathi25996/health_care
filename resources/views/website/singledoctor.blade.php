@extends('layouts.app')

@section('content')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style type="text/css">
    body{padding-top:30px;}

.glyphicon {  margin-bottom: 10px;margin-right: 10px;}

small {
display: block;
line-height: 1.428571429;
color: #999;
}
</style>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <img src='{{ asset("images/{$doctor->image}") }}' alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <h4>
                            {{$doctor->name}}</h4>
                        <small><cite title="San Francisco, USA">{{$doctor->address}} <i class="glyphicon glyphicon-map-marker">
                        </i></cite></small>
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>{{$doctor->email}}
                            <br />
                            <i class="glyphicon glyphicon-phone "></i>Mobile Number : {{$doctor->phone_number}}
                            <br />
                            
                            <i class="glyphicon glyphicon-road "></i>Latitude : {{$doctor->lat}}</p>
                              <i class="glyphicon glyphicon-road"></i>Longitude : {{$doctor->lng}}</p>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection