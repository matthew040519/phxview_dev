@extends('layout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
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
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="card" id="task">
          {{-- <div class="card-header">
            
          </div>
          <div class="card-body">

          </div> --}}
        </div>
        <div class="row">
          <div class="col-lg-3 col-6" >
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>0.00</h3>
                <p>PhxCoin</p>
              </div>
              <div class="icon">
                <i><img width="80px" style="margin-bottom: 100%;" height="100%" src="../images/phxcoin.ico" alt=""></i>
              </div>
              <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-default">Convert <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3>0.00</h3>

                <p>AZNT</p>
              </div>
              <div class="icon">
                <i><img width="80px" style="margin-bottom: 100%;" height="100%" src="../images/aznt.ico" alt=""></i>
              </div>
              <a href="#" class="small-box-footer">  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>0.00</h3>

                <p>E-Wallet</p>
              </div>
              <div class="icon">
                <i class="fas fa-wallet"></i>
              </div>
              <a href="#" class="small-box-footer">  <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
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
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3 id="rewardsWallet"></h3>
                <p>Rewards Wallet</p>
              </div>
              <div class="icon">
                <i class="fas fa-wallet"></i>
              </div>
              <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-default1">Transfer <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
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
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
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
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
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
          
          
        </div>
        <!-- /.row -->
        <!-- Main row -->
       
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script src="https://code.jquery.com/jquery-3.7.0.js" type="text/javascript"></script>
  <script>
    $(document).ready(function(){

      getVideo();

        function getVideo()
        {
              $.ajax({
                     url: '/member/getTask',
                     type: 'get',
                     dataType: 'json',
                     success: function(response){
                      $('#task').empty();
                      console.log(response);
                       var len = 0;
                       if(response != null){
                          var option = "";
                                      option += "<div class='card-header'>"
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
                                                    claimIncome(response.batch)
                                                  } else {
                                                    // $('#batch').val(response.batch);
                                                    x.muted = true
                                                    x.play()
                                                    getVideo();
                                                    
                                                  }
                                                  
                                                }
                                              }
                                            });

                                          
                                      };

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
                                                      getVideo();
                                                    }
                                                  }
                                                });
            } );
        }
        RewardsWallet()
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
                        }
                     }
                   });
        }

    });
  </script>
@endsection()