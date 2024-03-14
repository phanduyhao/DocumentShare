<div class="lib-sidebar">
    <h4 class="lib-header mb-0">Danh mục tài liệu</h4>
    @include('component.list_cates')
</div>
<div class="lib-sidebar mt-4">
    <h4 class="lib-header mb-0">Từ khoá liên quan</h4>
    <div class="keywords-lists d-flex flex-fill flex-wrap p-2">
        @foreach($tags as $tag)
            <div class="keywords-item m-1">
                <a href="">{{$tag->tag_name}}</a>
            </div>
        @endforeach
    </div>
</div>
<div class="lib-sidebar mt-4">
    <h4 class="lib-header mb-0">Tài liệu {{$title}}</h4>
    <div class="related-document">
        @foreach($docs as $doc)
            <div class="related-document-item d-flex align-items-center py-2 px-3">
                @if($doc->type == 'pdf')
                    <i class="fa-regular fa-file-pdf fs-3 me-2"></i>
                @elseif($doc->type == 'docx')
                    <i class="fa-regular fa-file-word fs-3 me-2"></i>
                @elseif($doc->type == 'pptx')
                    <i class="fa-regular fa-file-powerpoint"></i>
                @elseif($doc->type == 'xlsx')
                    <i class="fa-regular fa-file-excel"></i>
                @endif
                <a class="btn-show__details-file lh-1" target="_blank"
                   href="{{ route('documentMain.details', ['slug' => $doc->slug]) }}">{{$doc->title}}</a>
            </div>
        @endforeach
    </div>
</div>
