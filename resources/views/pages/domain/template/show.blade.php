@extends('layouts.panel')
@section('panel-title',$dnsTemplate->name)
@section('content')

      <p>{{ $dnsTemplate->description }}</p>
<br>
    <table class="table" id="rr_table">
      <thead>
        <tr>
          <th>Sub Domain</th>
          <th>Data</th>
          <th>Record Type</th>
          <th>TTL</th>
          <th>Pref/Aux</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($dnsTemplate->rrs as $rr)
          <tr>
            <td>{{ $rr->name }}</td>
            <td>{{ $rr->data }}</td>
            <td>{{ $rr->type }}</td>
            <td>{{ $rr->ttl }}</td>
            <td>{{ $rr->aux }}</td>
            <td></td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <a href="/domain/template/{{ $dnsTemplate->id }}/edit" class="btn btn-primary">Edit</a>
@stop