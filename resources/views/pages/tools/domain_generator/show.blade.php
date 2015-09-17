@extends('layouts.default')
@section('content')
  <div class="panel panel-default">
    <div class="panel-heading clearfix">
      <div class="btn-group pull-right">
        <button class="btn btn-sm btn-primary clip_button" data-clipboard-target="clip_text">Copy</button>
      </div>
      <h3 class="panel-title" style="padding-top:7px;">Domains</h3>
    </div>
    <div class="panel-body">
      <ul class="list-unstyled" id="clip_text">
@foreach($domains as $domain)
<li>{{ $domain }}</li>
@endforeach
      </ul>
    </div>
@stop