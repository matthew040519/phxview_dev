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
                <h3 id="phxtoken">0.00</h3>
                <p>Phx Token</p>
              </div>
              <div class="icon">
                <i><img width="80px" style="margin-bottom: 100%;" height="100%" src="../images/phxcoin.ico" alt=""></i>
              </div>
              <a href="#" class="small-box-footer" data-toggle="modal" data-target="#modal-phxtoken">Convert <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-secondary">
              <div class="inner">
                <h3 id="aznt">0.00</h3>

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
                <h3 id="e-wallet">0.00</h3>

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
            <!-- small box -->
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
                      <label for="">Convert To: </label>
                      <select name="convert_to" id="" class="form-control">
                        <option value="1">AZNT</option>
                        <option value="2">E - Market</option>
                      </select>
                  </div>
                  <div class="col-md-12">
                      <label for="">Conversion of PHX Token to AZNT</label>
                      <input type="text" readonly name="conversion" value="20:1" class="form-control">
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
                      <input type="text" readonly name="conversion" value="5:1" class="form-control">
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
    <!-- /.content -->
  </div>
  <script src="https://code.jquery.com/jquery-3.7.0.js" type="text/javascript"></script>
  <script>
    $(document).ready(function(){

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
                                                      getVideo(1);
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
                          $('#balance').val(response.total_income);
                          
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
                              console.log(response);
                              var len = 0;
                              if(response.success){
                                  $('#phxtoken').text(response.conversion);
                                  $('#aznt').text(response.aznt);
                                  $('#e-wallet').text(response.emarket);
                              }
                            }
                          });
        }

    });
  </script>
@endsection()