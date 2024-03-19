@foreach($docs as $doc)
    <div class="col-4 mb-3">
        <div class="docs-item border border-1 mx-2 position-relative">
            <div class="position-absolute end-0 z-index-5 d-flex flex-column h-50 justify-content-around action-contain">
                <a href="" @auth data-user-id="{{ Auth::id() }}" @endauth data-id="{{$doc->id}}" class="btn-favourite btn-action">
                    <i class="fa-solid fa-heart icon-favourite {{ $favourites->contains('document_id', $doc->id) ? 'text-danger' : '' }}"></i>
                </a>
                <a data-id="{{$doc->id}}" data-author="{{$doc->user_id}}" data-score-doc="{{$doc->score}}" @auth data-score-user="{{ Auth::user()->score }}" data-user-id="{{ Auth::id() }}" @endauth href="/temp/filesOrigin/{{$doc->file}}.{{$doc->type}}" download class="download-file btn-action">
                    <i class="fa-solid fa-download"></i>
                </a>
                <a href="{{ route('documentMain.details', ['slug' => $doc->slug]) }}" data-id="{{$doc->id}}" class="btn-view btn-action">
                    <i class="fa-solid fa-eye"></i>
                </a>
            </div>
            <div class="docs-item__top h-50">
                <div id="pdfContainer-{{$doc->id}}" data-src="/temp/files/{{$doc->file }}" class="docs-item__pdf overflow-hidden w-100 h-100"></div>
                <a data-id="{{$doc->id}}" class="position-absolute start-0 top-0 bottom-0 end-0" target="_blank" href="{{ route('documentMain.details', ['slug' => $doc->slug]) }}">
                </a>
            </div>
            <div class="p-3 d-flex flex-column docs__item__bottom justify-content-between h-50 border-top">
                <h5 class="docs-title fw-bold">
                    {{$doc->title}}
                </h5>
                <div class="">
                    <div class="docs-author fw-bold d-flex align-items-center text-nowrap overflow-hidden mb-1">
                        <img src="/temp/images/icon/author.png" width="20" alt="">
                        <h6 class="mb-0 fw-bold ms-2">Tác giả: {{$doc->User->name}}</h6>
                    </div>
                    <div class="docs-other">
                        <div class="docs-cate d-flex align-items-center text-nowrap overflow-hidden mb-1">
                            <img width="20" src="/temp/images/icon/cate.png" alt="" class="">
                            <h6 class="mb-0 fw-bold ms-2">{{$doc->Category->title}}</h6>
                        </div>
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="docs-score d-flex align-items-center">
                                <img width="20" src="/temp/images/icon/coin.png" alt="">
                                <h6 class="fw-bold mb-0 ms-3">{{$doc->score}}</h6>
                            </div>
                            <div class="docs-view d-flex align-items-center">
                                <img width="20" src="/temp/images/icon/eye.png" alt="">
                                <h6 class="fw-bold mb-0 ms-3">{{$doc->views}}</h6>
                            </div>
                            <div class="docs-count__down d-flex align-items-center">
                                <img width="20" src="/temp/images/icon/download.png" alt="">
                                <h6 class="fw-bold mb-0 ms-3">{{$doc->downloads_count}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
