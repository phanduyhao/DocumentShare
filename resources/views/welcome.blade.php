@extends('layout.layout')
@section('content')
<div class="content">
    <div class="main position-relative">
        <div class="main-bg main-slide-for ">
            @foreach($slides as $slide)
                <div style="background: url('/temp/images/slide/{{$slide->image}}');"></div>
            @endforeach
        </div>
        <div class="main-slide-nav slick-slider slide container position-absolute top-0 bottom-0 start-0 end-0 d-flex align-items-center mb-0">
            @foreach($slides as $slide)
                <a href="{{$slide->link}}" class="d-flex justify-content-center">
                    <img class="w-100 rounded-3" src="/temp/images/slide/{{$slide->image}}" alt="">
                </a>
            @endforeach
        </div>

        <div class="container">
            <div class="main-slogan_bg  rounded-2 text-center d-flex align-items-center justify-content-center" style="background: url('/temp/images/icon/slogan-bg.png')">
                <h1 class="fw-bold">
                    <i>
                        <i class="fa-solid fa-quote-left"></i>
                        <b>Tri thức ở đâu chúng tôi vươn cao tới đó!</b>
                        <i class="fa-solid fa-quote-right"></i>
                    </i>
                </h1>
            </div>
        </div>

        <div class="main-docs container">
            {{--    Tài liệu Hot    --}}
            <div class="mt-3 main-docs__slide">
                <h1 class="main-docs__title border-start border-5 border-info ps-3 fw-bold">
                    Tài liệu Hot
                </h1>
                <div class="main-docs__hot row mt-4">
                    <div class="col-5">
                        <img src="/temp/images/slide/{{$slide1->image}}" height="325" alt="" class="main-docs__img w-100">
                    </div>

                    {{--                Tài liệu hot top         --}}
                    @include('component.list_docs',['docs'=>$doc_hots])

                    {{--                Tài liệu hot bottom         --}}
                    <div class="col-12 docs-slide__home-bottom mt-3">
                        @foreach($doc_hot2s as $doc_hot)
                            <div class="hot-docs__item border border-1 me-2">
                                <img width="25" class="position-absolute mt-2 ms-2" src="/temp/images/icon/hot.png" alt="">
                                <div class="hot-docs__item__top">
                                    <iframe src="/temp/files/{{$doc_hot->file }}" class="w-100"></iframe>
                                    <a data-id="{{$doc_hot->id}}" class="position-absolute start-0 top-0 bottom-0 end-0" target="_blank" href="{{ route('documentMain.details', ['slug' => $doc_hot->slug]) }}">
                                    </a>
                                </div>
                                <div class="p-3 d-flex flex-column hot-docs__item__bottom justify-content-between">
                                    <h5 class="hot-docs__title fw-bold">
                                        {{$doc_hot->title}}
                                    </h5>
                                    <div class="hot-docs__author fw-bold d-flex align-items-center text-nowrap overflow-hidden ">
                                        <img src="/temp/images/icon/author.png" width="20" alt="">
                                        <h6 class="mb-0 fw-bold ms-2">Tác giả: {{$doc_hot->User->name}}</h6>
                                    </div>
                                    <div class="hot-docs__other">
                                        <div class="hot-docs__cate d-flex align-items-center text-nowrap overflow-hidden ">
                                            <img width="20" src="/temp/images/icon/cate.png" alt="" class="">
                                            <h6 class="mb-0 fw-bold ms-2">{{$doc_hot->Category->title}}</h6>
                                        </div>
                                        <div class="hot-docs__score d-flex align-items-center">
                                            <img width="20" src="/temp/images/icon/score.png" alt="">
                                            <h6 class="fw-bold mb-0 ms-2">Số điểm: {{$doc_hot->score}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{--            Tài liệu mới            --}}
            <div class="main-docs__slide">
                <h1 class="main-docs__title border-start border-5 border-info ps-3 fw-bold mt-10">
                    Tài liệu mới nhất
                </h1>
                <div class="main-docs__new row mt-4">
                    <div class="col-5">
                        <a href="{{$slide2->link}}" class="">
                            <img src="/temp/images/slide/{{$slide2->image}}" height="325" alt="" class="main-docs__img w-100">
                        </a>
                    </div>

                    @include('component.list_docs',['docs'=>$doc_news])

                    <div class="col-12 docs-slide__home-bottom mt-3">
                        @foreach($doc_new2s as $doc_new)
                            <div class="hot-docs__item border border-1 me-2">
                                <img width="25" class="position-absolute mt-2 ms-2" src="/temp/images/icon/new.png" alt="">
                                <div class="hot-docs__item__top">
                                    <iframe src="/temp/files/{{$doc_new->file }}" class="w-100"></iframe>
                                    <a data-id="{{$doc_new->id}}" class="position-absolute start-0 top-0 bottom-0 end-0" target="_blank" href="{{ route('documentMain.details', ['slug' => $doc_new->slug]) }}">
                                    </a>
                                </div>
                                <div class="p-3 d-flex flex-column hot-docs__item__bottom justify-content-between">
                                    <h5 class="hot-docs__title fw-bold">
                                        {{$doc_new->title}}
                                    </h5>
                                    <div class="hot-docs__author fw-bold d-flex align-items-center text-nowrap overflow-hidden ">
                                        <img src="/temp/images/icon/author.png" width="20" alt="">
                                        <h6 class="mb-0 fw-bold ms-2">Tác giả: {{$doc_new->User->name}}</h6>
                                    </div>
                                    <div class="hot-docs__other">
                                        <div class="hot-docs__cate d-flex align-items-center text-nowrap overflow-hidden ">
                                            <img width="20" src="/temp/images/icon/cate.png" alt="" class="">
                                            <h6 class="mb-0 fw-bold ms-2">{{$doc_new->Category->title}}</h6>
                                        </div>
                                        <div class="hot-docs__score d-flex align-items-center">
                                            <img width="20" src="/temp/images/icon/score.png" alt="">
                                            <h6 class="fw-bold mb-0 ms-2">Số điểm: {{$doc_new->score}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
