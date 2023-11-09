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
                    <h4 class="info-title text-black-main">Point :</h4>
                    <h5 class="info-details ms-4">{{$document->score}}</h5>
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
                    <h4 class="info-title text-black-main">Đánh giá ( {{intval($document->rate/10)}}/10 ) :</h4>
                    <div class="d-flex align-items-center fs-12px justify-content-center mb-0 px-6 rating-result">
                        <div class="rating position-relative">
                            <div class="empty-stars">
                                <span class="star">
                                    <i class='bx bx-star fs-3 p-3' ></i>
                                </span>
                                <span class="star">
                                    <i class='bx bx-star fs-3 p-3' ></i>
                                </span>
                                <span class="star">
                                     <i class='bx bx-star fs-3 p-3' ></i>
                                 </span>
                                <span class="star">
                                    <i class='bx bx-star fs-3 p-3' ></i>
                                </span>
                                <span class="star">
                                    <i class='bx bx-star fs-3 p-3' ></i>
                                </span>
                            </div>
                            <div class="filled-stars" style="width: {{intval($document->rate)}}%">
                                <span class="star">
                                    <i class='bx bxs-star text-warning fs-3 p-3'></i>
                                </span>
                                <span class="star">
                                    <i class='bx bxs-star text-warning fs-3 p-3'></i>
                                </span>
                                <span class="star">
                                    <i class='bx bxs-star text-warning fs-3 p-3'></i>
                                </span>
                                <span class="star">
                                    <i class='bx bxs-star text-warning fs-3 p-3'></i>
                                </span>
                                <span class="star">
                                    <i class='bx bxs-star text-warning fs-3 p-3'></i>
                                </span>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="info-item border-bottom mb-3">
                    <h4 class="info-title text-black-main">Created Time :</h4>
                    <h5 class="info-details ms-4">{{$document->created_at}}</h5>
                </div>
                <div class="info-item border-bottom mb-3">
                    <h4 class="info-title text-black-main">Updated Time :</h4>
                    <h5 class="info-details ms-4">{{$document->updated_at}}</h5>
                </div>
            </div>
        </div>
    </div>



{{--  ĐÁNH GIÁ  --}}
    <h1>ĐÁNH GIÁ</h1>
    <div class="d-flex action-rate align-items-center fs-12px justify-content-center mb-0 px-6 rating-result">
        <div class="rating position-relative">
            <div class="empty-stars">
                <span class="star">
                    <i class='bx bx-star fs-3 p-3' ></i>
                </span>
                <span class="star">
                    <i class='bx bx-star fs-3 p-3' ></i>
                </span>
                <span class="star">
                     <i class='bx bx-star fs-3 p-3' ></i>
                 </span>
                <span class="star">
                    <i class='bx bx-star fs-3 p-3' ></i>
                </span>
                <span class="star">
                    <i class='bx bx-star fs-3 p-3' ></i>
                </span>
            </div>
            <div class="filled-stars" style="width: 0%">
                <span class="star">
                    <i class='bx bxs-star text-warning fs-3 p-3'></i>
                </span>
                <span class="star">
                    <i class='bx bxs-star text-warning fs-3 p-3'></i>
                </span>
                <span class="star">
                    <i class='bx bxs-star text-warning fs-3 p-3'></i>
                </span>
                <span class="star">
                    <i class='bx bxs-star text-warning fs-3 p-3'></i>
                </span>
                <span class="star">
                    <i class='bx bxs-star text-warning fs-3 p-3'></i>
                </span>
            </div>
        </div>
        <button data-user-id="{{ Auth::id() }}" data-doc-id="{{$document->id}}" class="btn-rate">Gửi đánh giá</button>
    </div>
{{--  COMMENT  --}}

    <div class="comment container-width" id="comment_area">
        <!-- TEST -->
        <form id="boxCommentForm" class="comment-box" data-action="{{route('sendComment')}}">
            @csrf
            <input type="hidden" name="document" value="{{ $document->id }}"> <!-- Đặt parent_comment_id -->
            <div class="form-comment w-100">
                <textarea name="comment" class="input-field textarea-note w-100" id="" rows="5" placeholder="Nhập bình luận *" data-require="Vui lòng nhập nội dung!"></textarea>
            </div>
            <button type="submit" class="send-comment">Gửi bình luận</button>
        </form>
        <!-- TEST -->


        <div class="comment-list">
            @foreach($comments->sortByDesc('created_at') as $comment)
                @if($comment->parent_comment_id == null)
                    <div class="comment-user ">
                        <p class="id_user d-none" >{{ $comment->id }}</p>
                        <div class="d-flex" style="align-items: flex-start;">
                            <p class="type">{{ $comment->comment }}</p>
                        </div>
                        <div class="reply">
                            <p class="reply-text">
                                <a class="reply-text__link" href="">
                                    Trả lời
                                    <span class="id_user d-none" >{{ $comment->id }}</span>
                                </a>
                            </p>
                            <!-- TEST -->
                            <form  id="boxCommentFormReply_{{ $comment->id }}" class="comment-box child d-none" data-action="{{route('sendComment')}}" style="background: #FFFFFFB2">
                                <p id="{{ $comment->id }}" class="boxCommentFormReplyID d-none"></p>
                                @csrf
                                <input type="hidden" name="document" value="{{ $document->id }}"> <!-- Đặt parent_comment_id -->
                                <input type="hidden" name="parent_comment_id" value="{{ $comment->id }}"> <!-- Đặt parent_comment_id -->
                                <div class="form-comment w-100">
                                    <textarea name="comment" class="input-field textarea-note w-100" id="" rows="5" placeholder="Nhập bình luận *" data-require="Vui lòng nhập nội dung!"></textarea>
                                </div>
                                <button type="submit" class="send-comment">Gửi bình luận</button>
                            </form>
                            <!-- TEST -->
                        @if($comment->hasChildren()) <!-- Kiểm tra nếu có comment con -->
                            <div class="reply-box">
                                @php
                                    $comment_childs = $comments;
                                @endphp
                                <div class="comment-list__child-{{ $comment->id }}">
                                    @foreach($comment_childs->sortByDesc('created_at') as $comment_child)
                                        @if($comment_child->parent_comment_id == $comment->id)
                                            <div style="margin-bottom: 30px">
                                                <p class="reply-content">
                                                    {{ $comment_child->comment }}
                                                </p>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

@endsection
                        
