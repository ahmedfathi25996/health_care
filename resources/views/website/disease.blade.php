@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Check Diseases</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/check/diseases') }}">
                        {{ csrf_field() }}

                      <div class="form-group{{ $errors->has('symptoms[0]') ? ' has-error' : '' }}">
                                        <label for="symptoms[0]" class="col-md-4 control-label">Symptom 1</label>
            
                                        <div class="col-md-6">
                                                <select name="symptoms[0]"  class="form-control input-sm">

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
                                    </div>


                                     <div class="form-group{{ $errors->has('symptoms[1]') ? ' has-error' : '' }}">
                                        <label for="symptoms[1]" class="col-md-4 control-label">Symptom 2</label>
            
                                        <div class="col-md-6">
                                                <select name="symptoms[1]"  class="form-control input-sm">
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
                                    </div>

                      
                       
                                      <div class="form-group{{ $errors->has('symptoms[2]') ? ' has-error' : '' }}">
                                        <label for="symptoms" class="col-md-4 control-label">Symptom 3</label>
            
                                        <div class="col-md-6">
                                                <select name="symptoms[2]"  class="form-control input-sm">
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
                                    </div>

                                      <div class="form-group{{ $errors->has('symptoms[4]') ? ' has-error' : '' }}">
                                        <label for="symptoms" class="col-md-4 control-label">Symptom 4</label>
            
                                        <div class="col-md-6">
                                                <select name="symptoms[3]"  class="form-control input-sm">
                                                    <option value="null">Null</option>
                                                              @foreach($symptoms as $sym)

                                                <option value="{{$sym->name}}">{{ $sym->name}}</option>
                                                       

                                                        @endforeach
                                                       </select>
                                            @if ($errors->has('symptoms[4]'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('symptoms[4]') }}</strong>
                                                </span>
                                            @endif
                                            
                                        </div>
                                    </div>
                     

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i> Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
