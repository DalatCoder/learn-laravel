@extends('layouts.admin')

@section('title')
    <title>Trang quản trị</title>
@endsection

@section('content')
    <div class="content-wrapper">
    @include('partials.content-header', ['key' => 'Tạo', 'name' => 'Danh Mục'])

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
                                    {!! $htmlSelect !!}
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
