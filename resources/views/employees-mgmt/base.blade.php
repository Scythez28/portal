@extends('layouts.app-template')
@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Employee Setup
      </h1>
      <ol class="breadcrumb">
          <li><a href="{{ url('employee-management') }}"><i class="fa fa-dashboard"></i>User Management</a></li>
          <li class="active">Employee Setup</li>
      </ol>
    </section>
    @yield('action-content')
    <!-- /.content -->
  </div>
@endsection