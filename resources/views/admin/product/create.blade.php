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
                <li class="breadcrumb-item active">Add Products</li>
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
    <form action="{{url('/admin/products/store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Products Add</h3>

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
                            <label>Select Category</label><span class="text-danger"> * </span>
                            <select name="category_id" id="category_id" class="form-control select2" style="width: 100%;">
                                <option value="">Select</option>
                                @foreach($categories as $section)
                                <optgroup label="{{$section->section_name}}"></optgroup>
                                    @foreach($section['getCategories'] as $category)
                                        <option value="{{$category->id}}" @if(!empty(@old('category_id')) && $category->id == @old('category_id')) selected @endif>➥{{$category['category_name']}}</option>
                                        @foreach($category['subCategory'] as $subcategory)
                                            <option value="{{$subcategory->id}}" @if(!empty(@old('category_id')) && $subcategory->id == @old('category_id')) selected @endif>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;➙&nbsp;{{$subcategory['category_name']}}</option>
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Category Name">Product Name</label><span class="text-danger"> * </span>
                            <input type="text" id="product_name" name="product_name" class="form-control" placeholder="Enter Product name" value="@if(!empty(@old('product_name'))) {{@old('product_name')}} @endif">
                        </div>
                        <div class="form-group">
                            <label for="Category Discount">Product color</label><span class="text-danger"> * </span>
                            <input type="text" id="product_color" name="product_color" class="form-control" placeholder="Enter product  color" value="@if(!empty(@old('product_color'))) {{@old('product_color')}} @endif">
                        </div>
                        <div class="form-group">
                            <label>Wash Care</label>
                            <textarea class="form-control" id="wash_care" name="wash_care" rows="3" placeholder="Enter ...">@if(!empty(@old('wash_care'))) {{@old('wash_care')}} @endif</textarea>
                        </div>

                        <div class="form-group">
                            <label>Product Description</label>
                            <textarea class="form-control" id="description" name="product_description" rows="3" placeholder="Enter ...">@if(!empty(@old('description'))) {{@old('description')}} @endif</textarea>
                        </div>
                        <div class="form-group">
                            <label>Select Fabric</label>
                            <select name="fabric" id="fabric" class="form-control select2" style="width: 100%;">
                                <option value="">Select</option>
                                @foreach($fabricArray as $fabric)
                                    <option value='{{$fabric}}' @if(!empty(@old('fabric'))) selected @endif>{{$fabric}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select Sleeve</label>
                            <select name="sleeve" id="sleeve" class="form-control select2" style="width: 100%;">
                                <option value="">Select</option>
                                @foreach($sleeveArray as $sleeve)
                                    <option value='{{$sleeve}}' @if(!empty(@old('sleeve'))) selected @endif>{{$sleeve}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select Fit</label>
                            <select name="fit" id="fit" class="form-control select2" style="width: 100%;">
                                <option value="">Select</option>
                                @foreach($fitArray as $fit)
                                    <option value='{{$fit}}' @if(!empty(@old('fit'))) selected @endif>{{$fit}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select Pattern</label>
                            <select name="pattern" id="pattern" class="form-control select2" style="width: 100%;">
                                <option value="">Select</option>
                                @foreach($patternArray as $pattern)
                                    <option value='{{$pattern}}' @if(!empty(@old('pattern'))) selected @endif>{{$pattern}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select Occasion</label>
                            <select name="occasion" id="occasion" class="form-control select2" style="width: 100%;">
                                <option value="">Select</option>
                                @foreach($occasionArray as $occasion)
                                    <option value='{{$occasion}}' @if(!empty(@old('occasion'))) selected @endif>{{$occasion}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <!-- /.col -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Select Brand</label><span class="text-danger"> * </span>
                            <select name="brand_id" id="brand_id" class="form-control select2" style="width: 100%;">
                                <option value="">Select brand</option>
                                @foreach($brands as $brand)
                                   <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Category Discount">Product Price</label><span class="text-danger"> * </span>
                            <input type="text" id="product_price" name="product_price" class="form-control" placeholder="Enter product  price" value="@if(!empty(@old('product_price'))) {{@old('product_price')}} @endif">
                        </div>

                        <div class="form-group">
                            <label for="Category Discount">Product Code</label><span class="text-danger"> * </span>
                            <input type="text" id="product_code" name="product_code" class="form-control" placeholder="Enter product  code" value="@if(!empty(@old('product_code'))) {{@old('product_code')}} @endif">
                        </div>
                        <div class="form-group">
                            <label for="Product Discount">Product Discount</label>
                            <input type="text" id="product_discount" name="product_discount" class="form-control" placeholder="Enter product  discount" value="@if(!empty(@old('product_discount'))) {{@old('product_discount')}} @endif">
                        </div>

                        <div class="form-group">
                            <label for="Product Discount">Product Weight</label>
                            <input type="text" id="product_weight" name="product_weight" class="form-control" placeholder="Enter product  discount" value="@if(!empty(@old('product_weight'))) {{@old('product_weight')}} @endif">
                        </div>
                        <div class="form-group">
                            <label>Meta Title</label>
                            <textarea class="form-control" id="meta_title" name="meta_title" rows="3" placeholder="Enter ...">@if(!empty(@old('meta_title'))) {{@old('meta_title')}} @endif</textarea>
                        </div>
                        <div class="form-group">
                            <label>Meta Keywords</label>
                            <textarea class="form-control" id="meta_keywords" name="meta_keywords" rows="3" placeholder="Enter ...">@if(!empty(@old('meta_keywords'))) {{@old('meta_keywords')}} @endif</textarea>
                        </div>
                        <div class="form-group">
                            <label>Meta Description</label>
                            <textarea class="form-control" id="meta_description" name="meta_description" rows="3" placeholder="Enter ...">@if(!empty(@old('meta_description'))) {{@old('meta_description')}} @endif</textarea>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Product Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="product_image" class="custom-file-input" id="product_image">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Product Video</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="product_video" class="custom-file-input" id="product_video">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="yes" id="is_feature" name="is_feature">
                                <label class="form-check-label" for="flexCheckChecked">Feature</label>
                            </div>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->

                </div>
                <!-- /.row -->

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-md btn-primary" style="float: right">Submit</button>
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
