@extends('layouts.admin')

@section('title')
    <title>Trang quản trị</title>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Starter Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="">
                            <div class="form-group">
                                <label for="">Tên danh mục</label>
                                <input type="text" class="form-control" placeholder="Nhập tên danh mục">
                            </div>

                            <div class="form-group">
                                <label for="">Chọn danh mục cha</label>
                                <select name="" id="" class="form-control">
                                    <option value="0">Chọn danh mục cha</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
@endsection
