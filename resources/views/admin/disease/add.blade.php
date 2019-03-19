@extends('admin.layouts.layout')
@section('title')
  Add New Disease
@endsection
@section('content')

<form class="form-horizontal" role="form" method="POST" action="{{ url('/adminpanel/diseases') }}" enctype="multipart/form-data">

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Disease</div>
                <div class="panel-body">

                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Disease name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description" value="{{ old('description') }}">

                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('treatment') ? ' has-error' : '' }}">
                            <label for="treatment" class="col-md-4 control-label">Treatment</label>

                            <div class="col-md-6">
                                <input id="treatment" type="text" class="form-control" name="treatment" value="{{ old('treatment') }}">

                                @if ($errors->has('treatment'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('treatment') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('symptoms[]') ? ' has-error' : '' }}">
                            <label for="symptom1" class="col-md-4 control-label">Symptom 1</label>

                            <div class="col-md-6">
                                <select name="symptoms[]" class="form-control input-sum">
                                    <option value="null">Null</option>
                                   @foreach($symptoms as $sym)
                                   <option value="{{$sym->id}}">{{$sym->name}}</option>
                                   @endforeach
                               </select>

                                @if ($errors->has('symptoms[]'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('symptoms[]') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('symptoms[]') ? ' has-error' : '' }}">
                            <label for="symptom1" class="col-md-4 control-label">Symptom 2</label>

                            <div class="col-md-6">
                                <select name="symptoms[]" class="form-control input-sum">
                                    <option value="null">Null</option>
                                   @foreach($symptoms as $sym)
                                   <option value="{{$sym->id}}">{{$sym->name}}</option>
                                   @endforeach
                               </select>

                                @if ($errors->has('symptoms[]'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('symptoms[]') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('symptoms[]') ? ' has-error' : '' }}">
                            <label for="symptom1" class="col-md-4 control-label">Symptom 3</label>

                            <div class="col-md-6">
                                <select name="symptoms[]" class="form-control input-sum">
                                    <option value="null">Null</option>
                                   @foreach($symptoms as $sym)
                                   <option value="{{$sym->id}}">{{$sym->name}}</option>
                                   @endforeach
                               </select>

                                @if ($errors->has('symptoms[]'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('symptoms[]') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      
                        

                          
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                </button>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection