@extends('layout')
@section('content')
<div class="content-wrapper" style="background-image: url('../login_bg2.jpg'); background-size:     cover;                      
background-repeat:   no-repeat;
background-position: center center">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0" style="color: white;">Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
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
  
              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         src="../../dist/img/user4-128x128.jpg"
                         alt="User profile picture">
                  </div>
  
                  <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
  
                  <p class="text-muted text-center">Member</p>
  
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Package</b> <a class="float-right">{{ Auth::user()->member->package }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Days Left</b> <a class="float-right">{{ $params['member_package']->date_expire }} Days</a>
                    </li>
                    {{-- <li class="list-group-item">
                      <b>Following</b> <a class="float-right">543</a>
                    </li>
                    <li class="list-group-item">
                      <b>Friends</b> <a class="float-right">13,287</a>
                    </li> --}}
                  </ul>
  
                  {{-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> --}}
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
              <!-- About Me Box -->
             
              <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
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
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Account Information</a></li>
                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Personal Information</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact" data-toggle="tab">Contact Information</a></li>
                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Network Information</a></li>
                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                        <form class="form-horizontal" method="POST" action="{{ route('updatepassword') }}">
                            {{ csrf_field() }}
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="inputName" class=" col-form-label">Username</label>
                                    <input type="text" readonly class="form-control" required value="{{ Auth::user()->member->username }}" name="username" id="inputName" placeholder="Username">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputName" class=" col-form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="inputName" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-sm-10">
                                <button type="submit" class="btn btn-success">Update</button>
                              </div>
                            </div>
                          </form>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="timeline">
                      <!-- The timeline -->
                      <form class="form-horizontal">
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="inputName" class=" col-form-label">First Name</label>
                                <input type="text" readonly class="form-control" value="{{ Auth::user()->member->first_name }}" name="first_name" id="inputName" placeholder="First Name">
                            </div>
                            <div class="col-md-4">
                                <label for="inputName" class=" col-form-label">Middle Name</label>
                                <input type="text" readonly class="form-control" value="{{ Auth::user()->member->middle_name }}" name="middle_name" id="inputName" placeholder="Middle Name">
                            </div>
                            <div class="col-md-4">
                                <label for="inputName" class=" col-form-label">Last Name</label>
                                <input type="text" readonly class="form-control" value="{{ Auth::user()->member->last_name }}" name="last_name" id="inputName" placeholder="last Name">
                            </div>
                            <div class="col-md-6">
                                <label for="inputName" class=" col-form-label">Birthday</label>
                                <input type="date" readonly class="form-control" value="{{ Auth::user()->member->birthday }}" name="bday" id="inputName" placeholder="Username">
                            </div>
                            <div class="col-md-6">
                                <label for="inputName"  class=" col-form-label">Gender</label>
                                <select name="gender" readonly class="form-control" id="">
                                    <option value="Male" @if(Auth::user()->member->gender == 'Male') selected @endif>Male</option>
                                    <option value="Female" @if(Auth::user()->member->gender == 'Female') selected @endif>FeMale</option>
                                </select>
                            </div>
                        </div>
                        
                      </form>
                    </div>

                    <div class="tab-pane" id="contact">
                        <!-- The timeline -->
                        <form class="form-horizontal" method="POST" action="{{ route('updateacc') }}">
                            {{ csrf_field() }}
                          <div class="form-group row">
                              <div class="col-md-4">
                                  <label for="inputName" class=" col-form-label">Province</label>
                                  <select name="province_id" readonly id="province_id" class="form-control">
                                    <option value="" disabled selected>Province</option>
                                    @foreach ($params['province'] as $province)
                                      <option value="{{ $province->code }}" @if(Auth::user()->member->province_code == $province->code) selected @endif>{{ $province->name }}</option>
                                    @endforeach
                                </select>
                              </div>
                              <div class="col-md-4">
                                  <label for="inputName" class=" col-form-label">City/Municipalities</label>
                                  <input type="text" readonly class="form-control" value="{{ $params['citiesmunicipalities']->name }}">
                              </div>
                              <div class="col-md-4">
                                  <label for="inputName" class=" col-form-label">Barangay</label>
                                  <input type="hidden" id="brgy_code" value="{{ Auth::user()->member->brgy_code }}">
                                  <input type="text" id="brgy" readonly class="form-control">
                              </div>
                              <div class="col-md-4">
                                <label for="inputName" class=" col-form-label">GCash</label>
                                <input type="text" name="gcash" class="form-control" value="{{ Auth::user()->member->gcash }}" name="gcash">
                            </div>
                            <div class="col-md-4">
                                <label for="inputName" class=" col-form-label">Thron Wallet ID</label>
                                <input type="text" name="thron_id" class="form-control" value="{{ Auth::user()->member->tron_wallet_id }}" name="thron_wallet">
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="col-sm-10">
                              <button type="submit" class="btn btn-success">Update</button>
                            </div>
                          </div>
                        </form>
                      </div>
                    <!-- /.tab-pane -->
  
                    <div class="tab-pane" id="settings">
                      <form class="form-horizontal">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="inputName" class="col-form-label">Sponsor</label>
                                <div class="col-sm-10">
                                    <input type="sponsor" value="{{ Auth::user()->member->sponsor }}" readonly value="" class="form-control" id="inputName" placeholder="Sponsor">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="inputEmail" class="col-form-label">Upline</label>
                                <div class="col-sm-10">
                                    <input type="upline" readonly value="{{ Auth::user()->member->upline }}" class="form-control" id="inputEmail" placeholder="Upline">
                                </div>
                            </div>
                          
                        </div>
                      </form>
                    </div>
                    <!-- /.tab-pane -->
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
  </div>
  <script src="../plugins/jquery/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#province_id').on('change', function() {
            var province_id = $('#province_id').val();
                $.ajax({
                   url: '/city?province_id=' + province_id,
                   type: 'get',
                   dataType: 'json',
                   success: function(response){
                    $('#city_id').empty();
                    console.log(response);
                     var len = 0;
                     if(response['data'] != null){
                        len = response['data'].length;
                     }

                     if(len > 0){
                        var option = "";
                                       for(var i=0; i<len; i++){

                                            var code = response['data'][i].code;
                                            var name = response['data'][i].name;

                                            option += "<option value=" + code +">" + name + "</option>";
                                        }

                                        $("#city_id").append(option);    

                     }
                     else{
                     }
                   }
                 });
        } );

        brgy();

        function brgy()
        {
            var brgy_code = $('#brgy_code').val();
                $.ajax({
                   url: 'https://psgc.gitlab.io/api/barangays/' + brgy_code,
                   type: 'get',
                   dataType: 'json',
                   success: function(response){
                    $('#brgy').empty();
                    console.log(response);
                     var len = 0;
                     if(response != null){
                        len = response.length;
                        $("#brgy").val(response.name);   
                     }
                   }
                 });
        }
            
    });
  </script>
@endsection()