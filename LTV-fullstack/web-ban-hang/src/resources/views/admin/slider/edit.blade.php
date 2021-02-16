@extends('layouts.admin')

@section('title')
    <title>Chỉnh sửa slider</title>
@endsection

@section('style')
    <link href="{{ asset('admin_assets/slider/edit/edit.css') }}" rel="stylesheet"/>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['key' => 'Chỉnh sửa', 'name' => 'Slider'])

        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ route('sliders.update', ['id' => $slider->id]) }}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Tên slider</label>
                                <input
                                    name="name"
                                    id="name"
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Nhập tên slider"
                                    value="{{ empty(old('name')) ? $slider->name : old('name') }}"
                                >
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Mô tả</label>
                                <textarea name="description" id="description" rows="10"
                                          class="form-control @error('description') is-invalid @enderror"
                                          placeholder="Nhập mô tả">{{ empty(old('description')) ? $slider->description : old('description')}}</textarea>
                                @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image">Chọn hình ảnh</label>
                                <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                                       id="image" name="image">
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="col-md-4">
                                    <div class="row">
                                        <img class="slider-image" src="{{ asset($slider->image_path) }}" alt="Slider image">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
