@extends('layouts.default')
@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Domain Generator</h3>
    </div>
    <div class="panel-body">
      <form  class="form-horizontal" role="form" action="/tools/domain_generator" method="POST">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="form-group">
          <label class="control-label col-md-4">Generate</label>
          <div class="col-md-6">
            <input name="domain_count" class="form-control" type="text" placeholder="amount to generate">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-4">Domain TLD</label>
          <div class="col-md-6">
            <select name="tld" class="form-control">
              <option value=".com">.com</option>
              <option value=".net">.net</option>
              <option value=".info">.info</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-4">prefix type</label>
          <div class="col-md-6">
            <select name="prefix_type" class="form-control">
              <option value="">None</option>
              <option value="W">Word</option>
              <option value="A">Alpha</option>
              <option value="N">Numeric</option>
              <option value="AN">AlphaNumeric</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-4">prefix separator</label>
          <div class="col-md-6">
            <select name="prefix_separator" class="form-control">
              <option value="">None</option>
              <option value="-">Dash (-)</option>
              <option value="_">Underscore (_)</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-md-4">prefix max length</label>
          <div class="col-md-6">
            <input name="prefix_length" class="form-control" type="text" name="prefix_max_length">
          </div>
        </div>


        <div class="form-group">
          <label class="control-label col-md-4">postfix type</label>
          <div class="col-md-6">
            <select name="postfix_type" class="form-control">
              <option value="">None</option>
              <option value="W">Word</option>
              <option value="A">Alpha</option>
              <option value="N">Numeric</option>
              <option value="AN">AlphaNumeric</option>
            </select>
          </div>
        </div>


        <div class="form-group">
          <label class="control-label col-md-4">postfix separator</label>
          <div class="col-md-6">
            <select name="postfix_separator" class="form-control">
              <option value="">None</option>
              <option value="-">Dash (-)</option>
              <option value="_">Underscore (_)</option>
            </select>
          </div>
        </div>


        <div class="form-group">
          <label class="control-label col-md-4">postfix max length</label>
          <div class="col-md-6">
            <input name="postfix_length" class="form-control" type="text" name="postfix_max_length">
          </div>
        </div>

        <div class="form-group">
          <div class="col-md-6 col-md-offset-4">
            <button class="btn btn-primary">Submit</button>
          </div>
        </div>


      </form>

    </div>
  </div>
@stop