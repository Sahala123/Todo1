@extends('layouts.app')

@section('menu')
    <li class="header">HEADER</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="active"><a href="/admin"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
    <li><a href="/add"><i class="fa fa-table"></i> <span>ADD </span></a></li>
 

@endsection

@section('content')
    <section class="content-header">
      <h1>
        DashBoard
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      
    </section>
  
@endsection
