@extends('admin.site.master')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tag</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Tag / Create</a></li>
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
                            <h3>Please Create Tag</h3>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{Route('tag.store')}}" class="pt-2">
                                @csrf

                                <div class="form-group">
                                    <label for="name">Name :</label>
                                    <input type="text" id="" class="form-control" placeholder="Enter Tag Name"
                                        name="name">
                                </div>

                                <div class="form-group">
                                    <a href="{{route('tag.index')}}" class="btn btn-dark btn-sm mb-3">
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