@extends('admin.layouts.layout')
@section('title')
  Edit User Information
@endsection
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update</div>
                    <div class="panel-body">
{!! Form::open(['action' => ['UserController@update',$user->id],'method' => 'PATCH']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', $user->name,['class' => 'form-control','placeholder'=>'Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('email', 'Email')}}
        {{Form::text('email', $user->email ,['class' => 'form-control','placeholder'=>'Email'])}}
    </div>
     <div class="form-group">
        {{Form::label('address', 'Address')}}
        {{Form::text('address', $user->address ,['class' => 'form-control','placeholder'=>'Address'])}}
    </div>
     <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                            <label for="city" class="col-md-4 control-label"> City</label>

                            <div>
                                <select name="city" class="form-control input-sum">
                                    @foreach($city as $cit)
                                  <option value="{{$cit->id}}"  
                                                    {{ $user->city->name == $cit->name ? 'selected="selected"' : '' }}
                                                    >{{$cit->name}}
                                                    

                                                </option>
                                                @endforeach
                               </select>

                                @if ($errors->has('city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
     <div class="form-group">
        {{Form::label('lat', 'Latitude')}}
        {{Form::text('lat', $user->lat ,['class' => 'form-control','placeholder'=>'Latitude'])}}
    </div>
    <div class="form-group">
        {{Form::label('lng', 'Longitude')}}
        {{Form::text('lng', $user->lng ,['class' => 'form-control','placeholder'=>'Longitude'])}}
    </div>
     <div class="form-group">
        {{Form::label('phone_number', 'Phone Number')}}
        {{Form::text('phone_number', $user->phone_number ,['class' => 'form-control','placeholder'=>'Phone Number'])}}
    </div>
     
    <div class="form-group">
            {{Form::label('admin', 'User Type')}}
            {!!Form::select('role',['patient'=>'Patient','doctor'=>'Doctor','admin'=>'Admin'],$user->role,['class'=>'form-control']) !!}
        </div>

        

         

    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
</div>


@endsection