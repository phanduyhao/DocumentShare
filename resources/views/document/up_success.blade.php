@extends('layout.layout')
@section('content')
<div class="pt-4 mt-5">
    <div class="site-cart__wrapper py-5 mt-5 mx-auto border rounded" style="max-width:700px">
        <div class="d-flex flex-column align-items-center justify-content-center">
            <img src="/temp/images/check_success.png" width="100px" alt="">
            <h1 class="fw-bold">Tải lên thành công,</h1>
            <h1 class="fw-bold"> vui lòng chờ duyệt!</h1>
        </div>
        <div class="d-flex justify-content-center mt-4">
            <div class="">
                <div class="d-flex mb-3 align-items-center border-bottom">
                    <h3 class="fw-bold me-2"> <i> Tiêu đề tài liệu: </i></h3>
                    <h4> {{ $document->title }}</h4>
                </div>
                <div class="d-flex mb-3 align-items-center border-bottom">
                    <h3 class="fw-bold me-2"> <i> Loại: </i></h3>
                    <h4> {{ $document->type }}</h4>
                </div>
                <div class="d-flex mb-3 align-items-center border-bottom">
                    <h3 class="fw-bold me-2"> <i> Mô tả: </i></h3>
                    <h4> {{ $document->description }}</h4>
                </div>
                <div class="d-flex mb-3 align-items-center border-bottom">
                    <h3 class="fw-bold me-2"> <i> Danh mục: </i></h3>
                    <h4> {{ $document->Category->title }}</h4>
                </div>
                <div class="d-flex mb-3 align-items-center border-bottom">
                    <h3 class="fw-bold me-2"> <i> Kích thước: </i></h3>
                    <h4>{{ $document->size }}</h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
