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
                            <li class="breadcrumb-item active">Admin password</li>
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
                                <h3 class="card-title">Change Your Password</h3>
                            </div>
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
                            {{--success message--}}
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
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('/admin/submit-update-password')}}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Username</label>
                                        <input type="text" class="form-control" value="{{$adminDetails->name}}" id="name" name="name" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" readonly name="email" value="{{$adminDetails->email}}" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Current Password</label><span class="text-danger">*</span>
                                        <input type="password" class="form-control" name="current_pwd" id="current_pwd" placeholder="Enter current password">
                                        <span id="show_msg"></span>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">New Password</label><span class="text-danger">*</span>
                                        <input type="password" class="form-control" id="new_pwd" name="new_pwd" placeholder="Enter new password">
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm_pwd">Confirm Password</label><span class="text-danger">*</span>
                                        <input type="password" class="form-control" id="confirm_pwd" name="confirm_pwd" placeholder="Enter confirm password">
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
