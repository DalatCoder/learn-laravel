@extends('layouts.admin')


@section('title')
    <title>Trang tạo sản phẩm mới</title>
@endsection


@section('style')
    <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin_assets/product/create/create.css') }}" rel="stylesheet"/>
@endsection


@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['key' => 'Tạo', 'name' => 'Sản Phẩm'])

        @if($errors->any())
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Tên sản phẩm *</label>
                                <input
                                    name="name"
                                    id="name"
                                    type="text"
                                    class="form-control"
                                    placeholder="Nhập tên sản phẩm"
                                >
                            </div>

                            <div class="form-group">
                                <label for="price">Giá sản phẩm *</label>
                                <input
                                    name="price"
                                    id="price"
                                    type="text"
                                    class="form-control"
                                    placeholder="Nhập giá sản phẩm"
                                >
                            </div>


                            <div class="form-group">
                                <label for="">Chọn ảnh đại diện</label>
                                <div class="custom-file">
                                    <input
                                        type="file"
                                        class="custom-file-input"
                                        id="feature_image_path"
                                        name="feature_image_path">
                                    <label class="custom-file-label" for="feature_image_path">Chọn ảnh đại diện cho sản
                                        phẩm...</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Chọn danh sách ảnh chi tiết</label>
                                <div class="custom-file">
                                    <input
                                        type="file"
                                        class="custom-file-input"
                                        id="image_path"
                                        name="image_path[]"
                                        multiple>
                                    <label class="custom-file-label" for="image_path">Chọn danh sách ảnh chi tiết cho
                                        sản phẩm...</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="category_id">Chọn danh mục *</label>
                                <select name="category_id" id="category_id" class="form-control select2_init">
                                    <option value="">Chọn danh mục</option>
                                    {!! $htmlSelect !!}
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Nhập tags cho sản phẩm</label>
                                <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="description">Mô tả sản phẩm</label>
                                <textarea name="description" id="description" rows="10"
                                          class="form-control my-editor"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection


@section('js')
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/4.9.11/tinymce.min.js"></script>
    <script src="{{ asset('admin_assets/product/create/create.js') }}"></script>
@endsection
