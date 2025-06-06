@extends('admin.main')
@section('contents')
    <div>
        <div class="mt-4">
            <a href="{{route('documents.index')}}" class="">
                <i class='bx bx-arrow-back fw-bold fs-1' ></i>
            </a>
            <h2 class="text-center mt-3">{{$document->file}}</h2>
        </div>
        <div class="row mt-5">
            <div class="col-sm-7">
                <iframe src="/temp/files/{{$document->file }}" width="100%" height="100%"></iframe>
            </div>
            <div class="col-sm-5 ">
                <h2 class="text-black-main fw-semibold text-center border-bottom">Thông tin chi tiết:</h2>
                <div class="info-item border-bottom mb-3">
                    <h4 class="info-title text-black-main">Slug :</h4>
                    <h5 class="info-details ms-4">{{$document->slug}}</h5>
                </div>
                <div class="info-item border-bottom mb-3">
                    <h4 class="info-title text-black-main">Description :</h4>
                    <h5 class="info-details ms-4">{{$document->description}}</h5>
                </div>
                <div class="info-item border-bottom mb-3">
                    <h4 class="info-title text-black-main">Author :</h4>
                    <h5 class="info-details ms-4">{{$document->user_id}} - {{$username}}</h5>
                </div>
                <div class="info-item border-bottom mb-3">
                    <h4 class="info-title text-black-main">Category :</h4>
                    <h5 class="info-details ms-4">{{$cate_title}}</h5>
                </div>
                    <div class="info-item border-bottom mb-3">
                        @if($document->status == 2)
                            <form method="post" action="{{ route('documents.ok',['document' => $document]) }}" class="mb-3 d-flex align-items-center">
                                @method('patch')
                                @csrf
                                <div class="d-flex align-items-center">
                                    <h4 class="info-title text-black-main mb-0 me-2">Duyệt điểm tài liệu:</h4>
                                    <input type="number" name="score" class="text-center" min="0" value="0" style="width: 50px">
                                </div>
                                <button type="submit" class="btn btn-success fw-bold text-dark ms-5">Duyệt</button>
                            </form>
                        @else
                            <h4 class="info-title text-black-main">Point :</h4>
                            <h5 class="info-details ms-4">{{$document->score}}</h5>
                        @endif
                    </div>
                <div class="info-item border-bottom mb-3">
                    <h4 class="info-title text-black-main">Size :</h4>
                    <h5 class="info-details ms-4">{{$document->size}}</h5>
                </div>
                @if($document->source != null)
                    <div class="info-item border-bottom mb-3">
                        <h4 class="info-title text-black-main">Source :</h4>
                        <h5 class="info-details ms-4">{{$document->source}}</h5>
                    </div>
                @endif
                <div class="info-item border-bottom mb-3">
                    <h4 class="info-title text-black-main">Tag :</h4>
                    <h5 class="info-details ms-4">{{$tag_name}}</h5>
                </div>
                <div class="info-item border-bottom mb-3">
                    <h4 class="info-title text-black-main">Status :</h4>
                    <div class="d-flex align-items-center ">
                        @if($document->status == 1)
                            <i class='bx bx-check fs-2 fw-bold text-success'></i>
                            <h5 class="info-details ms-4 mb-0 text-success">{{$status}}</h5>
                        @elseif($document->status == 2)
                            <i class='bx bx-loader-circle fs-2 fw-bold text-warning'></i>
                            <h5 class="info-details ms-4 mb-0 text-warning">{{$status}}</h5>
                        @elseif($document->status == 3)
                            <i class='bx bxs-x-square fs-2 fw-bold text-danger'></i>
                            <h5 class="info-details ms-4 mb-0 text-danger">{{$status}}</h5>
                        @endif
                    </div>
                </div>
                <div class="info-item border-bottom mb-3">
                    <h4 class="info-title text-black-main">Đánh giá ( {{round($document->rate/10,1)}}/10 ) </h4>

                </div>
                <div class="info-item border-bottom mb-3">
                    <h4 class="info-title text-black-main">Views :</h4>
                    <h5 class="info-details ms-4">{{$document->views}}</h5>
                </div>
                <div class="info-item border-bottom mb-3">
                    <h4 class="info-title text-black-main">Downloads :</h4>
                    <h5 class="info-details ms-4">{{$totalDownloads}}</h5>
                </div>
            </div>
        </div>
    </div>
@endsection
                        
