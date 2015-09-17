@extends('layouts.panel')
@section('panel-title','DNS Template Update')
@section('content')

  <form id="dns_template_form" class="form-horizontal" role="form" method="POST" action="/domain/template/{{$dnsTemplate->id}}">
  <input type="hidden" name="_method" value="PUT">
    @include('pages.domain.template._form')
    <div class="col-md-12">
      <button class="btn btn-primary btn-block">Update</button>
    </div>
  </form>
@stop