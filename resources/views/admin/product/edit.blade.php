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

                <div class="col-lg-12 col-md-12 col-12 bg-white">
                    <form action="{{ route('product.update',$product->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        {{method_field('PUT')}}
                        <div class="container-fluid">

                            <div class="row mt-4">

                                <div class="col-md-6">
                                    <section class="content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card card-outline card-info">
                                                    <div class="card-header">
                                                        <h3 class="card-title">
                                                            Product Description Only Text And Image
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
                                                            <textarea class="textarea" name="pdescription"
                                                                placeholder="Place some text here"
                                                                style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
                                                    <div class="card-body pad">
                                                        <div class="mb-3">
                                                            <div class="form-group">
                                                                <label for="name">Title :</label>
                                                                <input type="text" id="" class="form-control"
                                                                    placeholder="Enter Product Title" name="ptitle"
                                                                    value="{{$product->title}}"
                                                                    style="border:1px solid black;">
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="File1">Choose Image :</label>
                                                                <input type="file" class="form-control-file rounded"
                                                                    id="File1" name="pimage"
                                                                    style="border:1px solid black;">
                                                            </div>

                                                            <div class="form-group">
                                                                <img src="{{asset('product/'.$product->cover)}}"
                                                                    style="width:50px !important;">
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="price">Price :</label>
                                                                        <input type="number"
                                                                            class="form-control rounded" id="discount"
                                                                            name="pprice" value="{{$product->price}}"
                                                                            style="border:1px solid black;">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="pdiscount">Discount :</label>
                                                                        <input type="number"
                                                                            class="form-control rounded" id="pdiscount"
                                                                            name="pdiscount"
                                                                            value="{{$product->discount}}"
                                                                            style="border:1px solid black;">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="category">Category :</label>
                                                                        <select class="form-control rounded"
                                                                            id="category" name="category_id"
                                                                            style="border:1px solid black;">
                                                                            <option selected disabled>Please Select
                                                                                Category</option>
                                                                            @foreach($categories as $category)
                                                                            <option value="{{$category->id}}"
                                                                                {{ $category->id == $product->category->id ? 'selected' : '' }}>
                                                                                {{$category->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="subcategory">SubCategory :</label>
                                                                        <select class="form-control rounded"
                                                                            id="subcategory" name="subcategory_id"
                                                                            style="border:1px solid black;">
                                                                            <option selected disabled>Please Select
                                                                                SubCategory</option>
                                                                            @foreach($subcategories as $subcategory)
                                                                            <option value="{{$subcategory->id}}"
                                                                                {{ $subcategory->id == $product->subcategory->id ? 'selected' : '' }}>
                                                                                {{$subcategory->name}}</option>
                                                                            @endforeach
                                                                        </select>
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


                                <div class="col-md-12">
                                    <table class="table table-striped">

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
                    </form>
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

                                <tbody>
                                    @foreach($product->details as $detail)

                                    <tr>
                                        <td>
                                            <img src="{{asset('detail/'.$detail->image)}}" class="img-thumbnail"
                                                style="width:50px !important;">
                                        </td>
                                        <td>{{$detail->size}}</td>
                                        <td>{{$detail->color}}</td>
                                        <td>{{$detail->qty}}</td>
                                        <td>{{$detail->price}}</td>
                                        <td>{{$detail->discount}}</td>
                                        <td>
                                            <a href="{{$detail->id}}" class="btn btn-primary btn-sm btn-edit"
                                                data-toggle="modal" data-target="#myModal">
                                                <span class="fa fa-edit"></span>
                                            </a>

                                            <a href="" class="btn btn-danger btn-sm btn-edit" data-toggle="modal"
                                                data-target="#delModal{{$detail->id}}">
                                                <span class="fa fa-trash"></span>
                                            </a>

                                            <div class="modal" id="delModal{{$detail->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                            <h4 class="modal-title text-danger ">Are You Sure Want To Delete
                                                                ?
                                                            </h4>
                                                            <button type="button" class="close"
                                                                data-dismiss="modal">&times;</button>
                                                        </div>

                                                        <div class="modal-body">
                                                        <div class="form-group text-center">
                                                                <img src="{{asset('detail/'.$detail->image)}}"
                                                                    style="width:100px !important;" class="img-thumbnail">
                                                            </div>

                                                        </div>


                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-info btn-sm"
                                                                data-dismiss="modal">Cancel</button>

                                                            <form action="{{route('detail.destroy',$detail->id)}}"
                                                                method="post">
                                                                @csrf
                                                                {{method_field('DELETE')}}
                                                                <button type="submit"
                                                                    class="btn btn-danger btn-sm">Delete</button>
                                                            </form>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>

                                    @endforeach


                                </tbody>



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

                <script>
                $(function() {
                    // Summernote
                    $('.textarea').summernote({
                        height: 285,
                        placeholder: 'Please Fill Product Description',
                        minHeight: 350,
                    }).summernote('Ok');
                    var markupStr = `@php echo $product->description @endphp`;
                    $('.textarea').summernote('code', markupStr);
                })
                </script>

                </body>


            </div>

        </div>
        <!-- /.row -->

</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- Model -->

<div class="modal" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Edit Product</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <form method="post" enctype="multipart/form-data" id="product_update">
                @csrf
                {{method_field('PUT')}}
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">File</label>
                        <input type="file" class="form-control form-control-sm rounded" name="image" id="edit_image">
                    </div>

                    <input type="hidden" value="" name="getid" id="getid">

                    <div class="form-group">
                        <img src="" class="img-thumbnail" style="width:50px !important;" id="imgshow">
                    </div>

                    <div class="form-group">
                        <label for="">Size</label>
                        <input type="text" placeholder="L,M,S" class="form-control form-control-sm" name="size" value=''
                            id="edit_size">
                        <font style="color:red"> {{ $errors->has('size') ?  $errors->first('size') : '' }} </font>
                    </div>

                    <div class="form-group">
                        <label for="">Color</label>
                        <input type="text" placeholder="Red" class="form-control form-control-sm" name="color" value=""
                            id="edit_color">
                        <font style="color:red"> {{ $errors->has('color') ?  $errors->first('color') : '' }} </font>
                    </div>

                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="number" placeholder="123" class="form-control form-control-sm" name="qty" value=""
                            id="edit_quantity">
                        <font style="color:red"> {{ $errors->has('quantity') ?  $errors->first('quantity') : '' }}
                        </font>
                    </div>

                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" placeholder="10,000" class="form-control form-control-sm" name="price"
                            value="" id="edit_price">
                        <font style="color:red"> {{ $errors->has('price') ?  $errors->first('price') : '' }} </font>
                    </div>

                    <div class="form-group">
                        <label for="">Discount</label>
                        <input type="number" placeholder="5,000" class="form-control form-control-sm" name="discount"
                            value="" id="edit_discount">
                        <font style="color:red"> {{ $errors->has('discount') ?  $errors->first('discount') : '' }}
                        </font>
                    </div>


                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Close</button>
                    <button id="submit" class="btn btn-info btn-sm">Update</button>
                </div>

            </form>

        </div>
    </div>
</div>

<script type="text/javascript">
$('.btn-edit').click(function(e) {
    e.preventDefault();
    var nid = $(this).attr("href");
    geturlid = `${nid}/edit`;
    if (nid) {
        $.ajax({
            type: "get",
            url: `{{url('admin/detail/')}}/${geturlid}`,
            dataType: 'json',
            success: function(res) {
                if (res) {

                    console.log(res);

                    if (res.detail.size === null) {
                        res.detail.size = '';
                    }
                    if (res.detail.color === null) {
                        res.detail.color = '';
                    }


                    $("#imgshow").empty();
                    $("#imgshow").attr("src", `{{asset('detail/')}}/${res.detail.image}`);

                    //$("#product_update").empty();
                    $("#product_update").attr("action",
                        `{{url('admin/detail/')}}/${res.detail.id}`);

                    $("#getid").empty();
                    $("#getid").val(`${res.detail.id}`);

                    $("#edit_size").empty();
                    $("#edit_size").val(`${res.detail.size}`);

                    $("#edit_color").empty();
                    $("#edit_color").val(`${res.detail.color}`);

                    $("#edit_quantity").empty();
                    $("#edit_quantity").val(`${res.detail.qty}`);

                    $("#edit_price").empty();
                    $("#edit_price").val(`${res.detail.price}`);

                    $("#edit_discount").empty();
                    $("#edit_discount").val(`${res.detail.discount}`);


                }
            }

        });
    }
});
</script>

<!-- End Model -->


</div>



@endsection