@extends('.........layouts.default')
@section('content')

  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">Opt In Manual Entry</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" role="form" method="POST" action="/api/optin">
            <div class="form-group">
              <label class="col-md-4 control-label">Email</label>
              <div class="col-md-6">
                <input type="text" name="email" class="form-control" placeholder="email" value="email@email.com">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">Opt In Create Date</label>
              <div class="col-md-6">
                <input type="datetime" name="optin_date" class="form-control" placeholder="{{ date("Y-m-d H:m:s") }}" value="{{ date('Y-m-d H:m:s') }}">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">Opt In IP Address</label>
              <div class="col-md-6">
                <input type="text" name="ip_address" class="form-control" placeholder="1.2.3.4" value="1.2.3.4">
              </div>
            </div>
            <div class="form-group">
              <label class="col-md-4 control-label">Opt In URL</label>
              <div class="col-md-6">
                <input type="text" name="optin_url" class="form-control" placeholder="www.url.com" value="url.com">
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