@extends('layouts.admin')


@section('title')
    <title>Trang tạo sản phẩm mới</title>
@endsection


@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endsection


@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['key' => 'Tạo', 'name' => 'Sản Phẩm'])

        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
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
                                <label for="parent_id">Chọn danh mục *</label>
                                <select name="parent_id" id="parent_id" class="form-control select2_init">
                                    <option value="">Chọn danh mục</option>
                                    {!! $htmlSelect !!}
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Nhập tags cho sản phẩm</label>
                                <select class="form-control tags_select_choose" multiple="multiple">
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="content">Mô tả sản phẩm</label>
                                <textarea name="content" id="content" rows="5" class="form-control"></textarea>
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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(".tags_select_choose").select2({
            tags: true,
            tokenSeparators: [',']
        });

        $(".select2_init").select2({
            placeholder: 'Chọn danh mục',
            allowClear: true
        });

    </script>
@endsection
