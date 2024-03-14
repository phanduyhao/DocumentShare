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
                <a href="/" class="me-1">Trang chủ</a>
                >
                <a href="#" class="ms-1">Kết quả tìm kiếm với từ khóa " {{$keyword}} ":</a>
            </div>
        </div>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col col-3">
                        <div class="lib-sidebar">
                            <h4 class="lib-header mb-0">Tất cả tài liệu</h4>
                            @include('component.list_cates')
                        </div>
                    </div>
                    <div class="col col-9">
                        @if($searchResults->isEmpty())
                            <h1 class="fw-bold">Không có dữ liệu được tìm thấy!</h1>
                        @else
                            <div class="list-document mb-5">
                            <div class="content-titel d-flex justify-content-between mx-2">
                                <h4 class="fw-bold">Kết quả tìm kiếm với từ khóa " {{$keyword}} ":</h4>
                            </div>
                            <div class="content-product pt-4">
                                <div class="ps-3 pe-3">
                                    <div class="row gx-3 position-relative">
                                        @include('component.list_docs2',['docs'=>$searchResults])
                                        @include('component.paginate',['docs'=>$searchResults])
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="h-100"></div>
    </div>
@endsection
