@if($parent_category->children()->count() > 0)
    <ul role="menu" class="sub-menu">
        @foreach($parent_category->children as $child_category)
            <li>
                <a href="{{route('category.product', ['slug' => $child_category->slug, 'id' => $child_category->id])}}">{{ $child_category->name }}
                    @if($child_category->children()->count() > 0)
                        <i class="fa fa-angle-down"></i>
                    @endif
                </a>
                @if($child_category->children()->count() > 0)
                    @include('components.dropdown-menu', ['parent_category' => $child_category])
                @endif
            </li>
        @endforeach
    </ul>
@endif
