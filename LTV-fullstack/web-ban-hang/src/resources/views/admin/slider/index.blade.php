@extends('layouts.admin')

@section('title')
    <title>Trang danh sách Slider</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('admin_assets/slider/index/index.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Sliders', 'key' => 'Tất Cả'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('sliders.create') }}" class="btn btn-success float-right my-2">Thêm slider</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên slider</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($sliders as $index=>$slider)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $slider->name }}</td>
                                    <td>{{ $slider->description }}</td>
                                    <td>
                                        <img class="slider-image" src="{{ asset($slider->image_path) }}"
                                             alt="Slider image">
                                    </td>
                                    <td>
                                        <a href="{{ route('sliders.edit', [$slider->id]) }}"
                                           class="btn btn-warning">Sửa</a>
                                        <a href="{{ route('menus.delete', [$slider->id]) }}"
                                           class="btn btn-danger">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        {{ $sliders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
