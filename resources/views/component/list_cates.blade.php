<ul class="lib-sidebar-list">
    @foreach($cates as $cate)
        @if($cate->parent_id === null) {{-- Kiểm tra xem danh mục có parent_id là null không --}}
            <li class="lib-sidebar-item d-flex align-items-center position-relative">
                <a href="{{ route('categories.index', ['categorySlug' => $cate->slug]) }}" class="w-100">
                    <i class="fa-solid fa-graduation-cap"></i>
                    {{$cate->title}}
                </a>
                <ul class="lib-sidebar-sublist position-absolute top-0 start-100">
                    @foreach($cate->children as $child)
                        <li class="lib-sidebar-subitem">
                            <a href="{{ route('categories.index', ['categorySlug' => $child->slug]) }}" class="w-100">
                                <i class="fa-solid fa-graduation-cap"></i>
                                {{$child->title}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endif
    @endforeach
</ul>
