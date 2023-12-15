@extends('layout.layout')
@section('content')
    <div class="main mt-5">
        <div class="container">
            <div class="content-url d-flex align-items-center mb-4">
                <img
                    src="https://hocmai.vn/theme/new2/images/home-1-icon.png"
                    alt=""
                    class="me-1"
                />
                <a href="#" class="me-1">Trang chủ</a>
                >
                <a href="#" class="ms-1">Tất cả tài liệu</a>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col col-3">
                        <div class="lib-sidebar">
                            <h4 class="lib-header mb-0">Tất cả tài liệu</h4>
                            @include('layout.list_cates')
                        </div>
                    </div>
                    <div class="col col-9">
                        <div class="list-document mb-5">
                            <div class="content-titel d-flex justify-content-between mx-2">
                                <h4>Tất cả tài liệu</h4>
                            </div>
                            <div class="content-product pt-4">
                                <div class="ps-3 pe-3">
                                    <div class="row gx-3 position-relative">
                                        @foreach($docs as $doc)
                                            <div class="col-lg-4 col-md-3 col-sm-6 col-12 mb-3">
                                                <div class="content-product-item position-relative">
                                                    <a href="" data-id="{{$doc->id}}" class="position-absolute end-0 z-3 me-2 mt-2 btn-favourite">
                                                        <i class="fa-solid fa-heart icon-favourite {{ $favourites->contains('document_id', $doc->id) ? 'text-danger' : '' }}"></i>
                                                    </a>
                                                    <div class="content-product-item-titel">
                                                        <h4 class="me-3">{{$doc->title}}</h4>
                                                        <div class="subject d-flex align-items-center">
                                                            <img
                                                                src="https://hocmai.vn/kho-tai-lieu/images/folder.png"
                                                                alt=""
                                                                class="me-2"
                                                            />
                                                            <span>{{$doc->Category->title}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="position-relative">
                                                        <div
                                                            class="statistical d-flex align-items-center justify-content-between">
                                                            <div class="view">
                                                                <i class="ti-eye"></i>
                                                                <span>{{ $doc->views_count }}</span>
                                                            </div>
                                                            <div class="download d-flex align-items-center">
                                                                <i class="fa-solid fa-download pe-1"></i>
                                                                <span>{{ $doc->downloads_count }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="author">
                                                            <i class="fa-solid fa-user"></i>
                                                            <span>Tác giả: {{$doc->User->name}}</span>
                                                        </div>
                                                        <div class="action-click">
                                                            <div class="action-read-download">
                                                                <div class="action-read-download-btn me-2">
                                                                    <a data-id="{{$doc->id}}" class="btn-show__details-file" target="_blank"
                                                                       href="{{ route('documentMain.details', ['slug' => $doc->slug]) }}">Đọc online</a>
                                                                </div>
                                                                <div class="action-read-download-btn">
                                                                    <a data-id="{{$doc->id}}" data-score-doc="{{$doc->score}}" @auth data-score-user="{{ Auth::user()->score }}" data-user-id="{{ Auth::id() }}" @endauth href="/temp/filesOrigin/{{$doc->file}}.{{$doc->type}}" download class="download-file">Tải xuống</a>
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
            </div>
        </div>
        <div class="h-100"></div>
    </div>
@endsection
