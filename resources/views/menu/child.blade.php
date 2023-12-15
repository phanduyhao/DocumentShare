<ul>
    @foreach($children as $child)
        <li>
            <a href="/{{$child->slug}}" class="">{{ $child->title }}</a>
            @if(count($child->children))
                @include('menu.child',['children' => $child->children])
            @endif
        </li>
    @endforeach
</ul>
