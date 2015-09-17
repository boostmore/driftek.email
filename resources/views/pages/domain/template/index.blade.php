@extends('layouts.panel')
@section('panel-title', 'DNS Templates')
@section('content')
      <table class="table table-responsive">
        <thead>
          <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Created</th>
            <th>Updated</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
        @if(isset($dnsTemplates))
          @foreach($dnsTemplates as $dnsTemplate)

          <tr>
            <td><a href="/domain/template/{{$dnsTemplate->id}}">{{$dnsTemplate->name}}</a></td>
            <td>{{$dnsTemplate->description}}</td>
            <td>{{$dnsTemplate->created_at}}</td>
            <td>{{$dnsTemplate->updated_at}}</td>
            <td>
              {!!Form::model($dnsTemplate,array('url' => 'domain/template/' . $dnsTemplate->id, 'method' => 'DELETE'))!!}
              {!!Form::button(null, array('class' => 'btn-sm btn btn-danger glyphicon glyphicon-remove','type' => 'submit'))!!}
              {!!Form::close()!!}

            </td>
          </tr>

          @endforeach
        @endif
        <tr>
          <td><a href="/domain/template/create" class="btn btn-primary">Add</a></td>
          <td colspan="4"></td>
        </tr>

        </tbody>
      </table>
@stop