@extends('layouts.panel')
@section('panel-title', 'Domains')
@section('content')
      <table class="table table-responsive">
        <thead>
          <tr>
            <th>Select</th>
            <th>Name</th>
            <th>Registrar</th>
            <th>Reg Date</th>
            <th>Exp Date</th>
            <th>@ A Record</th>
            <th>DNS Template</th>
            <th>Active</th>
          </tr>
        </thead>
        <tbody>
        @if(isset($domains))
          @foreach($domains as $domain)

          <tr>
            <td>$registrar->name</td>
            <td>$registrar->url</td>
          </tr>

          @endforeach
        @endif
        <tr>
          <td><a href="domain/create" class="btn btn-primary">Add</a></td>
          <td><a href="/domain/bulkcreate" class="btn btn-primary">Bulk Add</a></td>
          <td colspan="6"></td>
        </tr>

        </tbody>
      </table>
@stop