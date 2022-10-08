@extends('layouts.app')

@section('menu')
    <li class="header">HEADER</li>
    <!-- Optionally, you can add icons to the links -->
    <li class="active"><a href="/admin"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
    <li><a href="#"><i class="fa fa-table"></i> <span>ADD </span></a></li>
@endsection

@section('content')
    <section class="content-header">
      <h1>
        TODO
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Courses</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-sm-8">
                <div class="box box-info">
                    <form method="post" action="/update/{{ $todo->id }}">
                    {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                            <label for="exampleInputEmail1">TODO</label>
                            <input type="text" name="description" class="form-control" id="todo" value="{{ $todo->description }}">
                            </div>
                            
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        @if (count($errors) > 0)
                                    <!-- Form Error List -->
                                    <div class="alert alert-danger">
                                        <strong>Whoops! Something went wrong!</strong>
                                        <br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(session('success'))
                                    <div class="alert alert-info">
                                        <span class="glyphicon glyphicon-ok"></span>
                                        {{ session('success') }}
                                    </div>
                                @endif

                    </form>
                </div>
            </div>
        </div>
        
    </section>
  
@endsection