@extends('admin_layout')

@section('title', 'Tạo thương hiệu sản phẩm')

@section('notification')
    @include('admin.components.notification_box')
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Tạo thương hiệu sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" method="POST" action="{{ route('brands.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="brand_name">Tên thương hiệu</label>
                                <input type="text" class="form-control @error('brand_name') is-invalid @enderror"
                                       id="brand_name" name="brand_name"
                                       placeholder="Nhập tên thương hiệu"
                                       value="{{ old('brand_name') }}"
                                >
                                @error('brand_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="brand_desc">Mô tả</label>
                                <textarea style="resize: none"
                                          class="form-control @error('brand_desc') is-invalid @enderror"
                                          id="brand_desc"
                                          name="brand_desc" rows="7"
                                          placeholder="Nhập mô tả thương hiệu">{{ old('brand_desc') }}</textarea>
                                @error('brand_desc')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="brand_status">Trạng thái</label>
                                <select name="brand_status" id="brand_status"
                                        class="form-control @error('brand_status') is-invalid @enderror">
                                    <option value="">Chọn chế độ</option>
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                                @error('brand_status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" name="add_brand" class="btn btn-info">Thêm mới</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection

