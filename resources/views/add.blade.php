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
                    <form method="post" action="/add">
                    {{ csrf_field() }}
                        <div class="box-body">
                            <div class="form-group">
                            <label for="exampleInputEmail1">TODO</label>
                            <input type="text" name="description" class="form-control" id="todo" placeholder="ADD YOUR TODO LIST">
                            </div>
                            
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        @if (count($errors) > 0)
                                    <!-- Form Error List -->
                                    <div class="alert alert-danger">
                                        <strong>Oops! Something went wrong!</strong>
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
        <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>TODO LIST</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                
                                @foreach ($todos as $todo)
                                    <tr class="odd gradeX">
                                        <input type="hidden" class="id" value="{{ $todo->id }}" />
                                        <td>{{ $todo->description }}</td>
                                        <td class="center">
                                            <form action="/todo/edit/{{ $todo->id }}" method="POST">
                                             {{ csrf_field() }}
                                                <button type="submit" class="btn btn-info">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </button>
                                            </form>
                                        </td>
                                        <td class="center">
                                            <form action="/todo/delete/{{ $todo->id }}" method="POST">
                                                {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                              
                            </tbody>
                        </table>
                    </div>
                </div>
    </section>
  
@endsection