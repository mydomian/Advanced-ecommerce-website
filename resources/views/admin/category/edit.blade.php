@extends('layouts.admin_layout.admin_layout')
@section('content')
    <div class="wrapper">


        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Categories</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Edit Categories</li>
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
                    <form action="{{url('/admin/categories/update',$categories->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Categories Edit</h3>

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
                                            <label for="Category Name">Category Name</label><span class="text-danger"> * </span>
                                            <input type="text" id="category_name" name="category_name" class="form-control" value="{{$categories->category_name}}">
                                        </div>
                                        <div id="categoryLevel">
                                            @include('admin.category.category_level')
                                        </div>
                                        <div class="form-group">
                                            <label for="Category Discount">Category Discount</label>
                                            <input type="text" id="category_discount" name="category_discount" class="form-control" value="{{$categories->category_discount}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Category Description</label>
                                            <textarea class="form-control" id="category_description" name="category_description" rows="3">{{$categories->description}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <textarea class="form-control" id="meta_description" name="meta_description" rows="3">{{$categories->meta_description}}</textarea>
                                        </div>

                                    </div>
                                    <!-- /.col -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Select Section</label><span class="text-danger"> * </span>
                                            <select name="section_id" id="section_id" class="form-control select2" style="width: 100%;">
                                                <option value="">Select</option>
                                                @foreach($sections as $section)
                                                    <option value="{{$section->id}}" @if($section->id == $categories->section_id) selected @endif>{{$section->section_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Category Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="category_image" class="custom-file-input" id="category_image">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="Category URL">Category URL</label>
                                            <input type="text" id="category_url" name="category_url" class="form-control" value="{{$categories->url}}">
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Title</label>
                                            <textarea class="form-control" id="meta_title" name="meta_title" rows="3">{{$categories->meta_title}}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Keywords</label>
                                            <textarea class="form-control" id="meta_keywords" name="meta_keywords" rows="3">{{$categories->meta_keywords}}</textarea>
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
