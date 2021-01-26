@extends('admin.site.master')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h1 class="m-0 text-dark">SubCategory</h1>
                </div><!-- /.col -->
                <div class="col-sm-4">
                @include('admin.error')
                </div><!-- /.col -->
                <div class="col-sm-4">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">SubCategory / Home</a></li>
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
            <div class="row">

                <div class="col-lg-12 col-md-12 col-12 bg-white">

                    <div class="card-body">
                        <a href="{{route('subcategory.create')}}" class="btn btn-success btn-sm mt-3 mb-3">
                            <i class="fas fa-plus"></i> Add
                        </a>

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i=1; @endphp
                                @foreach($subcats as $subcat)
                                <tr>
                                    <td>@php echo $i;$i++; @endphp</td>
                                    <td>{{$subcat->name}}</td>
                                    <td>
                                        <img src="{{asset('subcategory/'.$subcat->image)}}"
                                            style="width:50px !important;">
                                    </td>
                                    <td>
                                        <a href="{{route('category.show',$subcat->category->id)}}" class="btn btn-dark btn-sm rounded-pill">{{$subcat->category->name}}</a>
                                    </td>
                                    <td class="d-flex">
                                        <a href="{{Route('subcategory.edit',$subcat->id)}}"
                                            class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        |
                                        <form method="POST" action="{{Route('subcategory.destroy',$subcat->id)}}">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                
                                @endforeach

                            </tbody>

                        </table>

                    </div>
                </div>

            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>



@endsection