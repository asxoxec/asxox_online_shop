@extends('admin.site.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Slide Image</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Slide Image / Edit</a></li>
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
                            <h3>Please Edit Slide Images</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{Route('slide.update',$slide->id)}}"
                                enctype="multipart/form-data" class="pt-2">
                                {{csrf_field()}}
                                {{method_field('PUT')}}


                                <div class="form-group">
                                    <img src="{{asset('slide/'.$slide->image)}}" style="width:50px !important;">
                                </div>

                                <div class="form-group">
                                    <label for="File1">Choose Image :</label>
                                    <input type="file" class="form-control-file" id="File1" name="image">
                                </div>




                                <div class="form-group">
                                    <a href="{{route('slide.index')}}" class="btn btn-dark btn-sm mb-3">
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
