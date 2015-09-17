@extends('layouts.panel')
@section('panel-title', 'Registrars')
@section('content')
      <table class="table">
        <thead>
          <tr>
            <th>name</th>
            <th>url</th>
          </tr>
        </thead>
        <tbody>
          @foreach($registrars as $registrar)

          <tr>
            <td><a href="/domain/registrar/{{ $registrar->id }}">{{$registrar->name}}</a></td>
            <td>{{$registrar->url}}</td>
          </tr>

          @endforeach

          <tr>
            <td><a href="/domain/registrar/create" class="btn btn-primary">Add</a></td>
            <td></td>
          </tr>
        </tbody>
      </table>
@stop