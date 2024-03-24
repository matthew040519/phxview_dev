<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>PHXVIEW</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper">
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../logo.png" alt="AdminLTELogo" height="150" width="150">
  </div>
  <!-- Navbar -->
  @include('include.navbar2')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('include.sidebar')

  <div class="content-wrapper" style="background-image: url('../login_bg2.jpg'); background-size:     cover;                      
background-repeat:   no-repeat;
background-position: center center; color: white;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0" style="color: white;">Market</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Market</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="card card-solid">
            <div class="card-body" style="color: #045E99">
              <div class="row">
                <div class="col-12 col-sm-6">
                  <h3 class="d-inline-block d-sm-none">{{ $params['products']->products_name }}</h3>
                  <div class="col-12">
                    <img src="../products/{{ $params['products']->image }}" class="product-image" alt="Product Image">
                  </div>
                  {{-- <div class="col-12 product-image-thumbs">
                    <div class="product-image-thumb active"><img src="../../dist/img/prod-1.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb" ><img src="../../dist/img/prod-2.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb" ><img src="../../dist/img/prod-3.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb" ><img src="../../dist/img/prod-4.jpg" alt="Product Image"></div>
                    <div class="product-image-thumb" ><img src="../../dist/img/prod-5.jpg" alt="Product Image"></div>
                  </div> --}}
                </div>
                <div class="col-12 col-sm-6">
                  <h3 class="my-3">{{ $params['products']->products_name }}</h3>
                  <p>{{ $params['products']->details }}</p>
    
                  <hr>
                  {{-- <h4>Available Colors</h4> --}}
                  {{-- <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-default text-center active">
                      <input type="radio" name="color_option" id="color_option1" autocomplete="off" checked="">
                      Green
                      <br>
                      <i class="fas fa-circle fa-2x text-green"></i>
                    </label>
                    <label class="btn btn-default text-center">
                      <input type="radio" name="color_option" id="color_option2" autocomplete="off">
                      Blue
                      <br>
                      <i class="fas fa-circle fa-2x text-blue"></i>
                    </label>
                    <label class="btn btn-default text-center">
                      <input type="radio" name="color_option" id="color_option3" autocomplete="off">
                      Purple
                      <br>
                      <i class="fas fa-circle fa-2x text-purple"></i>
                    </label>
                    <label class="btn btn-default text-center">
                      <input type="radio" name="color_option" id="color_option4" autocomplete="off">
                      Red
                      <br>
                      <i class="fas fa-circle fa-2x text-red"></i>
                    </label>
                    <label class="btn btn-default text-center">
                      <input type="radio" name="color_option" id="color_option5" autocomplete="off">
                      Orange
                      <br>
                      <i class="fas fa-circle fa-2x text-orange"></i>
                    </label>
                  </div> --}}
    
                  {{-- <h4 class="mt-3">Size <small>Please select one</small></h4> --}}
                  {{-- <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-default text-center">
                      <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                      <span class="text-xl">S</span>
                      <br>
                      Small
                    </label>
                    <label class="btn btn-default text-center">
                      <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                      <span class="text-xl">M</span>
                      <br>
                      Medium
                    </label>
                    <label class="btn btn-default text-center">
                      <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                      <span class="text-xl">L</span>
                      <br>
                      Large
                    </label>
                    <label class="btn btn-default text-center">
                      <input type="radio" name="color_option" id="color_option1" autocomplete="off">
                      <span class="text-xl">XL</span>
                      <br>
                      Xtra-Large
                    </label>
                  </div> --}}
    
                  {{-- <div class="bg-gray py-2 px-3 mt-4"> --}}
                    @if($params['products']->category->id == 1)
                    <div class="row">
                      <div class="col-md-12">
                        <h3 for="">Sizes</h3>
                      </div>
                      <div class="row">
                        
                        <div class="col-sm-12">
                          <!-- radio -->
                          <div class="form-group clearfix">
                            <div class="icheck-primary d-inline">
                              <input type="radio" value="S" id="radioPrimary1" name="r1">
                              <label for="radioPrimary1">
                                Small
                              </label>
                            </div>
                            <div class="icheck-primary d-inline">
                              <input type="radio" value="M" id="radioPrimary2" name="r1">
                              <label for="radioPrimary2">
                                Medium
                              </label>
                            </div>
                            <div class="icheck-primary d-inline">
                              <input type="radio" value="L" id="radioPrimary3" name="r1">
                              <label for="radioPrimary3">
                                Large
                              </label>
                            </div>
                            <div class="icheck-primary d-inline">
                              <input type="radio" value="XL" id="radioPrimary3" name="r1">
                              <label for="radioPrimary3">
                                X-Large
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <hr>
                    @endif
                    <h2 class="mb-0">
                      &#8369; {{ $params['products']->price }}
                    </h2>
                    <h4 class="mt-0">
                      {{-- <small>Ex Tax: $80.00 </small> --}}
                    </h4>
                  {{-- </div> --}}
                    <hr>
                  <div class="mt-4">
                    <div class="btn btn-primary btn-lg btn-flat">
                      <i class="fas fa-cart-plus fa-lg mr-2"></i> 
                      Add to Cart
                    </div>
    
                    <div class="btn btn-default btn-lg btn-flat">
                      <i class="fas fa-heart fa-lg mr-2"></i> 
                      Add to Wishlist
                    </div>
                  </div>
    
                  {{-- <div class="mt-4 product-share">
                    <a href="#" class="text-gray">
                      <i class="fab fa-facebook-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                      <i class="fab fa-twitter-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                      <i class="fas fa-envelope-square fa-2x"></i>
                    </a>
                    <a href="#" class="text-gray">
                      <i class="fas fa-rss-square fa-2x"></i>
                    </a>
                  </div> --}}
    
                </div>
              </div>
              <div class="row mt-4">
                <nav class="w-100">
                  <div class="nav nav-tabs" id="product-tab" role="tablist">
                    <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                    <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                    <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                  </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus. </div>
                  <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
                  <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
    </section>
  </div>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
