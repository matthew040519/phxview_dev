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
  <style>
    table, tr, td, th{
      border: 0.5px;
      border-collapse: collapse;
    }
  </style>
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
    <section class="content" style="color: black;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
      
      
                  <!-- Main content -->
                  <div class="invoice p-3 mb-3">
                    <!-- title row -->
                    <div class="row">
                      <div class="col-12">
                        <h4>
                          <i class="fas fa-shopping-cart"></i> Cart
                        </h4>
                      </div>
                      <!-- /.col -->
                    </div>
      
                    <!-- Table row -->
                    <div class="row">
                      <div class="col-12 table-responsive">
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th>Qty</th>
                            <th>Product</th>
                            <th>Category</th>
                            <th>Subtotal</th>
                            <th>Total</th>
                          </tr>
                          </thead>
                          <tbody>
                          @foreach($params['cart'] as $cart)
                            <tr>
                                    <td>{{ $cart->qty }}</td>
                                    <td>{{ $cart->products->products_name }}</td>
                                    <td>{{ $cart->category->category_name }}</td>
                                    <td>&#8369; {{ $cart->price }}</td>
                                    <td>&#8369; {{ $cart->qty * $cart->price }}</td>
                                    <input type="hidden" value="{{ $params['sum'] += $cart->qty * $cart->price }}">
                            </tr>
                          @endforeach
                          </tbody>
                        </table>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
      
                    <div class="row">
                      <!-- accepted payments column -->
                      <div class="col-6">
                        {{-- <p class="lead">Payment Methods:</p>
                        <img src="../../dist/img/credit/visa.png" alt="Visa">
                        <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                        <img src="../../dist/img/credit/american-express.png" alt="American Express">
                        <img src="../../dist/img/credit/paypal2.png" alt="Paypal">
      
                        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                          plugg
                          dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                        </p> --}}
                      </div>
                      <!-- /.col -->
                      <div class="col-6">
                        {{-- <p class="lead">Amount Due 2/22/2014</p> --}}
      
                        <div class="table-responsive">
                          <table class="table">
                            <tr>
                              <th>Subtotal:</th>
                              <td>&#8369; {{ $params['sum'] }}</td>
                            </tr>
                            {{-- <tr>
                              <th>Tax (9.3%)</th>
                              <td>$10.34</td>
                            </tr> --}}
                            <tr>
                              <th>Shipping:</td>
                              <td>&#8369; 150</td>
                            </tr>
                            <tr>
                              <th>Total:</td>
                              <td>&#8369; {{ $params['sum'] + 150 }}</td>
                            </tr>
                          </table>
                        </div>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
      
                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                      <div class="col-12">
                        <a href="#" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                        <button type="button" disabled class="btn btn-success float-right"><i class="far fa-credit-card"></i> Checkout
                        </button>
                        {{-- <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                          <i class="fas fa-download"></i> Generate PDF
                        </button> --}}
                      </div>
                    </div>
                  </div>
                  <!-- /.invoice -->
                </div><!-- /.col -->
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
<script>
  function plusClick() {
  money = +document.getElementById('qty').value
  document.getElementById('qty').value = Math.max(money + 1);
}

function minusClick() {
  money = +document.getElementById('qty').value
  document.getElementById('qty').value = Math.max(money - 1);
}
</script>
</body>
</html>
