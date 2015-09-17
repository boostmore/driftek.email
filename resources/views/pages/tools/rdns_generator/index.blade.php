@extends('layouts.default')
@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">RDNS Generator</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="/tools/rdns_generator">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="form-group">
                <label class="col-md-4 control-label">RDNS Domain</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="rdns_domain" value="{{ old('rdns_domain') }}" placeholder="rdns.domain">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Range</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="range" value="{{ old('range') }}" placeholder="123.123.123.0">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Octet Start</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="octet_start" value="{{ old('octet_start') }}" placeholder="0">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Octet End</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="octet_end" value="{{ old('octet_end') }}" placeholder="255">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">NS1</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="ns1" value="{{ old('ns1') }}" placeholder="ns1.domain.example">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">NS2</label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="ns2" value="{{ old('ns2') }}" placeholder="ns2.domain.example">
                </div>
            </div>
            <div class="form-group">
               <div class="col-md-6 col-md-offset-4">
                   <button type="submit" class="btn btn-primary" style="margin-right: 15px;">Generate</button>
              </div>
            </div>
        </form>

    </div>
  </div>
@stop
