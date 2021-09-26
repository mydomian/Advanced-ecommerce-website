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
                    <li class="breadcrumb-item active">Products Attributes</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
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
        <form action="{{url('/admin/products/store-attribute',$products->id)}}" method="post">
            @csrf
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Products Attribute</h3>

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
                                <label for="Category Name" style="font-style: initial;color: #1a88ff">Product Name:</label>&nbsp;&nbsp;<span>{{$products->product_name}}</span>
                            </div>
                            <div class="form-group">
                                <label for="Category Discount" style="font-style: initial;color: #1a88ff">Product color:</label>&nbsp;&nbsp;<span>{{$products->product_color}}</span>
                            </div>
                            <div class="form-group">
                                <label for="Category Discount" style="font-style: initial;color: #1a88ff">Product code:</label>&nbsp;&nbsp;<span>{{$products->product_code}}</span>
                            </div>
                            <div class="form-group">
                                <label for="Category Discount" style="font-style: initial;color: #1a88ff">Product price:</label>&nbsp;&nbsp;<span>{{$products->product_price}}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <?php
                                    $path = 'images/admin_images/product/small/'.$products->main_image;
                                ?>
                                @if(!empty($products->main_image) && file_exists($path))
                                    <img width="120" height="120" src="{{asset('images/admin_images/product/small/'.$products->main_image)}}" alt="Proudct Image">
                                @else
                                    <img width="120" height="120" src="{{asset('images/admin_images/product/small/no-image.jpg')}}" alt="Proudct Image">
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-md-12">
                            <div class="field_wrapper">
                                <div>
                                    <input type="number" width="150px" name="price[]" placeholder="Product price" required value=""/>
                                    <input type="text" width="150px" name="size[]" placeholder="Product size" required value=""/>
                                    <input type="text" width="150px" name="sku[]" placeholder="Product sku" required value=""/>
                                    <input type="number" width="150px" name="stock[]" placeholder="Product stock" required value=""/>
                                    <a href="javascript:;" style="margin-left: 5px" class="add_button btn btn-sm btn-outline-primary" title="Add field" style="margin-top: -4px">Add More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-md btn-primary" style="float: right">Submit</button>
                </div>
            </div>
        </form>
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Products Attribute Details</h3>

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

            <form action="{{url('/admin/products/update-attribute',$products->id)}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <table id="datatable" class="table table-bordered table-striped table-sm">
                                <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Size</th>
                                    <th>SKU</th>
                                    <th>Price</th>
                                    <th>Stock</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i = 1;
                                ?>
                                @foreach($products['attribute'] as $key => $value)
                                    <td><input type="hidden" name="attr_id[]" value="{{$value->id}}"></td>
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$value->size}}</td>
                                    <td>{{$value->sku}}</td>
                                    <td><input type="number" name="price[]" value="{{$value->price}}"></td>
                                    <td><input type="number" name="stock[]" value="{{$value->stock}}"></td>
                                    <td>
                                        <a href="{{url('/admin/delete-productattribute', $value->id)}}" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-md btn-primary" style="float: right">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- /.content -->

</div>
<!-- ./wrapper -->
@endsection
