<ul>
    @foreach($children as $child)
        <li>
            {{ $child->title }}
            @if(count($child->children))
                @include('menu.child',['children' => $child->children])
            @endif
        </li>
    @endforeach
</ul>
