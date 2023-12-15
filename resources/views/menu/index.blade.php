<ul class="d-flex align-items-center text-black fw-semibold mb-0 py-2" style="margin-left: 105px">
    @foreach($menus as $menu)
        @if($menu->level == 1)
            @if($menu->slug == 'trang-chu')
                <li class="me-4">
                    <a href="/" class="">{{$menu->title}}</a>
                </li>
            @else
                <li class="me-4">
                    <a href="/{{$menu->slug}}" class="">{{ $menu->title }}</a>
                    @if(count($menu->children))
                        @include('menu.child',['children' => $menu->children])
                    @endif
                </li>
            @endif
        @endif
    @endforeach
</ul>
