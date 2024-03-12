<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PHXVIEW</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <style>
   
    

    
    #regForm {
      /* background-color: #ffffff; */
      /* margin: 100px auto; */
      /* font-family: Raleway; */
      /* padding: 40px; */
      width: 70%;
      min-width: 300px;
    }
    
    h1 {
      text-align: center;  
    }
    
    
    
    /* Mark input boxes that gets an error on validation: */
    input.invalid {
      background-color: #ffdddd;
    }
    
    /* Hide all steps by default: */
    .tab {
      display: none;
    }
    
    /* button {
      background-color: #04AA6D;
      color: #ffffff;
      border: none;
      padding: 10px 20px;
      font-size: 17px;
      font-family: Raleway;
      cursor: pointer;
    } */
    
    button:hover {
      opacity: 0.8;
    }
    
    #prevBtn {
      /* background-color: #bbbbbb; */
    }
    
    /* Make circles that indicate the steps of the form: */
    .step {
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbbbbb;
      border: none;  
      border-radius: 50%;
      display: inline-block;
      opacity: 0.5;
    }
    
    .step.active {
      opacity: 1;
    }
    
    /* Mark the steps that are finished and valid: */
    .step.finish {
      background-color: #04AA6D;
    }
    </style>
</head>
<body class="hold-transition login-page" style="background-image: url('login_bg.jpg'); background-size:     cover;                      /* <------ */
    background-repeat:   no-repeat;
    background-position: center center;">
<div class="login-box">
  <!-- /.login-logo -->
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
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="/" class="h1"><b>PHX</b>Click</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Registration</p>

      <form id="regForm" method="POST" action="{{ route('addmember') }}">
        {{ csrf_field() }}
        <!-- One "tab" for each step in the form: -->
        <div class="tab">
            <h2 style="text-align: center">Account Information</h2>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="username" placeholder="Username">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
              </div>
        </div>
        <div class="tab">
            <h2 style="text-align: center">Personal Information</h2>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="first_name" placeholder="First Name">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="middle_name" placeholder="Middle Name">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="date" class="form-control" name="birthday" placeholder="Birth Date">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-calendar"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
               <select name="gender" id="" class="form-control">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
               </select>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
        </div>
        <div class="tab">
            <h2 style="text-align: center">Contact Information</h2>
            <div class="input-group mb-3">
                <input type="email" class="form-control" name="email" placeholder="Email">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="number" class="form-control" name="contact_number" placeholder="Contact Number">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <select name="province_id" id="province_id" class="form-control">
                    <option value="" disabled selected>Province</option>
                    @foreach ($params['province'] as $province)
                      <option value="{{ $province->code }}">{{ $province->name }}</option>
                    @endforeach
                </select>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-location-arrow"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <select name="city_id" id="city_id" class="form-control">
                    <option value="" disabled selected>City</option>
                </select>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-location-arrow"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <select name="brgy_id" id="brgy_id" class="form-control">
                    <option value="" disabled selected>Barangay</option>
                </select>
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-location-arrow"></span>
                  </div>
                </div>
              </div>
        </div>
        <div class="tab">
            <h2 style="text-align: center">Network Information</h2>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="sponsor" placeholder="Sponsor">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="text" class="form-control" name="upline" placeholder="Upline">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
              </div>
        </div>
        <div style="overflow:auto;">
          <div style="float:right;">
            <button type="button" class="btn btn-danger btn-md" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
            <button type="button" class="btn btn-primary btn-md" id="nextBtn" onclick="nextPrev(1)">Next</button>
          </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
        </div>
      </form>
      
    
  
      <p class="mb-0">
        <a href="/" class="text-center">I already have a membership </a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab
    
    function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
      }
      //... and run a function that will display the correct step indicator:
      fixStepIndicator(n)
    }
    
    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }
    
    function validateForm() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
          // add an "invalid" class to the field:
          y[i].className += " invalid";
          // and set the current valid status to false
          valid = false;
        }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
    }
    
    function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class on the current step:
      x[n].className += " active";
    }
    </script>
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

          $('#city_id').on('change', function() {
              var city_id = $('#city_id').val();
                  $.ajax({
                     url: '/brgy?city_id=' + city_id,
                     type: 'get',
                     dataType: 'json',
                     success: function(response){
                      $('#brgy_id').empty();
                      console.log(response);
                       var len = 0;
                       if(response != null){
                          len = response.length;
                       }

                       if(len > 0){
                          var option = "";
                                         for(var i=0; i<len; i++){

                                              var code = response[i].code;
                                              var name = response[i].name;

                                              option += "<option value=" + code +">" + name + "</option>";
                                          }

                                          $("#brgy_id").append(option);    

                       }
                       else{
                       }
                     }
                   });
          } );
      });
    </script>
    
</body>
</html>