@extends('layout.layout')
@section('content')
    <div class="main mt-5">
        <div class="container">
            <div class="row pt-5">
                <div class="col col-3">
                    <div class="pr-sub d-flex justify-content-center align-items-center py-2 px-3">
                        <div class="avata-user">
                            <img src="/temp/images/avatars/{{Auth::user()->avatar}}" alt="">
                        </div>
                        <div class="pr-info-sub ms-2">
                            <div class="pr-sub-name">{{Auth::user()->name}}</div>
                            <div class="pr-sub-point d-flex align-items-center">
                                <span>Điểm tích luỹ:</span>
                                <div class="point ms-1">{{Auth::user()->score}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="pr-sub mt-3 ">
                        <div class="pr-sub-nav">
                            <a href="{{route('profile')}}" class="pr-sub-nav-item">Thông tin cá nhân</a>
                        </div>
                        <div class="pr-sub-nav">
                            <a href="#" class="pr-sub-nav-item">Cập nhật thông tin</a>
                        </div>
                        <div class="pr-sub-nav">
                            <a href="#" class="pr-sub-nav-item">Thay đổi mật khẩu</a>
                        </div>
                        <div class="pr-sub-nav">
                            <a href="{{route('favourite')}}" class="pr-sub-nav-item">Tài liệu yêu thích</a>
                        </div>
                        <form action="{{route('logout')}}" method="post" class="logout pr-sub-nav">
                            @csrf
                            <input type="hidden" name="_token" value="aGABVq1t8wgyC2s3Qxf15F5VglX99UZpv7u9Juh8" autocomplete="off">
                            <button type="submit" class="dropdown-item pr-sub-nav-item">
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">Đăng xuất</span>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col col-9">
                    <div class="info-pr-titel">
                        <div class="info-pr-titel-name">
                            Tài liệu yêu thích
                        </div>
                    </div>
                    <div class="content-product pt-4">
                        <div class="row gx-3 ps-3 pe-3 position-relative">
                            @foreach($docs as $doc)
                                <div class="col-lg-4 col-md-3 col-sm-6 col-12 mb-3">
                                    <div class="docs-item border border-1 mx-2 position-relative">
                                        <div class="position-absolute end-0 z-index-5 d-flex flex-column h-50 justify-content-around action-contain">
                                            <a data-id="{{$doc->Document->id}}" data-author="{{$doc->Document->user_id}}" data-score-doc="{{$doc->Document->score}}" @auth data-score-user="{{ Auth::user()->score }}" data-user-id="{{ Auth::id() }}" @endauth href="/temp/filesOrigin/{{$doc->Document->file}}.{{$doc->Document->type}}" download class="download-file btn-action">
                                                <i class="fa-solid fa-download"></i>
                                            </a>
                                            <a href="{{ route('documentMain.details', ['slug' => $doc->Document->slug]) }}" data-id="{{$doc->Document->id}}" class="btn-view btn-action">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>
                                        </div>
                                        <div class="docs-item__top h-50">
                                            <div id="pdfContainer-{{$doc->Document->id}}" data-src="/temp/files/{{$doc->Document->file }}" class="docs-item__pdf overflow-hidden w-100 h-100"></div>
                                            <a data-id="{{$doc->Document->id}}" class="position-absolute start-0 top-0 bottom-0 end-0" target="_blank" href="{{ route('documentMain.details', ['slug' => $doc->Document->slug]) }}">
                                            </a>
                                        </div>
                                        <div class="p-3 d-flex flex-column docs__item__bottom justify-content-between h-50 border-top">
                                            <h5 class="docs-title fw-bold">
                                                {{$doc->Document->title}}
                                            </h5>
                                            <div class="">
                                                <div class="docs-author fw-bold d-flex align-items-center text-nowrap overflow-hidden mb-1">
                                                    <img src="/temp/images/icon/author.png" width="20" alt="">
                                                    <h6 class="mb-0 fw-bold ms-2">Tác giả: {{$doc->Document->User->name}}</h6>
                                                </div>
                                                <div class="docs-other">
                                                    <div class="docs-cate d-flex align-items-center text-nowrap overflow-hidden mb-1">
                                                        <img width="20" src="/temp/images/icon/cate.png" alt="" class="">
                                                        <h6 class="mb-0 fw-bold ms-2">{{$doc->Document->Category->title}}</h6>
                                                    </div>
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <div class="docs-score d-flex align-items-center">
                                                            <img width="20" src="/temp/images/icon/coin.png" alt="">
                                                            <h6 class="fw-bold mb-0 ms-3">{{$doc->Document->score}}</h6>
                                                        </div>
                                                        <div class="docs-view d-flex align-items-center">
                                                            <img width="20" src="/temp/images/icon/eye.png" alt="">
                                                            <h6 class="fw-bold mb-0 ms-3">{{$doc->Document->views}}</h6>
                                                        </div>
                                                        <div class="docs-count__down d-flex align-items-center">
                                                            <img width="20" src="/temp/images/icon/download.png" alt="">
                                                            <h6 class="fw-bold mb-0 ms-3">{{$doc->Document->downloads_count}}</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div class="pagination mt-4 pb-4">
                                {{ $docs->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
