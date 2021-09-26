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
                                <li class="breadcrumb-item active">Brands</li>
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
                                    <h3 class="card-title">Brand lists</h3>
                                    <a href="{{url('/admin/brands/add-brand')}}" class="btn btn-sm btn-info" style="float: right">Add Brand</a>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="datatable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Brand</th>
                                            <th>Status</th>
                                            <th>Active</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;
                                        ?>
                                        @foreach($brands as $row)
                                            <tr>
                                                <td>{{$i++}}</td>
                                                <td>{{$row->name}}</td>
                                                <td>
                                                    @if($row->status == '1')
                                                        <a href="{{url('/admin/brands/status/active',$row->id)}}"class="badge badge-success" style="font-size: 14px; cursor: pointer"><i class="fa fa-arrow-down"></i> Active</a>
                                                    @else
                                                        <a href="{{url('/admin/brands/status/inactive',$row->id)}}" class="badge badge-danger"  style="font-size: 14px; cursor: pointer"><i class="fa fa-arrow-up"></i> Inactive</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{url('/admin/brands/edit/'.$row->id)}}" class="btn btn-sm btn-outline-secondary" title="Edit"><i class="fa fa-pencil-alt"></i></a>
                                                    <a href="javascript:;" class="btn btn-sm btn-outline-danger sa-delete" record="brands" recordid="{{$row->id}}" title="Delete" style="margin-left: 15px"><i class="fa fa-trash-alt"></i></a>
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
