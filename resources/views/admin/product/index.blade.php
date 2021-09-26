@extends('layouts.admin_layout.admin_layout')
@section('content')
<div class="wrapper">

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Products</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Products</li>
            </ol>
        </div>
    </div>
</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
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
                <div class="card-header">
                    <h3 class="card-title">Product lists</h3>
                    <a href="{{url('/admin/products/add-products')}}" class="btn btn-sm btn-info" style="float: right">Add Product</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped table-sm">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Color</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Section</th>
                            <th>Status</th>
                            <th>Active</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $i = 1;
                        ?>
                        @foreach($product as $row)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$row->product_name}}</td>
                                <td>{{$row->product_code}}</td>
                                <td>{{$row->product_color}}</td>
                                <td>
                                    <?php
                                    $path = "images/admin_images/product/small/".$row->main_image;
                                    ?>
                                    @if(!empty($row->main_image) && file_exists($path))
                                        <img width="60px" height="50px" src="{{asset('images/admin_images/product/small/'.$row->main_image)}}" alt="image">
                                    @else
                                        <img width="60px" height="50px" src="{{asset('images/admin_images/product/small/no-image.jpg')}}" alt="image">
                                    @endif
                                </td>
                                <td>{{$row->getCategory['category_name']}}</td>
                                <td>{{$row->getBrand['name']}}</td>
                                <td>{{$row->getSection['section_name']}}</td>
                                <td>
                                    @if($row->status == '1')
                                        <a href="{{url('/admin/products/status/active',$row->id)}}"class="badge badge-success" style="font-size: 14px; cursor: pointer"><i class="fa fa-arrow-down"></i> Active</a>
                                    @else
                                        <a href="{{url('/admin/products/status/inactive',$row->id)}}" class="badge badge-danger"  style="font-size: 14px; cursor: pointer"><i class="fa fa-arrow-up"></i> Inactive</a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('/admin/products/attribute/'.$row->id)}}" class="btn btn-sm btn-outline-primary" title="Add Attribute"><i class="fa fa-plus"></i></a>
                                    <a href="{{url('/admin/products/images/'.$row->id)}}" class="btn btn-sm btn-outline-success" title="Add Product Images" style="margin-left: 15px"><i class="fa fa-file"></i></a>
                                    <a href="{{url('/admin/products/edit/'.$row->id)}}" class="btn btn-sm btn-outline-secondary" title="Edit" style="margin-left: 15px"><i class="fa fa-pencil-alt"></i></a>
                                    <a href="javascript:;" class="btn btn-sm btn-outline-danger sa-delete" record="products" recordid="{{$row->id}}" title="Delete" style="margin-left: 15px"><i class="fa fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->
@endsection
