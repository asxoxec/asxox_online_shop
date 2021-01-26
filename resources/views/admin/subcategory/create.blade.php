@extends('admin.site.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">SubCategory</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">SubCategory / Create</a></li>
                        <!-- <li class="breadcrumb-item active">Dashboard v1</li> -->
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
            <div class="row justify-content-center">

                <div class="col-lg-6 col-md-6 col-12 bg-white">

                    <div class="card m-5">
                        <div class="card-header bg-success">
                            <h3>Please Create SubCategory</h3>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{Route('subcategory.store')}}" enctype="multipart/form-data"
                                class="pt-2">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Name :</label>
                                    <input type="text" id="" class="form-control" placeholder="Enter Category Name"
                                        name="name">
                                </div>

                                <div class="form-group">
                                    <label for="File1">Choose Image :</label>
                                    <input type="file" class="form-control-file rounded" id="File1" name="image"
                                        style="border:1px solid black;">
                                </div>

                                <div class="form-group">
                                    <div style="width:100%;height:120px;overflow-y:scroll;">

                                        @foreach($categories as $category)
                                        <div class="checkbox">
                                            <label><input type="radio" value="{{$category->id}}" name="category_id"> {{$category->name}}</label>
                                        </div>
                                        @endforeach
                                        
                                    </div>
                                </div>


                                <div class="form-group">
                                    <a href="{{route('subcategory.index')}}" class="btn btn-dark btn-sm mb-3">
                                        <i class="fas fa-reply"></i> Back
                                    </a>
                                    <button type="submit" class="btn btn-success btn-sm mb-3">
                                        <i class="fas fa-save"></i> Add
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                    @include('admin.error')
                </div>

            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection