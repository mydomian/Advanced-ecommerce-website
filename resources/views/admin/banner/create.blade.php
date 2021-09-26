@extends('layouts.admin_layout.admin_layout')
@section('content')
<div class="wrapper">
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
    <div class="col-sm-6">
        <h1>Banner</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add Banner</li>
        </ol>
    </div>
</div>
</div><!-- /.container-fluid -->
</section>
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
<!-- Main content -->
<section class="content">
<div class="container-fluid">
<!-- SELECT2 EXAMPLE -->
<form action="{{url('/admin/banners/store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="card card-default">
        <div class="card-header">
            <h3 class="card-title">Banner Add</h3>

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
                        <label for="Banner Title">Banner Title</label>
                        <input type="text" id="banner_name" name="banner_name" class="form-control" placeholder="Enter banner name">
                    </div>
                    <div class="form-group">
                        <label>Banner Link</label>
                        <input type="text" id="banner_link" name="banner_link" class="form-control" placeholder="Enter banner link">
                    </div>
                    <div class="form-group">
                        <label>Banner Alt</label>
                        <input type="text" id="banner_alt" name="banner_alt" class="form-control" placeholder="Enter banner alt">
                    </div>
                    <div class="form-group">
                        <label>Banner Status</label>
                        <select name="status" id="status" class="form-control select2" style="width: 100%;">
                            <option value="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Banner Image</label>
                        <input type="file" id="banner_image" name="banner_image" class="form-control" placeholder="Enter banner image">
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-md btn-primary" >Submit</button>
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
