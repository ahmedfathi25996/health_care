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
                        @foreach($disease->symptoms as $sym)

    <div class="form-group{{ $errors->has('symptoms') ? ' has-error' : '' }}">
                   <label for="symptoms" class="col-md-4 control-label">Symptom </label>
            
                                        
                                                <select name="symptoms[]"  class="form-control">

                                             @foreach($symptoms as $symptom)
                                                <option value="{{$symptom->id}}"  
                                                    {{ $sym->name == $symptom->name ? 'selected="selected"' : '' }}
                                                    >{{$symptom->name}}
                                                    

                                                </option>
                                                  @endforeach     

                                                       </select>
                                            @if ($errors->has('symptoms'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('symptoms[0]') }}</strong>
                                                </span>
                                            @endif
                                            
                                        
                                    </div>
                                                        @endforeach

   
    {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
{!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
</div>


@endsection