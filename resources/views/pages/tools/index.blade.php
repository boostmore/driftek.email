@extends('layouts.panel')
@section('panel-title','Tools')
@section('content')
      <table class="table">
        <thead>
          <tr>
            <th class="">Tool Name</th>
            <th>Tool Description</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><a href="/tools/rdns_generator">RDNS Generator</a></td>
            <td>Given a Domain and variables will create Bind Config with PTR Records</td>
          </tr>
          <tr>
            <td><a href="/api/optin/create">Test API Opt In</a></td>
            <td>Form To Test Opt In API</td>
          </tr>
          <tr>
            <td><a href="/tools/domain_generator">Random Domain Generator</a></td>
            <td>Will Spit out random domains</td>
          </tr>
        </tbody>
      </table>
@stop