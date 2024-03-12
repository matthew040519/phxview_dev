@extends('layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Package</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Package</li>
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
            <div class="col-md-3">
              <div class="row">
                  <div class="col-md-12">
                      <div class="input-group mb-3">
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fas fa-search"></i></span>
                          </div>
                      </div>
                  </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="row">
                  @foreach ($params['package'] as $package)
                      
                  <div class="col-md-3">
                      <div class="card">
                          <div class="card-header">
                              <img class="img-thumbmail" width="100%" src="../package.png" alt="">
                          </div>
                          <div class="card-body" style="background-color: {{ $package->color }}">
                              <h5 style="font-weight: bold;">{{ $package->package_name }}</h5>
                              <!-- <label for="">Price:  &#8369; 500.00</label> -->
                              <p>{{ $package->click }} clicks / 37 videos <br> <p>{{ $package->dc_token }} DC <br><p>{{ $package->dr }} Direct Referall 
                          </div>
                          <div class="card-footer">
                              {{-- <button class="btn btn-primary btn-block">Select</button> --}}
                              @if($params['member_package'] == 0)
                              <a href="/member/addpackage?package_id={{ $package->id }}" class="btn btn-primary btn-block">Select</a>
                              @endif
                          </div>
                      </div>
                  </div>
                  @endforeach
                  
          <div class="col-md-3">
                      <div class="card" >
                          <div class="card-header">
                              <img class="img-thumbmail" width="100%" src="../logo/package.png" alt="">
                          </div>
                          <div class="card-body" style="background-color: rgb(<?php echo rand(0,255); ?>, <?php echo rand(0,255); ?>, <?php echo rand(0,255); ?>);">
                              <h5 style="font-weight: bold;">VIP1</h5>
                              <h5>Coming Soon</h5>
                              <!-- <label for="">Price:  &#8369; 900.00</label> -->
                              <!-- <p>8$ ICO 1 clicks / 8 videos <br> Airdrop: 200,000 <br> Phx rewards: 100 Phx per Day x 120 days <br>Free Promo Coupon: 12<br> Free Raffle Ticket: 12</p> -->
                          </div>
                          <div class="card-footer">
                              <button class="btn btn-primary btn-block">Select</button> 
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="card" >
                          <div class="card-header">
                              <img class="img-thumbmail" width="100%" src="../logo/package.png" alt="">
                          </div>
                          <div class="card-body" style="background-color: rgb(<?php echo rand(0,255); ?>, <?php echo rand(0,255); ?>, <?php echo rand(0,255); ?>);">
                              <h5 style="font-weight: bold;">VIP2</h5>
                              <h5>Coming Soon</h5>
                              <!-- <label for="">Price:  &#8369; 900.00</label> -->
                              <!-- <p>8$ ICO 1 clicks / 8 videos <br> Airdrop: 200,000 <br> Phx rewards: 100 Phx per Day x 120 days <br>Free Promo Coupon: 12<br> Free Raffle Ticket: 12</p> -->
                          </div>
                          <div class="card-footer">
                              <button class="btn btn-primary btn-block">Select</button> 
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="card" >
                          <div class="card-header">
                              <img class="img-thumbmail" width="100%" src="../logo/package.png" alt="">
                          </div>
                          <div class="card-body" style="background-color: rgb(<?php echo rand(0,255); ?>, <?php echo rand(0,255); ?>, <?php echo rand(0,255); ?>);">
                              <h5 style="font-weight: bold;">VIP3</h5>
                              <h5>Coming Soon</h5>
                              <!-- <label for="">Price:  &#8369; 900.00</label> -->
                              <!-- <p>8$ ICO 1 clicks / 8 videos <br> Airdrop: 200,000 <br> Phx rewards: 100 Phx per Day x 120 days <br>Free Promo Coupon: 12<br> Free Raffle Ticket: 12</p> -->
                          </div>
                          <div class="card-footer">
                              <button class="btn btn-primary btn-block">Select</button> 
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3">
                      <div class="card" >
                          <div class="card-header">
                              <img class="img-thumbmail" width="100%" src="../logo/package.png" alt="">
                          </div>
                          <div class="card-body" style="background-color: rgb(<?php echo rand(0,255); ?>, <?php echo rand(0,255); ?>, <?php echo rand(0,255); ?>);">
                              <h5 style="font-weight: bold;">VIP4</h5>
                              <h5>Coming Soon</h5>
                              <!-- <label for="">Price:  &#8369; 900.00</label> -->
                              <!-- <p>8$ ICO 1 clicks / 8 videos <br> Airdrop: 200,000 <br> Phx rewards: 100 Phx per Day x 120 days <br>Free Promo Coupon: 12<br> Free Raffle Ticket: 12</p> -->
                          </div>
                          <div class="card-footer">
                              <button class="btn btn-primary btn-block">Select</button> 
                          </div>
                      </div>
                  </div>
                  
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
    <!-- /.content -->
  </div>
@endsection()