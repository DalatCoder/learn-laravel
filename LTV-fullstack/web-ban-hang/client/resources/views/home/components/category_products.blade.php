<div class="category-tab"><!--category-tab-->
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            @foreach($categories as $index=>$parentCategory)
                <li class="{{ $index == 0 ? 'active' : '' }}">
                    <a href="#category_tab_{{ $parentCategory->id }}" data-toggle="tab">
                        {{ $parentCategory->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="tab-content">
        @foreach($category_tab_products as $index=>$category_tab_product)
            <div
                class="tab-pane fade {{ $index == 0 ? 'active in' : '' }}"
                id="category_tab_{{ $categories[$index]->id }}">
                @foreach($category_tab_product as $product)
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{ env('backend_url') . $product->feature_image_path }}" alt=""/>
                                    <h2>{{ number_format($product->price) }} ₫</h2>
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
</div>
