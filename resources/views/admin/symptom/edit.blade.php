@extends('admin.layouts.layout')
@section('title')
  Edit Symptoms
@endsection
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update</div>
{!! Form::open(['action' => ['SymptomController@update',$symptom->id],'method' => 'PATCH']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', $symptom->name,['class' => 'form-control','placeholder'=>'Name'])}}
    </div>
    

        

         

    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
                </div>
            </div>
        </div>
</div>


@endsection