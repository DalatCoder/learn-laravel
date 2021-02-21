@extends('layouts.master')

@section('title', 'Trang sản phẩm theo nhóm')

@section('style')
    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
@endsection

@section('script')
    <script src="{{ asset('home/home.js') }}"></script>
@endsection

@section('content')
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('components.sidebar')
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items">
                        <h2 class="title text-center">Danh sách sản phẩm</h2>

                        @foreach($products as $product)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ env('backend_url') . $product->feature_image_path }}" alt="" />
                                        <h2>{{ number_format($product->price)}} ₫</h2>
                                        <p>{{ $product->name }}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                    </div>
                                    <div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2>{{ number_format($product->price)}} ₫</h2>
                                            <p>{{ $product->name }}</p>
                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        {{ $products->links() }}
                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </section>
@endsection
