@extends('layouts.panel')
@section('panel-title', 'Registrar Accounts')
@section('content')
  <table class="table">
    <thead>
      <tr>
        <th>User Name</th>
        <th>Registrar</th>
        <th>Domain Count</th>
      </tr>
    </thead>
    <tr>
    @foreach($accounts as $account)
      <td>{{ $account->username }}</td>
      <td>{{ $account->registrar->name }}</td>
      <td></td>
    </tr>
    @endforeach
  </table>
@stop