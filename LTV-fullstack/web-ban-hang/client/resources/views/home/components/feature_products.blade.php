<div class="features_items">
    <h2 class="title text-center">Sản Phẩm Nổi Bật</h2>

    @foreach($feature_products as $feature_product)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <img src="{{ env('backend_url') . $feature_product->feature_image_path }}" alt=""/>
                        <h2>{{ number_format($feature_product->price) }} ₫</h2>
                        <p>{{ $feature_product->name }}</p>
                        <a href="#" class="btn btn-default add-to-cart"><i
                                class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2>{{ number_format($feature_product->price) }} ₫</h2>
                            <p>{{ $feature_product->name }}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i
                                    class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>
