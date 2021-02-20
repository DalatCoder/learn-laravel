<div class="left-sidebar">
    <h2>Nhóm sản phẩm</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->

        @foreach($categories as $category)
            @if(count($category->children) == 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title"><a href="#">{{ $category->name }}</a></h4>
                    </div>
                </div>
            @else
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordian" href="#category_{{ $category->id }}">
                                <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                {{ $category->name }}
                            </a>
                        </h4>
                    </div>
                    <div id="category_{{ $category->id }}" class="panel-collapse collapse">
                        <div class="panel-body">
                            <ul>
                                @foreach($category->children as $categoryChildren)
                                <li><a href="#">{{ $categoryChildren->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach

    </div><!--/category-products-->
</div>
