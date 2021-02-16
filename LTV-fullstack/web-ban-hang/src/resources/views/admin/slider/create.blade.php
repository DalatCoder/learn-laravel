@extends('layouts.admin')

@section('title')
    <title>Tạo slider mới</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['key' => 'Tạo', 'name' => 'Slider'])

        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Tên slider</label>
                                <input
                                    name="name"
                                    id="name"
                                    type="text"
                                    class="form-control"
                                    placeholder="Nhập tên slider"
                                >
                            </div>

                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <textarea name="description" id="description" rows="10" class="form-control" placeholder="Nhập mô tả"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="image">Chọn hình ảnh</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>

                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
