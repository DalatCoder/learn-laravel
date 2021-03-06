@extends('layouts.admin')

@section('title')
    <title>Trang quản lý sản phẩm</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('admin_assets/product/index/index.css') }}">
@endsection

@section('js')
    <script src="{{ asset('vendor/sweetAlert2/sweetalert2@10.js') }}"></script>
    <script src="{{ asset('admin_assets/main.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Sản Phẩm', 'key' => 'Tất Cả'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('products.create') }}" class="btn btn-success float-right my-2">Thêm sản
                            phẩm</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $index=>$product)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ number_format($product->price) }}</td>
                                    <td>
                                        <img class="product-feature-image"
                                             src="{{ asset($product->feature_image_path) }}"
                                             alt="Feature image">
                                    </td>
                                    <td>{{ optional($product->category)->name }}</td>
                                    <td>
                                        <a href="{{ route('products.edit', ['id' => $product->id]) }}"
                                           class="btn btn-warning">Sửa</a>
                                        <a href="{{ route('products.delete', ['id' => $product->id]) }}"
                                           data-url="{{ route('products.delete', ['id' => $product->id]) }}"
                                           data-title="Sản phẩm"
                                           class="btn btn-danger action-delete">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
