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
                        <li class="breadcrumb-item active">Product Images</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->

    </section>
    {{--bootstrap msg show--}}
    @if(Session::has('error_message'))
        <div class="col-lg-12">
            <div class="col-lg-1"></div>
            <div class="col-lg-12">
                <div class="alert alert-danger alert-dismissible fade show" style="margin-top:20px" role="alert">
                    <strong>{{Session::get('error_message')}}</strong>
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
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <form action="{{url('/admin/products/images/store',$product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Product Images</h3>

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
                                    <label for="Category Name" style="font-style: initial;color: #1a88ff">Product Name:</label>&nbsp;&nbsp;<span>{{$product->product_name}}</span>
                                </div>
                                <div class="form-group">
                                    <label for="Category Discount" style="font-style: initial;color: #1a88ff">Product color:</label>&nbsp;&nbsp;<span>{{$product->product_color}}</span>
                                </div>
                                <div class="form-group">
                                    <label for="Category Discount" style="font-style: initial;color: #1a88ff">Product code:</label>&nbsp;&nbsp;<span>{{$product->product_code}}</span>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?php
                                        $path = "images/admin_images/product/small/".$product->main_image
                                    ?>
                                    @if(!empty($product->main_image) && file_exists($path))
                                        <img width="120" height="120" src="{{asset('images/admin_images/product/small/'.$product->main_image)}}" alt="Proudct Image">
                                    @else
                                        <img width="120" height="120" src="{{asset('images/admin_images/product/small/no-image.jpg')}}" alt="Proudct Image">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="file" id="image" multiple name="images[]">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-md btn-primary" style="float: right">Submit</button>
                    </div>
                </div>
            </form>

            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Products Images Lists</h3>

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
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="datatable" class="table table-bordered table-striped table-sm">
                                <thead>
                                <tr>
                                    <th>Sl</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i =1;
                                ?>
                                @foreach($product['images'] as $key => $image)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>
                                            <?php
                                            $path = "images/admin_images/product/small/".$image->main_image
                                            ?>
                                            @if(!empty($image->main_image) && file_exists($path))
                                                <img width="80px" height="60px" src="{{asset('images/admin_images/product/small/'.$image->main_image)}}" alt="Product Image">
                                            @else
                                                <img width="80px" height="60px" src="{{asset('images/admin_images/product/small/no-image.jpg')}}" alt="Proudct Image">
                                            @endif
                                        </td>
                                        <td>
                                            @if($image->status == '1')
                                                <a href="{{url('/admin/products-images/status/active',$image->id)}}"class="badge badge-success" style="font-size: 14px; cursor: pointer"><i class="fa fa-arrow-down"></i> Active</a>
                                            @else
                                                <a href="{{url('/admin/products-images/status/inactive',$image->id)}}" class="badge badge-danger"  style="font-size: 14px; cursor: pointer"><i class="fa fa-arrow-up"></i> Inactive</a>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="javascript:;" class="btn btn-sm btn-outline-danger sa-delete" record="products-image" recordid="{{$image->id}}" title="Delete" style="margin-left: 15px"><i class="fa fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
@endsection
