<ul class="lib-sidebar-list">
    @foreach($cates as $cate)
        <li class="lib-sidebar-item d-flex align-items-center position-relative">
            <a href="{{ route('categories.index', ['categorySlug' => $cate->slug]) }}" class="w-100">{{$cate->title}}</a>
            <ul class="lib-sidebar-sublist position-absolute top-0 start-100">
                @foreach($cate->children as $child)
                    <li class="lib-sidebar-subitem">
                        <a href="{{ route('categories.index', ['categorySlug' => $child->slug]) }}" class="w-100">{{$child->title}}</a>
                    </li>
                @endforeach
            </ul>
        </li>
    @endforeach
</ul>
