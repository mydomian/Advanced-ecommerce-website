@extends('layouts.admin_layout.admin_layout')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
    <h1 class="m-0">Settings</h1>
</div><!-- /.col -->
<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="#">Home</a></li>
        <li class="breadcrumb-item active">Admin Details</li>
    </ol>
</div><!-- /.col -->
</div><!-- /.row -->
</div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
<div class="container-fluid">
<div class="row">
<!-- left column -->
<div class="col-md-6">
    <!-- general form elements -->
    <div class="card card-info">
        <div class="card-header">
            <h3 class="card-title">Change Admin Details</h3>
        </div>
        {{--bootstrap msg show--}}
        @if(Session::has('success_message'))
            <div class="col-lg-12">
                <div class="col-lg-1"></div>
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible fade show" style="margin-top:20px" role="alert">
                        <strong>{{Session::get('success_message')}}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="col-lg-1"></div>
            </div>
        @endif
        {{--custom validation--}}
        <div class="col-lg-12">
            <div class="col-lg-1"></div>
            <div class="col-lg-12">
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
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{url('/admin/settings/update-admin-details')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">

                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" readonly name="email" value="{{Auth::guard('admin')->user()->email}}" id="email">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Type</label>
                    <input type="text" class="form-control" readonly name="type" id="type" value="{{Auth::guard('admin')->user()->type}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label><span class="text-danger">*</span>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Phone</label><span class="text-danger">*</span>
                    <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter your secure pasword">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Image</label><span class="text-danger">*</span>
                    <input type="file" class="form-control" id="admin_image" name="admin_image" accept="image/*">
                    @if(!empty(Auth::guard('admin')->user()->image))
                       <a href="{{ asset('storage/images/admin_images/admin/'.$admin->image) }}" class=" btn btn-sm btn-secondary" style="margin-top: 10px;float: right" target="_blank" >See Current Image</a>
                    @endif

                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-info">Submit</button>
            </div>
        </form>
    </div>
    <!-- /.card -->
</div>
<!--/.col (left) -->
</div>
<!-- /.row -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

</div>
@endsection
