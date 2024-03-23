@extends('layout.layout')
@section('content')
    <div class="main mt-5">
        <div class="container">
            <div class="content-url d-flex align-items-center mb-4">
                <img src="https://hocmai.vn/theme/new2/images/home-1-icon.png" alt="" class="me-1">
                <a href="/" class="me-1">Trang chủ</a>
                &gt;
                <a href="#" class="ms-1 me-1">Danh sách tài liệu</a>
                &gt;
                <a href="#" class="ms-1 me-1">Lớp 10</a>
                &gt;
                <a href="#" class="ms-1 me-1">Hoá học</a>
            </div>
        </div>
        <div class="container">
                <div class="row">
                    <div class="col col-3">
                        @include('component.left-cates',['tags'=>$tags, 'docs' => $doc_news, 'title' => 'liên quan'])
                    </div>
                    <div class="col col-9">
                        <div class="list-document mb-3">
                            <div class="content-titel  mx-2">
                                <h4 class="m-0 text-black fw-bold">{{$document->title}}</h4>
                                <div class="parameter-docunment d-flex justify-content-between align-items-center">
                                    <div class="parameter-docunment-item ">
                                        <div class="parameter d-flex align-items-center">
                                            <i class="ti-eye me-1"></i>
                                            <span class="me-1">Lượt xem:</span>
                                            <span>{{ $document->views }}</span>
                                        </div>
                                        <div class="parameter d-flex align-items-center">
                                            <i class="fa-solid fa-user me-1"></i>
                                            <span class="me-1">Tác giả:</span>
                                            <span>{{$document->User->name}}</span>
                                        </div>
                                    </div>
                                    <div class="parameter-docunment-item  ">
                                        <div class="parameter d-flex align-items-center">
                                            <i class="fa-solid fa-download pe-1"></i>
                                            <span class="me-1">Lượt tải:</span>
                                            <span>{{ $document->downloads_count }}</span>
                                        </div>
                                        <div class="parameter d-flex align-items-center">
                                            <i class="fa-solid fa-coins pe-1"></i>
                                            <span class="me-1">Số điểm:</span>
                                            <span class="ms-1">{{$document->score}}</span>
                                        </div>
                                    </div>
                                    <div class="parameter-docunment-item ">
                                        @if($document->type == 'pdf')
                                            <a data-id="{{$document->id}}" data-author="{{$document->user_id}}" data-score-doc=" {{$document->score}}" data-score-user="@guest @else {{ Auth::user()->score }} @endguest" data-user-id="{{ Auth::id() }}" href="/temp/files/{{$document->file}}" download class="btn btn-success text-white download-file btn-download px-3">
                                                <i class="fa-solid fa-download pe-1"></i>
                                                <span>Tải xuống</span>
                                            </a>
                                        @else
                                            <a data-id="{{$document->id}}" data-author="{{$document->user_id}}" data-score-doc="{{$document->score}}" data-score-user="@guest @else {{ Auth::user()->score }} @endguest" data-user-id="{{ Auth::id() }}" href="/temp/filesOrigin/{{$document->file}}.{{$document->type}}" download class="btn btn-success text-white download-file btn-download px-3">
                                                <i class="fa-solid fa-download pe-1"></i>
                                                <span>Tải File gốc ({{$document->type}})</span>
                                            </a>
                                            <a data-id="{{$document->id}}" data-author="{{$document->user_id}}" data-score-doc="{{$document->score}}" data-score-user="@guest @else {{ Auth::user()->score }} @endguest" data-user-id="{{ Auth::id() }}" href="/temp/files/{{$document->file}}" download class="btn btn-success text-white download-file btn-download px-3">
                                                <i class="fa-solid fa-download pe-1"></i>
                                                <span>Tải File PDF</span>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="pdfContainer" data-src="/temp/files/{{$document->file }}" class="ps-3 overflow-auto"></div>

                        {{--            ĐÁNH GIÁ            --}}
                        <h4 class="fw-bold my-4">ĐÁNH GIÁ:</h4>
                        <div class="d-flex action-rate align-items-center fs-12px justify-content-center mb-0 px-6 rating-result">
                            <div class="rating position-relative">
                                <div class="empty-stars">
                                    <span class="star">
                                        <i class="fa-regular fa-star fs-2 me-2"></i>
                                    </span>
                                    <span class="star">
                                        <i class="fa-regular fa-star fs-2 me-2"></i>
                                    </span>
                                    <span class="star">
                                        <i class="fa-regular fa-star fs-2 me-2"></i>
                                     </span>
                                    <span class="star">
                                        <i class="fa-regular fa-star fs-2 me-2"></i>
                                    </span>
                                    <span class="star">
                                        <i class="fa-regular fa-star fs-2 me-2"></i>
                                    </span>
                                </div>
                                <div class="filled-stars text-warning" style="width: 0%">
                                    <span class="star">
                                        <i class="fa-solid fa-star fs-2 me-2"></i>
                                    </span>
                                    <span class="star">
                                        <i class="fa-solid fa-star fs-2 me-2"></i>
                                    </span>
                                    <span class="star">
                                        <i class="fa-solid fa-star fs-2 me-2"></i>
                                    </span>
                                    <span class="star">
                                        <i class="fa-solid fa-star fs-2 me-2"></i>
                                    </span>
                                    <span class="star">
                                        <i class="fa-solid fa-star fs-2 me-2"></i>
                                    </span>
                                </div>
                            </div>
                            <button data-user-id="{{ Auth::id() }}" data-doc-id="{{$document->id}}" class="btn fw-bold ms-3 btn-rate btn-info ">Gửi đánh giá</button>
                        </div>
                        <div class="avg-rate mt-4">
                            <h4 class="fw-bold ">Tổng đánh giá trung bình: ( {{round($document->rate/10,1)}}/10 )</h4>
                        </div>
                        {{--    COMMENTS    --}}
                        <div id="list-comment__data" class="list-document mt-5" data-comment-limit="{{$initialCommentsCount}}" data-load-more="{{ $loadMoreCommentsCount }}" data-total-cmt="{{ $comments->count() }}">
                            <div class="content-titel d-flex justify-content-between">
                                <h4 class="fw-bold text-black mb-3">Bình luận</h4>
                                <span>
                                {{$document->comments_count}} <span>bình luận</span>
                              </span>
                            </div>

                            <div class="comment container-width mt-5" id="comment_area">
                                <!-- TEST -->
                                @guest
                                @else
                                <form id="boxCommentForm" class="comment-box" data-action="{{route('sendComment')}}">
                                    @csrf
                                    <input type="hidden" name="document" value="{{ $document->id }}">

                                    <!-- Đặt parent_comment_id -->

                                    <div class="d-flex">
                                        <div class="comment-avata d-flex align-items-center justify-content-center me-2">
                                            @if($document->User->avatar == null)
                                                <i class="fa-solid fa-user"></i>
                                            @else
                                                <img width="50" height="50" class="rounded-circle my-avatar" src="/temp/images/avatars/{{Auth::user()->avatar}}" alt="Avatar">
                                            @endif
                                        </div>
                                        <div class="form-comment w-100">
                                            <textarea name="comment" class="input-field textarea-note p-3 w-100" id="" rows="3" placeholder="Nhập bình luận *" data-require="Vui lòng nhập nội dung!"></textarea>
                                        </div>
                                    </div>
                                    <button type="submit" class="send-comment float-end btn btn-primary">Gửi bình luận</button>
                                </form>
                                @endguest

{{--    Comments Parent    --}}
                                <div class="comment-list mt-5">
                                    @foreach($comments->sortByDesc('created_at') as $comment)
                                        @if($comment->parent_comment_id == null)
                                            <div class="comment-user " data-comment-index="{{ $loop->index + 1 }}">
                                                <p class="id_user d-none" >{{ $comment->id }}</p>

                                                <div class="comments-users d-flex mb-4">
                                                    <div class="comment-avata d-flex align-items-center justify-content-center me-3">
                                                        @if($comment->User->avatar == null)
                                                            <i class="fa-solid fa-user"></i>
                                                        @else
                                                            <img width="50" height="50" class="rounded-circle" src="/temp/images/avatars/{{$comment->User->avatar}}" alt="Avatar">
                                                        @endif
                                                    </div>
                                                    <div class="comment-user-info ">
                                                        <div class="comment-user-info-item">
                                                            <a href="">{{$comment->User->name}}</a>
                                                        </div>
                                                        <div class="comment-user-info-item">
                                                            <i class="fa-solid fa-calendar-days "></i>
                                                            <span >{{$comment->created_at}}</span>
                                                        </div>
                                                        <div class="comment-user-info-item">
                                                            <p class="comment-user-desc m-0 mt-3">
                                                                {{$comment->comment}}
                                                            </p>
                                                        </div>

{{-- Reply comments --}}
                                                        <div class="reply">
                                                            <p class="reply-text  mt-2">
                                                                <a class="reply-text__link fw-bold text-info" href="">
                                                                    Trả lời
                                                                    <span class="id_user d-none" >{{ $comment->id }}</span>
                                                                </a>
                                                            </p>
                                                            <!-- TEST -->
                                                            @guest
                                                            @else
                                                                <form id="boxCommentFormReply_{{ $comment->id }}" class="comment-box child d-none bg-white p-3" data-action="{{route('sendComment')}}" >
                                                                    <p id="{{ $comment->id }}" class="boxCommentFormReplyID d-none"></p>
                                                                    @csrf
                                                                    <input type="hidden" name="document" value="{{ $document->id }}"> <!-- Đặt parent_comment_id -->
                                                                    <input type="hidden" name="parent_comment_id" value="{{ $comment->id }}"> <!-- Đặt parent_comment_id -->
                                                                    <div class="d-flex">
                                                                        <div class="comment-avata d-flex align-items-center justify-content-center me-2">
                                                                            @if($document->User->avatar == null)
                                                                                <i class="fa-solid fa-user"></i>
                                                                            @else
                                                                                <img width="50" height="50" class="rounded-circle" src="/temp/images/avatars/{{Auth::user()->avatar}}" alt="Avatar">
                                                                            @endif
                                                                        </div>
                                                                        <div class="form-comment w-100">
                                                                            <textarea name="comment" class="input-field textarea-note w-100 p-3" id="" rows="3" placeholder="Nhập bình luận *" data-require="Vui lòng nhập nội dung!"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <button type="submit" class="send-comment float-end btn btn-primary">Gửi bình luận</button>
                                                                </form>
                                                            @endguest
                                                            @if($comment->hasChildren())
                                                            <div class="reply-box bg-white p-3">
                                                                @php
                                                                    $comment_childs = $comments;
                                                                @endphp
                                                                <div class="comment-list__child-{{ $comment->id }}">
                                                                    @foreach($comment_childs->sortByDesc('created_at') as $comment_child)
                                                                        @if($comment_child->parent_comment_id == $comment->id)
                                                                            <div class="d-flex mb-4">
                                                                                <div class="comment-avata d-flex align-items-center justify-content-center me-3">
                                                                                    @if($comment_child->User->avatar == null)
                                                                                        <i class="fa-solid fa-user"></i>
                                                                                    @else
                                                                                        <img width="50" height="50" class="rounded-circle" src="/temp/images/avatars/{{$comment_child->User->avatar}}" alt="Avatar">
                                                                                    @endif
                                                                                </div>
                                                                                <div class="comment-user-info ">
                                                                                    <div class="comment-user-info-item">
                                                                                        <div class="comment-list" id="commentList">
                                                                                            <a href="">{{$comment_child->User->name}}</a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="comment-user-info-item">
                                                                                        <i class="fa-solid fa-calendar-days "></i>
                                                                                        <span >{{$comment_child->created_at}}</span>
                                                                                    </div>
                                                                                    <div class="comment-user-info-item">
                                                                                        <p class="comment-user-desc m-0 mt-3">
                                                                                            {{$comment_child->comment}}
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                                @if($initialCommentsCount < $comments->count())
                                    <button id="loadMoreComments" class="btn btn-link">Hiển thị thêm bình luận</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

@endsection
