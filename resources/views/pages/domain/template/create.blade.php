@extends('layouts.panel')
@section('panel-title','DNS Template Creator')
@section('content')

  <form id="dns_template_form" class="form-horizontal" role="form" method="POST" action="/domain/template">
    @include('pages.domain.template._form')
    <div class="col-md-12">
      <button class="btn btn-primary btn-block">Save All</button>
    </div>
  </form>
@stop