@extends('layouts.master')

@section('title', 'Trang chủ')

@section('style')
    <link rel="stylesheet" href="{{ asset('home/home.css') }}">
@endsection

@section('script')
    <script src="{{ asset('home/home.js') }}"></script>
@endsection

@section('content')
    <!--slider-->
    @include('home.components.slider')
    <!--/slider-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    @include('components.sidebar')
                </div>

                <div class="col-sm-9 padding-right">
                    <!--features_items-->
                    @include('home.components.feature_products')

                    <!--category-tab-->
                    @include('home.components.category_products')

                    <!--recommended_items-->
                    @include('home.components.recommend_products')
                </div>
            </div>
        </div>
    </section>
@endsection
