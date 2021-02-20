<div class="recommended_items">
    <h2 class="title text-center">Xu Hướng Hiện Nay</h2>

    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">

            @foreach($recommend_products as $index=>$recommend_product)

                <div class="item {{ $index == 0 ? 'active' : '' }}">

                    @foreach($recommend_product as $product)

                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{ env('backend_url') . $product->feature_image_path }}" alt=""/>
                                        <h2>{{ number_format($product->price) }}</h2>
                                        <p>{{ $product->name }}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                    </div>

                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>

            @endforeach
        </div>

        <a class="left recommended-item-control" href="#recommended-item-carousel"
           data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel"
           data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>
