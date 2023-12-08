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
                <a href="#" class="ms-1">Danh sách tài tiệu</a>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col col-3">
                        <div class="lib-sidebar">
                            <h4 class="lib-header mb-0">Danh mục tài liệu</h4>
                                @include('layout.list_cates')
{{--                            <ul class="lib-sidebar-list">--}}
{{--                                <li class="lib-sidebar-item-main">--}}
{{--                                    <a href="#">Đại học - Cao đẳng</a>--}}
{{--                                </li>--}}
{{--                                --}}
{{--                                <li class="lib-sidebar-item d-flex align-items-center position-relative">--}}
{{--                                    <a href="#">Toán cao cấp</a>--}}
{{--                                    <i class="ti-angle-right position-absolute top-50 end-0 translate-middle-y pe-3"></i>--}}
{{--                                    <ul class="lib-sidebar-sublist position-absolute top-0 start-100">--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Đại số tuyến tính</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Giải tích 1</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Giải tích 2</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li class="lib-sidebar-item">--}}
{{--                                    <a href="#">Pháp luật đại cương</a>--}}
{{--                                </li>--}}
{{--                                <li class="lib-sidebar-item-main">--}}
{{--                                    <a href="#">Trung học phổ thông</a>--}}
{{--                                </li>--}}
{{--                                <li class="lib-sidebar-item d-flex align-items-center position-relative">--}}
{{--                                    <a href="#">Lớp 12</a>--}}
{{--                                    <i class="ti-angle-right position-absolute top-50 end-0 translate-middle-y pe-3"></i>--}}
{{--                                    <ul class="lib-sidebar-sublist position-absolute top-0 start-100">--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Toán</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Ngữ Văn</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Tiếng Anh</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li class="lib-sidebar-item d-flex align-items-center position-relative">--}}
{{--                                    <a href="#">Lớp 11</a>--}}
{{--                                    <i class="ti-angle-right position-absolute top-50 end-0 translate-middle-y pe-3"></i>--}}
{{--                                    <ul class="lib-sidebar-sublist position-absolute top-0 start-100">--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Toán</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Ngữ Văn</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Tiếng Anh</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li class="lib-sidebar-item d-flex align-items-center position-relative">--}}
{{--                                    <a href="#">Lớp 10</a>--}}
{{--                                    <i class="ti-angle-right position-absolute top-50 end-0 translate-middle-y pe-3"></i>--}}
{{--                                    <ul class="lib-sidebar-sublist position-absolute top-0 start-100">--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Toán</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Ngữ Văn</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Tiếng Anh</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li class="lib-sidebar-item-main">--}}
{{--                                    <a href="#">Trung học cơ sở</a>--}}
{{--                                </li>--}}
{{--                                <li class="lib-sidebar-item d-flex align-items-center position-relative">--}}
{{--                                    <a href="#">Lớp 9</a>--}}
{{--                                    <i class="ti-angle-right position-absolute top-50 end-0 translate-middle-y pe-3"></i>--}}
{{--                                    <ul class="lib-sidebar-sublist position-absolute top-0 start-100">--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Toán</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Ngữ Văn</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Tiếng Anh</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li class="lib-sidebar-item d-flex align-items-center position-relative">--}}
{{--                                    <a href="#">Lớp 8</a>--}}
{{--                                    <i class="ti-angle-right position-absolute top-50 end-0 translate-middle-y pe-3"></i>--}}
{{--                                    <ul class="lib-sidebar-sublist position-absolute top-0 start-100">--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Toán</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Ngữ Văn</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Tiếng Anh</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li class="lib-sidebar-item d-flex align-items-center position-relative">--}}
{{--                                    <a href="#">Lớp 7</a>--}}
{{--                                    <i class="ti-angle-right position-absolute top-50 end-0 translate-middle-y pe-3"></i>--}}
{{--                                    <ul class="lib-sidebar-sublist position-absolute top-0 start-100">--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Toán</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Ngữ Văn</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Tiếng Anh</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li class="lib-sidebar-item d-flex align-items-center position-relative">--}}
{{--                                    <a href="#">Lớp 6</a>--}}
{{--                                    <i class="ti-angle-right position-absolute top-50 end-0 translate-middle-y pe-3"></i>--}}
{{--                                    <ul class="lib-sidebar-sublist position-absolute top-0 start-100">--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Toán</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Ngữ Văn</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Tiếng Anh</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li class="lib-sidebar-item-main">--}}
{{--                                    <a href="#">Tiểu học</a>--}}
{{--                                </li>--}}
{{--                                <li class="lib-sidebar-item d-flex align-items-center position-relative">--}}
{{--                                    <a href="#">Lớp 5</a>--}}
{{--                                    <i class="ti-angle-right position-absolute top-50 end-0 translate-middle-y pe-3"></i>--}}
{{--                                    <ul class="lib-sidebar-sublist position-absolute top-0 start-100">--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Toán</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Tiếng Việt</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Tiếng Anh</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li class="lib-sidebar-item d-flex align-items-center position-relative">--}}
{{--                                    <a href="#">Lớp 4</a>--}}
{{--                                    <i class="ti-angle-right position-absolute top-50 end-0 translate-middle-y pe-3"></i>--}}
{{--                                    <ul class="lib-sidebar-sublist position-absolute top-0 start-100">--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Toán</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Tiếng Việt</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Tiếng Anh</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li class="lib-sidebar-item d-flex align-items-center position-relative">--}}
{{--                                    <a href="#">Lớp 3</a>--}}
{{--                                    <i class="ti-angle-right position-absolute top-50 end-0 translate-middle-y pe-3"></i>--}}
{{--                                    <ul class="lib-sidebar-sublist position-absolute top-0 start-100">--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Toán</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Tiếng Việt</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Tiếng Anh</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li class="lib-sidebar-item d-flex align-items-center position-relative">--}}
{{--                                    <a href="#">Lớp 2</a>--}}
{{--                                    <i class="ti-angle-right position-absolute top-50 end-0 translate-middle-y pe-3"></i>--}}
{{--                                    <ul class="lib-sidebar-sublist position-absolute top-0 start-100">--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Toán</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Tiếng Việt</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Tiếng Anh</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li class="lib-sidebar-item d-flex align-items-center position-relative">--}}
{{--                                    <a href="#">Lớp 1</a>--}}
{{--                                    <i class="ti-angle-right position-absolute top-50 end-0 translate-middle-y pe-3"></i>--}}
{{--                                    <ul class="lib-sidebar-sublist position-absolute top-0 start-100">--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Toán</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Tiếng Việt</a>--}}
{{--                                        </li>--}}
{{--                                        <li class="lib-sidebar-subitem">--}}
{{--                                            <i class="fa-solid fa-calculator me-2"></i>--}}
{{--                                            <a href="" class="">Tiếng Anh</a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                            </ul>--}}

                        </div>
                    </div>
                    <div class="col col-9">
                        <div class="list-document mb-5">
                            <div class="content-titel d-flex justify-content-between mx-2">
                                <h4>Danh sách tài liệu</h4>
                            </div>
                            <div class="content-product pt-4">
                                <div class="ps-3 pe-3">
                                    <div class="row gx-3 position-relative">
                                        @foreach($documents as $document)
                                            <div class="col-lg-4 col-md-3 col-sm-6 col-12 mb-3">
                                                <div class="content-product-item position-relative">
                                                    <a href="" data-id="{{$document->id}}" class="position-absolute end-0 z-3 me-2 mt-2 btn-favourite">
                                                        <i class="fa-solid fa-heart icon-favourite {{ $favourites->contains('document_id', $document->id) ? 'text-danger' : '' }}"></i>
                                                    </a>
                                                    <div class="content-product-item-titel">
                                                        <h4 class="me-3">{{$document->title}}</h4>
                                                        <div class="subject d-flex align-items-center">
                                                            <img
                                                                src="https://hocmai.vn/kho-tai-lieu/images/folder.png"
                                                                alt=""
                                                                class="me-2"
                                                            />
                                                            <span>{{$document->Category->title}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="position-relative">
                                                        <div
                                                            class="statistical d-flex align-items-center justify-content-between">
                                                            <div class="view">
                                                                <i class="ti-eye"></i>
                                                                <span>{{ $document->views_count }}</span>
                                                            </div>
                                                            <div class="download d-flex align-items-center">
                                                                <i class="fa-solid fa-download pe-1"></i>
                                                                <span>{{ $document->downloads_count }}</span>
                                                            </div>
                                                        </div>
                                                        <div class="author">
                                                            <i class="fa-solid fa-user"></i>
                                                            <span>Tác giả: {{$document->User->name}}</span>
                                                        </div>
                                                        <div class="action-click">
                                                            <div class="action-read-download">
                                                                <div class="action-read-download-btn me-2">
                                                                    <a data-id="{{$document->id}}" class="btn-show__details-file" target="_blank"
                                                                       href="{{ route('documentMain.details', ['slug' => $document->slug]) }}">Đọc online</a>
                                                                </div>
                                                                <div class="action-read-download-btn">
                                                                    <a data-id="{{$document->id}}" data-score-doc="{{$document->score}}" data-score-user="{{ Auth::user()->score }}" data-user-id="{{ Auth::id() }}" href="/temp/filesOrigin/{{$document->file}}.{{$document->type}}" download class="download-file">Tải xuống</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                            <div class="pagination mt-4 pb-4">
                                                {{ $documents->links() }}
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
