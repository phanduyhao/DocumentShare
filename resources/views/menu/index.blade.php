<ul>
    @foreach($menus as $menu)
        @if($menu->level == 1)
            <li>
                {{ $menu->title }}
                @if(count($menu->children))
                    @include('menu.child',['children' => $menu->children])
                @endif
            </li>
        @endif
    @endforeach
</ul>
