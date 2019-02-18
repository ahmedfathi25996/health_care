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