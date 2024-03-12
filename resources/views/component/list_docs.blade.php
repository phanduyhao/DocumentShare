<div class="col-7 new-docs__slide docs-slide__home-top">
    @foreach($docs as $doc)
        <div class="hot-docs__item border border-1 mx-2">
            <img width="25" class="position-absolute mt-2 ms-2" src="/temp/images/icon/new.png" alt="">
            <div class="hot-docs__item__top">
                <iframe src="/temp/files/{{$doc->file }}" class="w-100"></iframe>
                <a data-id="{{$doc->id}}" class="position-absolute start-0 top-0 bottom-0 end-0" target="_blank" href="{{ route('documentMain.details', ['slug' => $doc->slug]) }}">
                </a>
            </div>
            <div class="p-3 d-flex flex-column hot-docs__item__bottom justify-content-between">
                <h5 class="hot-docs__title fw-bold">
                    {{$doc->title}}
                </h5>
                <div class="hot-docs__author fw-bold d-flex align-items-center text-nowrap overflow-hidden ">
                    <img src="/temp/images/icon/author.png" width="20" alt="">
                    <h6 class="mb-0 fw-bold ms-2">Tác giả: {{$doc->User->name}}</h6>
                </div>
                <div class="hot-docs__other">
                    <div class="hot-docs__cate d-flex align-items-center text-nowrap overflow-hidden ">
                        <img width="20" src="/temp/images/icon/cate.png" alt="" class="">
                        <h6 class="mb-0 fw-bold ms-2">{{$doc->Category->title}}</h6>
                    </div>
                    <div class="hot-docs__score d-flex align-items-center">
                        <img width="20" src="/temp/images/icon/score.png" alt="">
                        <h6 class="fw-bold mb-0 ms-2">Số điểm: {{$doc->score}}</h6>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
