<div class="mainmenu pull-left">
    <ul class="nav navbar-nav collapse navbar-collapse">
        <li><a href="{{ route('home') }}" class="active">Home</a></li>

        @foreach($category_limits as $parent_category)
            <li class="dropdown">
                <a href="#">{{ $parent_category->name }}
                    @if($parent_category->children()->count() > 0)
                        <i class="fa fa-angle-down"></i>
                    @endif
                </a>

                @if($parent_category->children()->count() > 0)
                    @include('components.dropdown-menu', ['parent_category' => $parent_category])
                @endif
            </li>
        @endforeach

        <li><a href="404.html">404</a></li>
        <li><a href="contact-us.html">Contact</a></li>
    </ul>
</div>
