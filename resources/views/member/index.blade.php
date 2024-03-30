@extends('layout')

@section('content')
<style>
  @media only screen and (max-width: 600px) {
    #banner{
      object-fit: cover;
      width: 100%;
    }
    #carousel-img{
      object-fit: cover;
      width: 100%;
      height: 300px;
    }
  }
  div.sticky{
    position: -webkit-sticky;
    position: sticky;
    top: 0;
    z-index: 1;
  }
</style>
<div class="content-wrapper" style="background-image: url('../login_bg2.jpg'); background-size:     cover;                      
background-repeat:   no-repeat;
background-position: center center;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0" style="color: white;">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    
    <section class="content">
      <div class="sticky">
        <img src="../banner2.png" id="banner" class="img-thumbnail" style="width: 100%; text-align: center; " alt="">
      </div>
      <div class="container-fluid"> 
        
        
        <!-- Small boxes (Stat box) -->
        @if($params['member_package'] != NULL)
        <div class="card" id="task" style=" background: transparent; backdrop-filter: blur(3px)">
          {{-- <div class="card-header">
            
          </div>
          <div class="card-body">

          </div> --}}
        </div>
        @else
        <div class="card" style="background-image: linear-gradient(#04619F, #000000)">
          
          <div class="card-body">
            <blockquote>
              <p>Please Select Package First</p>
              {{-- <small>Someone famous in <cite title="Source Title">Source Title</cite></small> --}}
            </blockquote>
          </div>
        </div>
        @endif
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box" style="height: 180px; border: 1px solid white; background: transparent; backdrop-filter: blur(10px); color: white;">
              <span class="info-box-icon elevation-1" style="width: 120px" ><img height="150px" src="../images/phxcoin.ico" alt=""></span>

              <div class="info-box-content">
                <p class="info-box-text">Phx Token</p>
                <h3 class="info-box-number" id="phxtoken">
                  
                </h3>
                <div style="display: flex;">
                  <a href="#" style="color: #FFD700; font-weight: bold; font-size: 12px; margin-right: 10px;" class="small-box-footer" data-toggle="modal" data-target="#modal-phxtoken">Convert</i></a>
                  <a href="/member/convert-report?search=PHXTOKEN" class="small-box-footer" style="color: #FFD700; font-weight: bold;  font-size: 12px;">History</i></a>
                </div>
              </div>
              
              <!-- /.info-box-content -->
            </div>
            
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box" style="height: 180px; border: 1px solid white; background: transparent; backdrop-filter: blur(10px); color: white;">
              <span class="info-box-icon elevation-1" style="width: 120px" ><img height="120px" src="../images/aznt.ico" alt=""></span>

              <div class="info-box-content">
                <p class="info-box-text">AZNT</p>
                <h3 class="info-box-number" id="aznt">
                  
                </h3>
                <a href="#" class="small-box-footer" style="color: #FFD700; font-weight: bold;" data-toggle="modal" data-target="#modal-withdraw">Withdraw</i></a>
              </div>
              
              <!-- /.info-box-content -->
            </div>
            
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box" style="height: 180px; border: 1px solid white; background: transparent; backdrop-filter: blur(10px); color: white;">
              <span class="info-box-icon elevation-1" style="width: 120px" ><i class="fas fa-3x fa-wallet"></i></span>

              <div class="info-box-content">
                <p class="info-box-text">E-Wallet</p>
                <h3 class="info-box-number" id="e-wallet">
                  &#8369; 
                </h3>
                {{-- <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-phxtoken">Convert</i></a> --}}
                <a href="/member/convert-report?search=E-Wallet" style="color: #FFD700; font-weight: bold;" class="small-box-footer">History</i></a>
              </div>
              
              <!-- /.info-box-content -->
            </div>
            
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box" style="height: 180px; border: 1px solid white; background: transparent; backdrop-filter: blur(10px); color: white;">
              <span class="info-box-icon elevation-1" style="width: 120px" ><i class="fas fa-3x fa-credit-card"></i></span>

              <div class="info-box-content">
                <p class="info-box-text">Withdrawal</p>
                <h3 class="info-box-number" id="withdrawal">
                    
                </h3>
                <a href="/member/withdraw" class="small-box-footer" style="color: #FFD700; font-weight: bold;">History</i></a>
                {{-- <a href="/member/withdraw" class="small-box-footer">Transfer</i></a> --}}
              </div>
              
              <!-- /.info-box-content -->
            </div>
            
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            @if(session('status'))
            <div class="alert alert-{{ session('color') }} alert-dismissible" role="alert">
                      <div class="d-flex">
                        <div>
                          <!-- Download SVG icon from http://tabler-icons.io/i/check -->
                          {{-- <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg> --}}
                        </div>
                        <div>
                          {{ session('status') }}
                        </div>
                      </div>
                      <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
              @endif
            <div class="info-box" style="height: 180px; border: 1px solid white; background: transparent; backdrop-filter: blur(10px); color: white;">
              <span class="info-box-icon elevation-1" style="width: 120px" ><i class="fas fa-3x fa-coins"></i></span>

              <div class="info-box-content">
                <p class="info-box-text">Daily Rewards</p>
                <h3 class="info-box-number" id="rewardsWallet">
                  
                </h3>
                {{-- <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-phxtoken">Convert</i></a> --}}
                <div style="display: flex; margin-top: -15px;">
                  <a href="#" class="small-box-footer" style="color: #FFD700; font-weight: bold; font-size: 12px; margin-right: 10px;" data-toggle="modal" data-target="#modal-default">Transfer</a>
                  <a href="/member/claim-report" class="small-box-footer" style="color: #FFD700; font-weight: bold;  font-size: 12px;">History</i></a>
                </div>
              </div>
              
              <!-- /.info-box-content -->
            </div>
            
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
           
            <div class="info-box" style="height: 180px; border: 1px solid white; background: transparent; backdrop-filter: blur(10px); color: white;">
              <span class="info-box-icon elevation-1" style="width: 120px" ><i class="fas fa-3x fa-users"></i></span>

              <div class="info-box-content">
                <p class="info-box-text" id="ds">Direct Sponsor</p>
                <h3 class="info-box-number" id="dr">
                  
                </h3>
                <div style="display: flex; margin-top: -15px;">
                  <a href="#" class="small-box-footer" style="color: #FFD700; font-weight: bold; font-size: 12px; margin-right: 10px;" data-toggle="modal" data-target="#modal-ds">Transfer</i></a>
                  <a href="/member/direct-sponsor-report" class="small-box-footer" style="color: #FFD700; font-weight: bold;  font-size: 12px;">History</i></a>
                </div>
                
              </div>
              
              <!-- /.info-box-content -->
            </div>
            
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            
            <div class="info-box" style="height: 180px; border: 1px solid white; background: transparent; backdrop-filter: blur(10px); color: white;">
              <span class="info-box-icon elevation-1" style="width: 120px" ><i class="fas fa-3x fa-network-wired"></i></span>

              <div class="info-box-content">
                <p class="info-box-text">Unilevel</p>
                <h3 class="info-box-number" id="unilevel">
                  
                </h3>
                <div style="display: flex; margin-top: -15px;">
                  <a href="#" class="small-box-footer" style="color: #FFD700; font-weight: bold; font-size: 12px; margin-right: 10px" data-toggle="modal" data-target="#modal-unilevel">Transfer</i></a>
                  <a href="/member/unilevel-report" class="small-box-footer" style="color: #FFD700; font-weight: bold;  font-size: 12px;" >History</i></a>
                </div>
              </div>
              
              <!-- /.info-box-content -->
            </div>
            
            <!-- /.info-box -->
          </div>
          <div class="col-12 col-sm-6 col-md-3">
           
            <div class="info-box" style="height: 180px; border: 1px solid white; background: transparent; backdrop-filter: blur(10px); color: white;">
              <span class="info-box-icon elevation-1" style="width: 120px" ><i class="fas fa-3x fa-users"></i></span>

              <div class="info-box-content">
                <p class="info-box-text">Downlines</p>
                <h3 class="info-box-number" >
                  0
                </h3>
                <a href="/member/genealogy?username={{ Auth::user()->member->username }}" class="small-box-footer" style="color: #FFD700; font-weight: bold;">Genealogy</i></a>
              </div>
              
              <!-- /.info-box-content -->
            </div>
            
            <!-- /.info-box -->
          </div>
          {{-- <div class="col-lg-3 col-6"  >
            <div class="small-box" style="border: 1px solid white; background: transparent; backdrop-filter: blur(10px); color: white;">
              <div class="inner">
                <h3 id="phxtoken">0.00</h3>
                <p>Phx Token</p>
              </div>
              <div class="icon">
                <i><img width="80px" style="margin-bottom: 100%;" height="100%" src="../images/phxcoin.ico" alt=""></i>
              </div>
              <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-phxtoken">Convert <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> --}}
          <!-- ./col -->
          {{-- <div class="col-lg-3 col-6">
            <div class="small-box" style="border: 1px solid white; background: transparent; backdrop-filter: blur(10px); color: white;">
              <div class="inner">
                <h3 id="aznt">0.00</h3>

                <p>AZNT</p>
              </div>
              <div class="icon">
                <i><img width="80px" style="margin-bottom: 100%;" height="100%" src="../images/aznt.ico" alt=""></i>
              </div>
              <a href="#" class="small-box-footer">  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> --}}
          {{-- <!-- ./col -->
          <div class="col-lg-3 col-6">
           
            <div class="small-box bg-success">
              <div class="inner">
                <h3 id="e-wallet">0.00</h3>

                <p>E-Wallet</p>
              </div>
              <div class="icon">
                <i class="fas fa-wallet"></i>
              </div>
              <a href="#" class="small-box-footer">  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
         
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-danger">
              <div class="inner">
                <h3 id="time">0.00</h3>
                <p>Withdrawal</p>
              </div>
              <div class="icon">
                <i class="fas fa-wallet"></i>
              </div>
              <a href="#" class="small-box-footer">  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div> --}}
         
        </div>
        
        {{-- <div class="row">
          <div class="col-lg-3 col-6">
            @if(session('status'))
            <div class="alert alert-{{ session('color') }} alert-dismissible" role="alert">
                      <div class="d-flex">
                        <div>
                          </div>
                        <div>
                          {{ session('status') }}
                        </div>
                      </div>
                      <a class="btn-close" data-bs-dismiss="alert" aria-label="close"></a>
                    </div>
              @endif
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="rewardsWallet"></h3>
                <p>DC Token</p>
              </div>
              <div class="icon">
                <i class="fas fa-wallet"></i>
              </div>
              <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-default">Transfer <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>0</h3>
                <p>Direct Sponsor</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>0</h3>
                <p>Unilevel</p>
              </div>
              <div class="icon">
                <i class="fas fa-network-wired"></i>
              </div>
              <a href="#" class="small-box-footer">  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>0</h3>
                <p>Downlines</p>
              </div>
              <div class="icon">
                <i class="fas fa-users"></i>
              </div>
              <a href="#" class="small-box-footer"> <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          
        </div> --}}
        <div class="row">
          <div class="col-md-6">
            <div class="card card-primary collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Buy Coupons</h3>
  
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="row"> 
                  <div class="col-md-3">
                    Sample Coupon
                  </div>
                  <div class="col-md-3">
                    Sample Coupon
                  </div>
                  <div class="col-md-3">
                    Sample Coupon
                  </div>
                  <div class="col-md-3">
                    Sample Coupon
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-success collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Buy Promos & Tickets</h3>
  
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="row"> 
                  <div class="col-md-3">
                    Promos
                  </div>
                  <div class="col-md-3">
                    Promos
                  </div>
                  <div class="col-md-3">
                    Promos
                  </div>
                  <div class="col-md-3">
                    Promos
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="card" style="background: transparent; backdrop-filter: blur(3px); color: white;">
              <div class="card-header">
                <h3 class="card-title">Future Partners</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-2 mb-3">
                    <img class="img-fluid" style="height: 100%;" src="../bross.jpg" alt="">
                  </div>
                  <div class="col-md-2 mb-3">
                    <img class="img-fluid" style="height: 200px;" src="../rraf.gif" alt="">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
        <!-- /.row -->
        <!-- Main row -->
       
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
      
    </section>
    <div class="modal fade" id="modal-phxtoken">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Convert to AZNT</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('conversion_phxtoken') }}">
              {{ csrf_field() }}
              <div class="row">
                  <div class="col-md-12">
                      <label for="">Conversion of PHX Token to AZNT</label>
                      <input type="text" readonly name="conversion" value="10:1" class="form-control">
                  </div>
                  <div class="col-md-12">
                    <label for="">Remaining Balance</label>
                    <input type="text" readonly id="phxtoken_bal" required name="balance" class="form-control">
                  </div>
                  <div class="col-md-12">
                      <label for="">Convert</label>
                      <input type="number" required name="convert" class="form-control">
                  </div>
              </div>
            
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="save" class="btn btn-primary">Confirm</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Convert</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('conversion') }}">
              {{ csrf_field() }}
              <div class="row">
                  <div class="col-md-12">
                      <label for="">Convertion of Rewards Wallet to PHX Token</label>
                      <input type="text" readonly name="conversion" value="15:1" class="form-control">
                  </div>
                  <div class="col-md-12">
                    <label for="">Remaining Balance</label>
                    <input type="text" readonly id="balance" required name="balance" class="form-control">
                </div>
                  <div class="col-md-12">
                      <label for="">Convert</label>
                      <input type="number" required name="convert" class="form-control">
                  </div>
              </div>
            
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="save" class="btn btn-primary">Confirm</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal-withdraw">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Withdraw</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('addwithdrawal') }}">
              {{ csrf_field() }}
              <div class="row">
                  <div class="col-md-12">
                      <label for="">Amount to withdraw</label>
                      <input type="text" required name="withdraw" class="form-control">
                  </div>
              </div>
            
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="save" class="btn btn-primary">Confirm</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal-ds">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Transfer to DC TOKEN</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('ds_to_dc') }}">
              {{ csrf_field() }}
              <div class="row">
                  <div class="col-md-12">
                    <label for="">Remaining Balance</label>
                    <input type="text" readonly id="dr1" required name="balance" class="form-control">
                  </div>
                  <div class="col-md-12">
                      <label for="">Convert</label>
                      <input type="text" required name="convert" class="form-control">
                  </div>
              </div>
            
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="save" class="btn btn-primary">Confirm</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal-unilevel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Transfer to DC TOKEN</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            
          </div>
          <div class="modal-body">
            <form method="POST" action="{{ route('unilevel_to_dc') }}">
              {{ csrf_field() }}
              <div class="row">
                  <div class="col-md-12">
                    <label for="">Remaining Balance</label>
                    <input type="text" readonly id="unilevel1" required name="balance" class="form-control">
                  </div>
                  <div class="col-md-12">
                      <label for="">Convert</label>
                      <input type="text" required name="convert" class="form-control">
                  </div>
              </div>
            
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" name="save" class="btn btn-primary">Confirm</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.content -->
  </div>
  <script src="https://code.jquery.com/jquery-3.7.0.js" type="text/javascript"></script>
  <script>
    $(document).ready(function(){
      $("#ds").css({ 'overflow: hidden' : '', 'text-overflow' : '' });
      getVideo(1);

        function getVideo(task_id)
        {
              $.ajax({
                     url: '/member/getTask?task_id=' + task_id,
                     type: 'get',
                     dataType: 'json',
                     success: function(response){
                      $('#task').empty();
                      console.log(response);
                       var len = 0;
                       if(response.success){
                          var batch = response.batch;
                          console.log(batch)
                          if(batch  == "")
                          {
                            batch = 1
                          }
                          else {
                            // batch = batch + 1;
                          }
                          var option = "";
                                      option += "<div class='card-header' style='text-align: center; font-weight: bold; color: white;'>"
                                      option += response.task.task_name 
                                      option += "</div>"
                                      option += "<div class='card-body'>"
                                      option += "<video height='400px' width='100%'' controls autoplay id='myVideo'>"
                                      option += " <source src='../videos/"+ response.task.url +"' type='video/mp4'></source>"
                                      option += "</video>" 
                                      option += "</div>"  
                                      option += "<div class='card-body'>"
                                      option += "<button class='btn btn-primary' id='claim' style='display: none'>Claim</button>"
                                      option += "</div>"  
                                      option += "<div class='card-footer'>"
                                      for(var x = 1; x <= 10; x++)
                                      {
                                        if(x == batch)
                                        {
                                            option += "<button style='background-color: #FFD700; color: black' class='btn btn-primary mr-3 mb-3'>Click " + x + "</button>"
                                        }
                                        else
                                        {
                                            option += "<button disabled class='btn btn-primary mr-3 mb-3'>Click " + x + "</button>"
                                        }
                                      }
                                      
                                      option += "</div>"  


                                      $("#task").append(option);  
                                      
                                      // nextVideo();
                                      var x = document.getElementById("myVideo");
                                      
                                      // x.muted = false
                                      console.log(x.onended)

                                      x.onended = function() {

                                        $.ajax({
                                              url: '/member/insertTask?id=' + response.task.id,
                                              type: 'get',
                                              dataType: 'json',
                                              success: function(response){
                                                // $('#task').empty();
                                                console.log(response);
                                                var len = 0;
                                                if(response.success){
                                                  if(response.count == 3)
                                                  {
                                                    var claim = document.getElementById('claim');
                                                    claim.style.removeProperty("display");
                                                    // $('#batch').empty();
                                                    // $('#batch').val(response.batch + 1);
                                                    claimIncome(response.batch)
                                                  } else {
                                                    // $('#batch').val(response.batch);
                                                    x.muted = true
                                                    x.play()
                                                    getVideo(1);
                                                    
                                                  }
                                                  
                                                }
                                              }
                                            });

                                          
                                      };

                        } else 
                        {
                          var option = "";
                                      option += "<div class='card-body'>"
                                      option += "<h1>No Task Available..</h1>"
                                      option += "</div>"  


                                      $("#task").append(option);  
                        }
                     }
                   });
        }

        function claimIncome(batch)
        {
              $( "#claim" ).on( "click", function() {
              console.log('click')
              // var batch = $('#batch').val();
                                    $.ajax({
                                                  url: '/member/memberIncome?batch=' + batch,
                                                  type: 'get',
                                                  dataType: 'json',
                                                  success: function(response){
                                                    // $('#task').empty();
                                                    console.log(response);
                                                    var len = 0;
                                                    if(response.success){
                                                      RewardsWallet();
                                                      unilevel();
                                                      
                                                    }
                                                  }
                                                });
            } );
        }
        RewardsWallet()
        phxToken()
        function RewardsWallet()
        {
          $.ajax({
                     url: '/member/rewardsWallet',
                     type: 'get',
                     dataType: 'json',
                     success: function(response){
                      $('#rewardsWallet').empty();
                      console.log(response);
                       var len = 0;
                       if(response.success){
                          
                          $('#rewardsWallet').text(response.total_income);
                          var extension = "<p style='font-size: 12px;'>DC TOKEN</p>";
                          $("#rewardsWallet").append(extension);  
                          $('#balance').val(response.total_income);
                          
                        }
                     }
                   });
        }

        function unilevel()
        {
                $.ajax({
                     url: '/member/unilevel',
                     type: 'get',
                     dataType: 'json',
                     success: function(response){
                      // $('#rewardsWallet').empty();
                      console.log(response);
                       var len = 0;
                       if(response.success){
                        getVideo(1);
                          
                        }
                     }
                   });
        }

        function phxToken()
        {
                          $.ajax({
                            url: '/member/getPHXToken',
                            type: 'get',
                            dataType: 'json',
                            success: function(response){
                              $('#phxtoken').empty();
                              $('#aznt').empty();
                              $('#e-wallet').empty();
                              $('#phxtoken_bal').empty();
                              $('#withdrawal').empty();
                              $('#dr').empty();
                              $('#unilevel').empty();
                              $('#unilevel1').empty();
                              console.log(response);
                              var len = 0;
                              if(response.success){

                                  $('#phxtoken').text(response.conversion);
                                  $('#phxtoken_bal').val(response.conversion);
                                  $('#aznt').text(response.aznt);
                                  var peso = "&#8369;";
                                  var emarket = response.emarket;
                                  $("#e-wallet").append(peso + " " + emarket);  
                                  
                                  $('#withdrawal').text(response.withdrawal);
                                  $('#dr').text(response.sponsor);
                                  var extension = "<p style='font-size: 12px;'>DC TOKEN</p>";
                                  $("#dr").append(extension);  
                                  $('#dr1').val(response.sponsor);
                                  $('#unilevel').text(response.unilevel);
                                  $("#unilevel").append(extension);  
                                  $('#unilevel1').val(response.unilevel);
                              }
                            }
                          });
        }

    });
  </script>
@endsection()