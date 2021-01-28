@extends('admin.site.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1 class="m-0 text-dark">Product</h1>
                </div><!-- /.col -->
                <div class="col-sm-4">
                    @include('admin.error')
                </div><!-- /.col -->
                <div class="col-sm-4">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Product / Home</a></li>
                        <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->


    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-lg-12 col-md-12 col-12 bg-white">

                        <div class="container-fluid">
                            <div class="row mt-4">

                                <div class="col-md-6">
                                    <section class="content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card card-outline card-success">
                                                    <div class="card-header">
                                                        <h3 class="card-title">
                                                            Product Description
                                                        </h3>
                                                        <!-- tools box -->
                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool btn-sm"
                                                                data-card-widget="collapse" data-toggle="tooltip"
                                                                title="Collapse">
                                                                <i class="fas fa-minus"></i></button>
                                                        </div>
                                                        <!-- /. tools -->
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body pad" style="padding-bottom:5px;">
                                                        <div class="mb-3">
                                                            <div class="form-group">
                                                                <label for="name">Title :</label>
                                                                <input type="text" id="" class="form-control"
                                                                    placeholder="Enter Product Title" name="ptitle"
                                                                    style="border:1px solid black;">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="File2">Choose Image :</label>
                                                                <input type="file" class="form-control-file rounded"
                                                                    id="File2" name="pimage"
                                                                    style="border:1px solid black;">
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="pprice">Size :</label>
                                                                        <input type="text" class="form-control rounded"
                                                                            id="psize" name="psize"
                                                                            style="border:1px solid black;">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="pdiscount">Color :</label>
                                                                        <input type="text" class="form-control rounded"
                                                                            id="pcolor" name="pcolor"
                                                                            style="border:1px solid black;">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="pprice">Price :</label>
                                                                        <input type="number"
                                                                            class="form-control rounded" id="pprice"
                                                                            name="pprice"
                                                                            style="border:1px solid black;">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="pdiscount">Discount :</label>
                                                                        <input type="number"
                                                                            class="form-control rounded" id="pdiscount"
                                                                            name="pdiscount"
                                                                            style="border:1px solid black;">
                                                                    </div>
                                                                </div>
                                                            </div>



                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.col-->
                                        </div>
                                        <!-- ./row -->
                                    </section>
                                </div>

                                <div class="col-md-6">
                                    <section class="content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card card-outline card-info">
                                                    <div class="card-header">
                                                        <h3 class="card-title">
                                                            Product Description
                                                        </h3>
                                                        <!-- tools box -->
                                                        <div class="card-tools">
                                                            <button type="button" class="btn btn-tool btn-sm"
                                                                data-card-widget="collapse" data-toggle="tooltip"
                                                                title="Collapse">
                                                                <i class="fas fa-minus"></i></button>
                                                        </div>
                                                        <!-- /. tools -->
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <div class="card-body pad">
                                                        <div class="mb-3">

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="pcategory">Category :</label>
                                                                        <select class="form-control rounded"
                                                                            id="pcategory" name="category_id"
                                                                            style="border:1px solid black;">
                                                                            <option selected disabled>Please Select
                                                                                Category</option>
                                                                            @foreach($categories as $category)
                                                                            <option value="{{$category->id}}">
                                                                                {{$category->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="psubcategory">SubCategory :</label>
                                                                        <select class="form-control rounded"
                                                                            id="psubcategory" name="subcategory_id"
                                                                            style="border:1px solid black;">
                                                                            <option selected disabled>Please Select
                                                                                SubCategory</option>
                                                                            @foreach($subcategories as $subcategory)
                                                                            <option value="{{$subcategory->id}}">
                                                                                {{$subcategory->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="File4">Description Image :</label>
                                                                <input type="file" class="form-control-file rounded"
                                                                    id="File4" name="pdescriptionimg[]"
                                                                    style="border:1px solid black;" multiple>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="pdescription">Description Title :</label>
                                                                <input type="text" class="form-control rounded"
                                                                    id="pdescription" name="pdescription"
                                                                    placeholder="Please Fill Description Title"
                                                                    style="border:1px solid black;" multiple>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="video">Video Url :</label>
                                                                <input type="url" class="form-control" id="video"
                                                                    name="pvideourl" placeholder="Please Fill URL"
                                                                    style="border:1px solid black;" multiple>
                                                            </div>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /.col-->
                                        </div>
                                        <!-- ./row -->
                                    </section>
                                </div>




                                <div class="col-md-12">
                                    <table class="table table-striped">
                                        <thead>
                                            <!-- <tr>
                                            <th>Size</th>
                                            <th>Color</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Discount</th>
                                            <th>Action</th>
                                        </tr> -->
                                        </thead>

                                        <tbody>
                                            <tr>

                                                <td>
                                                    <input type="text" placeholder="L,M,S"
                                                        class="form-control form-control-sm" id="size" value="">
                                                </td>

                                                <td>
                                                    <input type="text" placeholder="Red"
                                                        class="form-control form-control-sm" id="color" value="">
                                                </td>

                                                <td>
                                                    <input type="number" placeholder="123"
                                                        class="form-control form-control-sm" id="quantity" value="">
                                                </td>

                                                <td>
                                                    <input type="number" placeholder="10,000"
                                                        class="form-control form-control-sm" id="price" value="">
                                                </td>

                                                <td>
                                                    <input type="number" placeholder="5,000"
                                                        class="form-control form-control-sm" id="discount" value="">
                                                </td>

                                                <td>
                                                    <a id="addMore" class="btn btn-success btn-sm">
                                                        <span class="fa fa-plus"></span>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>


                            </div>
                            <div class="row" style="margin-top:26px;">
                                <div class="col-md-12">




                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Size</th>
                                                <th>Color</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                                <th>Discount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody id="addRow" class="addRow">

                                        </tbody>
                                        <tbody>

                                        </tbody>

                                    </table>
                                    <br>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-sm float-right">Add
                                            Product</button>
                                    </div>
                                    <br><br>


                                </div>
                            </div>
                        </div>
                </form>

                <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.7.6/handlebars.min.js"></script>

                <script id="document-template" type="text/x-handlebars-template">
                    <tr class="delete_add_more_item" id="delete_add_more_item">
      <td>
      <input type="file" id="image" name="image[]"
                                        style="border:1px solid black;" value="@{{ image }}">
      </td>

      <td>
        <input type="text" name="size[]" value="@{{ size }}">
      </td>
      <td>
        <input type="text" name="color[]" value="@{{ color }}">
      </td>
      <td>
        <input type="number" class="price" name="price[]" value="@{{ price }}">
      </td>
      <td>
        <input type="number" class="quantity" name="quantity[]" value="@{{ quantity }}">
      </td>
      <td>
        <input type="number" class="discount" name="discount[]" value="@{{ discount }}">
      </td>

      <td>
       <a class="removeaddmore  btn-danger btn-sm" style="cursor:pointer;">
       <span class="fa fa-minus"></span>
       </a>
      </td>

  </tr>
 </script>

                <script type="text/javascript">
                $(document).on('click', '#addMore', function() {

                    $('.table').show();

                    var image = $("#image").val();
                    var size = $("#size").val();
                    var color = $("#color").val();
                    var price = $("#price").val();
                    var quantity = $("#quantity").val();
                    var discount = $("#discount").val();
                    var source = $("#document-template").html();
                    var template = Handlebars.compile(source);

                    var data = {
                        image: image,
                        size: size,
                        color: color,
                        price: price,
                        discount: discount,
                        quantity: quantity
                    }

                    var html = template(data);
                    $("#addRow").append(html)

                });

                $(document).on('click', '.removeaddmore', function(event) {
                    $(this).closest('.delete_add_more_item').remove();
                });
                </script>

                </body>


            </div>

        </div>
        <!-- /.row -->

</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>



@endsection
