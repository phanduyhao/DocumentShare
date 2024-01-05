@extends('layout.layout')
@section('content')
    <div class="main mt-5">
        <div class="container">
            <div class="row py-5">
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
                        <div class="ps-3 pe-3">
                            <div class="row gx-3 position-relative">
                                @foreach($docs as $doc)
                                    <div class="col-lg-4 col-md-3 col-sm-6 col-12 mb-3">
                                        <div class="content-product-item position-relative">
                                            <div class="content-product-item-titel">
                                                <h4 class="me-3">{{$doc->Document->title}}</h4>
                                                <div class="subject d-flex align-items-center">
                                                    <img
                                                        src="https://hocmai.vn/kho-tai-lieu/images/folder.png"
                                                        alt=""
                                                        class="me-2"
                                                    />
                                                    <span>{{$doc->Document->Category->title}}</span>
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
                                                            <a data-id="{{$doc->Document->id}}" class="btn-show__details-file" target="_blank"
                                                               href="{{ route('documentMain.details', ['slug' => $doc->Document->slug]) }}">Đọc online</a>
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

@endsection
