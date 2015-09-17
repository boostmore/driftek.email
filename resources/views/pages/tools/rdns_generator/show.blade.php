@extends('layouts.default')
@section('content')
  <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">RDNS Configuration </h3>
    </div>
    <div class="panel-body">

    <div class="clearfix">
      <div class="btn-group pull-right">
        <button class="btn btn-sm btn-primary clip_button" data-clipboard-target="bind_text">Copy</button>
      </div>
    <h4>/etc/named.conf (add to bottom)</h4>
    <pre id="bind_text">
zone "{{ $inaddr }}" IN {
        type master;
        file "{{ $inaddr }}";
        allow-update { none; };
};
</pre>
    </div>

    <div class="clearfix">

      <div class="btn-group pull-right">
        <button class="btn btn-sm btn-primary clip_button" data-clipboard-target="rdns_text">Copy</button>
      </div>
      <h4>/var/named/{{ $inaddr }}</h4>
      <pre id="rdns_text">
$TTL    2d ; 24 hours, could have been written as 24h or 1d
$ORIGIN {{ $inaddr }}.
@  IN SOA ns1.colabsystems.net. hostmaster.colabsystems.net. (
                            {{ date('Ymd') }}01 ; serial
                            1h ; refresh
                            10m ; retry
                            2w ; expire
                            1h ; minimum
                           )
       NS {{ Request::get('ns1') }}.
       NS {{ Request::get('ns2') }}.

@for( $i = Request::get("octet_start"); $i <= Request::get("octet_end"); $i++)
{{$i}} IN PTR {{array_pop($domains)}}.{{ Request::get('rdns_domain') }}.
@endfor
      </pre>
    </div>



  </div>
@stop