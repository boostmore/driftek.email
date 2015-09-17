@extends('layouts.panel')
@section('panel-title', 'Domain Insert')
@section('content')
{!! Form::open( array(
    'url'    => '/domain/bulkcreate',
    'method' => 'POST',
    'class'  => "form-horizontal",
    'role'   => "form")) !!}

<div class="form-group">
    {!! Form::label('domains','Domains',array('class' => 'control-label col-md-4')) !!}
  <div class="col-md-6">
    {!! Form::textarea('domains','', array( 'class' => 'form-control',
         'rows'  => '5',)) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('purchased_on','Purchased on',['class' => 'control-label col-md-4']) !!}
  <div class="col-md-6">
  {!! Form::input('date','purchased_on',null,['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('expires_on','Expires on',['class' => 'control-label col-md-4']) !!}
  <div class="col-md-6">
  {!! Form::input('date','expires_on',null,['class' => 'form-control']) !!}
  </div>
</div>

<div class="form-group">
    {!! Form::label('dnsTemplate','DNS Template',array('class' => 'control-label col-md-4')) !!}
  <div class="col-md-6">
    {!! Form::select('dns_template_id',$dnsTemplates,null, array( 'class' => 'form-control',)) !!}
  </div>
</div>

<div class="form-group">
  {!! Form::label('registrar_account_id','Registrar Account',['class' => 'control-label col-md-4']) !!}
  <div class="col-md-6">
    {!! Form::select('registrar_account_id',$accounts,null, ['class' => 'form-control',]) !!}
  </div>
</div>

<div class="form-group">
  <div class="col-md-6 col-md-offset-4">
    {!! Form::submit('Submit', array( 'class' => 'btn btn-primary' )) !!}
  </div>
</div>

{!! Form::close() !!}
@stop