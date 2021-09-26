@extends('layouts.admin_layout.admin_layout')
@section('content')
<div class="wrapper">


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Brands</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Brands</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    {{--custom validation--}}
    <div class="col-lg-12">
        <div class="col-lg-1"></div>
        <div class="col-lg-6">
            @if ($errors->any())
                <div class="alert alert-danger" style="margin-top:20px">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="col-lg-1"></div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <form action="{{url('/admin/brands/update', $brands->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Brands Edit</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Category Name">Brand Name</label><span class="text-danger"> * </span>
                                    <input type="text" id="brand_name" name="brand_name" class="form-control" value="{{$brands->name}}" placeholder="Enter categoy name">
                                </div>
                                <div class="form-group">
                                    <label for="Category Name">Select Status</label><span class="text-danger"> * </span>
                                    <select name="status" id="status" class="form-control select2" style="width: 100%;">
                                        <option value="">Select Status</option>
                                        <option value="1" @if(!empty($brands->status) && $brands->status == 1) selected @endif>Active</option>
                                        <option value="0"  @if($brands->status == 0) selected @endif>Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- /.row -->

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </div>
                </div>
            </form>
            <!-- /.card -->
        </div>


    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
@endsection
