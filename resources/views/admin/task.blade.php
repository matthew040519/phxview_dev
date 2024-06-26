@extends('layout')
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Task Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Task Management</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                @if(session('status'))
            <div class="alert alert-success alert-dismissible" role="alert">
                      <div class="d-flex">
                        <div>
                          <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                          <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                        </div>
                        <div>
                          {{ session('status') }}
                        </div>
                      </div>
                      <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
            @endif
              <div class="card">
                <div class="card-header">
                    <h3 class="card-title"><button class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i> Add Task</button></h3>
                  </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>Task Name</th>
                          {{-- <th>Task Created</th> --}}
                          <th>Client</th>
                          <th>Created By</th>
                        </tr>
                        </thead>
                        <tbody>
                          @foreach ($params['task'] as $task)
                              <tr>
                                <td>{{ $task->task_name }}</td>
                                {{-- <td>{{ $task->date_created }}</td> --}}
                                <td>{{ $task->client->client_name }}</td>
                                <td>{{ $task->user->name }}</td>
                              </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
  
    <!-- /.content -->
  </div>

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Task</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container">
            <form method="POST" action="{{ route('addtask') }}" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="row">
                  <div class="col-md-12 mb-3">
                      <label for="">Task Name</label>
                      <input type="text" name="task_name" class="form-control">
                  </div>
                  <div class="col-md-12 mb-3">
                      <label for="">Video Task</label>
                      <input type="file" name="url" class="form-control">
                  </div>
                  <div class="col-md-12  mb-3">
                      <label for="">Client</label>
                      <select name="client_id" class="form-control" id="">
                        @foreach ($params['client'] as $client)
                            <option value="{{ $client->id }}">{{ $client->client_name }}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="col-md-12  mb-3" style="display: none;">
                      <label for="">Task Date</label>
                      <input type="date" name="date_created" class="form-control">
                  </div>
                  <div class="col-md-12 mb-3" style="display: none;">
                      <label for="">PHXCoin Rate</label>
                      <input type="number" value="0" name="task_rate" class="form-control">
                  </div>
              </div>
            
         
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="save" class="btn btn-primary">Save changes</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>


  
  
@endsection()



