@extends('layouts.panel')
@section('panel-title', 'Registrar Account Add')
@section('content')
{!! Form::open( array(
    'url'    => 'domain/registrar/account',
    'method' => 'POST',
    'class'  => "form-horizontal",
    'role'   => "form")) !!}

<div class="form-group">
  {!! Form::label('username','Username',['class' => 'control-label col-md-4']) !!}
  <div class="col-md-6">
  {!! Form::text('username',null,['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('password','Password',['class' => 'control-label col-md-4']) !!}
  <div class="col-md-6">
  {!! Form::text('password',null,['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('first','First Name',['class' => 'control-label col-md-4']) !!}
  <div class="col-md-6">
  {!! Form::text('first',null,['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('last','Last Name',['class' => 'control-label col-md-4']) !!}
  <div class="col-md-6">
  {!! Form::text('last',null,['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('email','Email',['class' => 'control-label col-md-4']) !!}
  <div class="col-md-6">
  {!! Form::text('email',null,['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('address','Address',['class' => 'control-label col-md-4']) !!}
  <div class="col-md-6">
  {!! Form::text('address',null,['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('city','City',['class' => 'control-label col-md-4']) !!}
  <div class="col-md-6">
  {!! Form::text('city',null,['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('state','State',['class' => 'control-label col-md-4']) !!}
  <div class="col-md-6">
  {!! Form::text('state',null,['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('zip','Zip',['class' => 'control-label col-md-4']) !!}
  <div class="col-md-6">
  {!! Form::text('zip',null,['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('phone','Phone',['class' => 'control-label col-md-4']) !!}
  <div class="col-md-6">
  {!! Form::text('phone',null,['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('registrar_id','Registrar',['class' => 'control-label col-md-4']) !!}
  <div class="col-md-6">
    {!! Form::select('registrar_id',$registrars,null, ['class' => 'form-control',]) !!}
  </div>
</div>

<div class="col-md-6 col-md-offset-4">
{!! Form::submit('Submit',array('class' => 'btn btn-primary')) !!}
</div>

{!! Form::close() !!}
@stop