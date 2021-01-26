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
                        <li class="breadcrumb-item"><a href="#">SubCategory / Edit</a></li>
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
                    @include('admin.error')
                    <div class="card m-5">
                        <div class="card-header bg-info">
                            <h3>Please Edit SubCategory</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{Route('subcategory.update',$subcat->id)}}"
                                enctype="multipart/form-data" class="pt-2">
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                                <div class="form-group">
                                    <label for="name">Name :</label>
                                    <input type="text" value="{{$subcat->name}}" class="form-control"
                                        placeholder="Enter Category Name" name="name">
                                </div>

                                <div class="form-group">
                                    <img src="{{asset('subcategory/'.$subcat->image)}}" style="width:50px !important;">
                                </div>

                                <div class="form-group">
                                    <label for="File1">Choose Image :</label>
                                    <input type="file" class="form-control-file" id="File1" name="image">
                                </div>

                                <div class="form-group">
                                    <div style="width:100%;height:120px;overflow-y:scroll;">

                                        @foreach($categories as $category)
                                        <div class="checkbox">
                                            <label><input type="radio" value="{{$category->id}}" name="category_id" {{ $category->id == $subcat->id ? 'checked' : '' }}> {{$category->name}}</label>
                                        </div>
                                        @endforeach
                                        
                                    </div>
                                </div>


                                <div class="form-group">
                                    <a href="{{route('subcategory.index')}}" class="btn btn-dark btn-sm mb-3">
                                        <i class="fas fa-reply"></i> Back
                                    </a>
                                    <button type="submit" class="btn btn-info btn-sm mb-3">
                                        <i class="fas fa-save"></i> Update
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                    
                </div>

            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection