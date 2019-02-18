@extends('admin.layouts.layout')
@section('title')
  Edit Disease Information
@endsection
@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Update</div>
                    <div class="panel-body">
{!! Form::open(['action' => ['DiseaseController@update',$disease->id],'method' => 'PATCH']) !!}
    <div class="form-group">
        {{Form::label('name', 'Disease Name')}}
        {{Form::text('name', $disease->name,['class' => 'form-control','placeholder'=>'Name'])}}
    </div>
    <div class="form-group{{ $errors->has('symptoms[0]') ? ' has-error' : '' }}">
                                        <label for="symptoms[0]" class="col-md-4 control-label">Symptom 1</label>
            
                                        
                                                <select name="symptoms[0]"  class="form-control">

                                                   <option value="null">Null</option>
                       
                                                        @foreach($symptoms as $sym)
                                                <option value="{{$sym->name}}">{{ $sym->name}}</option>
                                                       

                                                        @endforeach
                                                       </select>
                                            @if ($errors->has('symptoms[0]'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('symptoms[0]') }}</strong>
                                                </span>
                                            @endif
                                            
                                        
                                    </div>

     <div class="form-group{{ $errors->has('symptoms[1]') ? ' has-error' : '' }}">
                                        <label for="symptoms[1]" class="col-md-4 control-label">Symptom 2</label>
            
                                        
                                                <select name="symptoms[1]"  class="form-control">

                                                   <option value="null">Null</option>
                       
                                                        @foreach($symptoms as $sym)
                                                <option value="{{$sym->name}}">{{ $sym->name}}</option>
                                                       

                                                        @endforeach
                                                       </select>
                                            @if ($errors->has('symptoms[1]'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('symptoms[1]') }}</strong>
                                                </span>
                                            @endif
                                            
                                        
                                    </div>

    <div class="form-group{{ $errors->has('symptoms[2]') ? ' has-error' : '' }}">
                                        <label for="symptoms[2]" class="col-md-4 control-label">Symptom 3</label>
            
                                        
                                                <select name="symptoms[2]"  class="form-control">

                                                   <option value="null">Null</option>
                       
                                                        @foreach($symptoms as $sym)
                                                <option value="{{$sym->name}}">{{ $sym->name}}</option>
                                                       

                                                        @endforeach
                                                       </select>
                                            @if ($errors->has('symptoms[2]'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('symptoms[2]') }}</strong>
                                                </span>
                                            @endif
                                            
                                        
                                    </div>
   
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
</div>


@endsection