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
                {{-- <a href="{{$slide->link}}" class="d-flex justify-content-center"> --}}
                    <img class="rounded-3" src="/temp/images/slide/{{$slide->image}}" alt="">
                {{-- </a> --}}
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
                    <div class="col-7 hot-docs__slide docs-slide__home-top">
                        @include('component.list_docs',['docs'=>$doc_hots, 'image'=>'hot.png'])
                    </div>
                    {{--                Tài liệu hot bottom         --}}
                    <div class="col-12 docs-slide__home-bottom mt-3">
                        @include('component.list_docs',['docs'=>$doc_hot2s, 'image'=>'hot.png'])

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
                    <div class="col-7 new-docs__slide docs-slide__home-top">
                        @include('component.list_docs',['docs'=>$doc_news, 'image'=>'new.png'])
                    </div>
                    <div class="col-12 docs-slide__home-bottom mt-3">
                        @include('component.list_docs',['docs'=>$doc_new2s, 'image'=>'new.png'])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
