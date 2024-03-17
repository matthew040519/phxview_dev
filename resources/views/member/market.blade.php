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
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="" style="color: black">Category</label>
                            <select name="" id="category" class="form-control" id="">
                                <option value="0" selected>All</option>
                                <option value="1">Electronics</option>
                                <option value="2">Apparel</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row" id="products">
                
            </div>
        </div>
    </section>
  </div>
  <script src="https://code.jquery.com/jquery-3.7.0.js" type="text/javascript"></script>
  <script>
    $(document).ready(function(){
        $( "#category" ).on( "change", function() {

            $category = $('#category').val();

            if($category == 1)
            {
                var products_category1 = [
                    {'id': 1, 'category_id': 1, 'product_name': 'Smart Watch', 'Qty': 99, 'image': '../market/smartwatch.png'},
                    {'id': 2, 'category_id': 1, 'product_name': 'Smart Watch Pink', 'Qty': 99, 'image': '../market/smartwatch1.png'},
                    {'id': 3, 'category_id': 1, 'product_name': 'a520 TWS earphone bluetooth 5.3 wireless', 'Qty': 99, 'image': '../market/earphone.png'},
                ];
            }
            else if($category == 2)
            {
                var products_category1 = [
                
                    {'id': 4, 'category_id': 2, 'product_name': 'Clothing Apparel 1', 'Qty': 49, 'image': '../market/clothing.jpg'},
                    {'id': 5, 'category_id': 2, 'product_name': 'Clothing Apparel 2', 'Qty': 49, 'image': '../market/clothing1.jpg'},
                    {'id': 6, 'category_id': 2, 'product_name': 'Clothing Apparel 3', 'Qty': 49, 'image': '../market/clothing2.jpg'},
                ];
            }
            else
            {
                var products_category1 = [
                    {'id': 1, 'category_id': 1, 'product_name': 'Smart Watch', 'Qty': 99, 'image': '../market/smartwatch.png'},
                    {'id': 2, 'category_id': 1, 'product_name': 'Smart Watch Pink', 'Qty': 99, 'image': '../market/smartwatch1.png'},
                    {'id': 3, 'category_id': 1, 'product_name': 'a520 TWS earphone bluetooth 5.3 wireless', 'Qty': 99, 'image': '../market/earphone.png'},
                    {'id': 4, 'category_id': 2, 'product_name': 'Clothing Apparel 1', 'Qty': 49, 'image': '../market/clothing.jpg'},
                    {'id': 5, 'category_id': 2, 'product_name': 'Clothing Apparel 2', 'Qty': 36, 'image': '../market/clothing1.jpg'},
                    {'id': 6, 'category_id': 2, 'product_name': 'Clothing Apparel 3', 'Qty': 76, 'image': '../market/clothing2.jpg'},
                ];
            }

             

             $('#products').empty();
            for(var x = 0; x < products_category1.length; x++)
            {
                
                var    card = "<div class='col-md-3'>";
                card += "<div class='card'>";
                 card +=  "<div class='card-header'>"
                    card +=  "<img class='img-thumbnail' style='height: 215px; width: 215px;' src="+ products_category1[x].image +" >"
                 card +=  "</div>"
                 card +=  "<div class='card-body'>"
                    card += "<label style='color: black'>" + products_category1[x].product_name + "</label><br>"
                    card += "<label style='color: black'>Quantity: " + products_category1[x].Qty + "</label>"
                    card += "<a href='#' class='btn btn-primary btn-block'>Add To Cart</a>"
                 card +=  "</div>"
                 card += "</div>"
                 card += "</div>"

                 $("#products").append(card); 
            }

            
        } );
    });
</script>
@endsection()

