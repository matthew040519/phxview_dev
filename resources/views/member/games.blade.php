@extends('layout')
@section('content')

<div class="content-wrapper" style="background-image: url('../login_bg2.jpg'); background-size:     cover;                      
background-repeat:   no-repeat;
background-position: center center; color: white;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0" style="color: white">Games</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Games</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <img src="../images/games.jpg" class="img-fluid" alt="">
        {{-- <div class="error-page">
          <h2 class="headline text-warning"> Coming Soon!</h2>
  
          <div class="error-content"> --}}
            
            {{-- <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3> --}}
  
            {{-- <p>
              We could not find the page you were looking for.
              Meanwhile, you may <a href="../../index.html">return to dashboard</a> or try using the search form.
            </p> --}}
  
            {{-- <form class="search-form">
              <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search">
  
                <div class="input-group-append">
                  <button type="submit" name="submit" class="btn btn-warning"><i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </form> --}}
          {{-- </div> --}}
          <!-- /.error-content -->
        {{-- </div> --}}
        <!-- /.error-page -->
      </section>
  </div>

  
  
  
@endsection()



