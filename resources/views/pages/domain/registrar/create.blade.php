@extends('layouts.panel')
@section('panel-title', 'Registrar Add')
@section('content')
{!! Form::open( array(
    'id'     => 'registrar_template_form',
    'url'    => 'domain/registrar',
    'method' => 'POST',
    'class'  => "form-horizontal",
    'role'   => "form")) !!}

<div class="form-group">
  {!! Form::label('name','Name', ['class' => 'control-label col-md-4']) !!}
  <div class="col-md-6">
  {!! Form::text('name',null,['class'=> 'form-control','data-validation' => 'required']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('url','Url',['class' => 'control-label col-md-4']) !!}
  <div class="col-md-6">
  {!! Form::text('url',null,['class'=> 'form-control','data-validation' => 'required']) !!}
  </div>
</div>

<div class="col-md-6 col-md-offset-4">
{!! Form::submit('Submit',['class' => 'btn btn-primary']) !!}
</div>

{!! Form::close() !!}
@stop