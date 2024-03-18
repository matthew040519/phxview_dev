@extends('layout')
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@section('content')

<div class="content-wrapper" style="background-image: url('../login_bg2.jpg'); background-size:     cover;                      
background-repeat:   no-repeat;
background-position: center center;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0" style="color: white">Direct Sponsor Report</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Direct Sponsor Report</li>
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
                
              <div class="card">
                {{-- <div class="card-header">
                  <h3 class="card-title"><button class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i> Add Withdrawal</button></h3>
                </div> --}}
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>Date</th>
                      <th>Username</th>
                      <th>Points</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($params['sponsor'] as $sponsor)
                        <tr>
                            <td>{{ $sponsor->tdate }}</td>
                            <td>{{ $sponsor->username }}</td>
                            <td>{{ number_format($sponsor->amount, 2) }}</td>
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

  
  
  
@endsection()



