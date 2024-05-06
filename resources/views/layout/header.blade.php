
<header class="header w-100 bg-white">
    <div class=" w-100 ">
        <div class="header-main__top text-black container">
            <div class="row">
                <div class="col-9 d-flex align-items-center justify-content-between position-relative">
                    <a href="/" class="position-absolute bg-white z-index-5 top-0">
                        <img width="105" class="" src="/temp/images/logo.png" alt="">
                    </a>
                   <div class="p-3" style="margin-left: 105px">
                       <form action="{{route('searchMain')}}" class="header-search position-relative">
                           @csrf
                           <input type="text" name="keyword" class="w-100 h-100 header-search__input bg-light p-3 pe-5 border-0 rounded-2" placeholder="Tìm kiếm ">
                           <button type="submit" class="search-btn border-0 bg-transparent position-absolute top-0 end-0 bottom-0 me-3">
                               <i class="fa-solid fa-magnifying-glass"></i>
                           </button>
                       </form>
                   </div>

{{--                    NẠP TIỀN                    --}}
                    <div class="ms-auto me-4 payment-contain">
                        @auth
                        <button type="button" class="btn btn-info fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Nạp tiền
                        </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <form id="form-pay__money" method="post" action="{{route('checkout.payment.vnpay')}}" class="modal-content">
                                    @csrf
                                    <div class="modal-header text-center d-block" style="background: url('/temp/images/icon/slogan-bg.png')">
                                        <h2 class="modal-title text-white fw-bold" id="exampleModalLabel">Nạp tiền đổi điểm</h2>
                                    </div>
                                    <div class="bg-light py-3 px-4 d-flex justify-content-between">
                                        <div class="account d-flex align-items-center justify-content-center fs-5">
                                            <i class=" me-2 fa-solid fa-user"></i>
                                            <p class="name mb-0"> {{Auth::user()->name}}</p>
                                        </div>
                                        <div class="email d-flex align-items-center justify-content-center fs-5">
                                            <i class=" me-2 fa-solid fa-envelope"></i>
                                            <p class="name mb-0"> {{Auth::user()->email}}</p>
                                        </div>
                                        <div class="score d-flex align-items-center justify-content-center fs-5">
                                            <i class=" me-2 fa-solid fa-coins"></i>
                                            <p class="score mb-0 d-flex align-items-center"> Số điểm: {{Auth::user()->score}}</p>
                                        </div>
                                    </div>
                                    <div class="modal-body p-4 text-white" style="background: linear-gradient(-135deg, #33d1ae, #8d00df);">
                                        <div class="row">
                                            <div class="col-8">
                                                <h4 class="fw-bold text-decoration-underline">Quy ước đổi điểm:</h4>
                                                <ul class="fs-5 list-rules fw-bold">
                                                    <li>
                                                        - Nạp ít nhất 10.000đ trở lên.
                                                    </li>
                                                    <li>
                                                        - Số điểm = số tiền / 1000
                                                    </li>
                                                    <li>
                                                        - Ví dụ:
                                                        <ul class="list-rules__item">
                                                            <li>10.000đ = 10 điểm</li>
                                                            <li>20.000đ = 20 điểm</li>
                                                            <li>...</li>
                                                            <li>Nạp > 50.000đ = 50 điểm + 10% số điểm ( +5 )</li>
                                                            <li>...</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-4">
                                                <img class="img-fluid w-100 rounded-5" src="/temp/images/vnpay.png" alt="">
                                            </div>
                                        </div>
                                        <div class="form-group d-flex align-items-center text-nowrap">
                                            <label for="" class="me-3 mb-0 text-white fw-bold"> <i class="fa-solid fa-circle-right"></i> Nhập số tiền cần nạp ( VD: 10000 ):</label>
                                            <div class="input-group text-black">
                                                <input id="input-amount__money" type="float" name="amount_money" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
                                                <span class="input-group-text">VNĐ</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary fs-5 fw-semibold" data-bs-dismiss="modal">Đóng</button>
                                        <button id="btn-submit__money" type="submit" class="btn btn-primary fs-5 fw-semibold">Nạp tiền</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        @else
                            <a href="{{route('login')}}" class="btn btn-info fw-bold">
                                Nạp tiền
                            </a>
                        @endauth
                    </div>
                    <div class="header-phone text-orange d-flex align-items-center border-start border-end h-100 px-4">
                        <i class="fa-solid fa-phone fs-5"></i>
                        <h6 class="mb-0 fw-bold ms-2" >+84 855 840 100</h6>
                    </div>
                </div>
                <div class="col-3">
                    @guest
                        <div class="header-auth d-flex align-items-center h-100">
                            <a href="{{route('login')}}" class="header-auth__btn rounded-2 d-flex justify-content-center align-items-center me-3 fw-semibold text-dark border">Đăng nhập</a>
                            <a href="{{route('register')}}" class="header-auth__btn border rounded-2 d-flex justify-content-center align-items-center fw-semibold text-white border-transparent bg-orange ">Đăng ký</a>
                        </div>
                    @else
                      <div class="d-flex align-items-center h-100">
                          <div class="upload">
                              <a href="{{route('uploadPage')}}" class=" d-flex align-items-center text-nowrap fw-bold p-2 border rounded">
                                  <i class="fa-solid fa-upload fs-5 me-2"></i>
                                  Upload
                              </a>
                          </div>
                          <div class="header-infor position-relative ms-4">
                              <a href="{{route('profile')}}" class="user d-flex align-items-center text-nowrap fw-bold p-2 border rounded">
                                  <i class="fa-solid fa-user fs-5 me-2"></i>
                                  Trang cá nhân
                              </a>
                          </div>
                          <form action="{{route('logout')}}" method="post" class="logout ms-4">
                              @csrf
                              <button type="submit" class="dropdown-item btn btn-primary d-flex align-items-center p-2 border rounded">
                                  <span class="align-middle fw-semibold">Đăng xuất</span>
                                  <i class="fa-solid fa-right-to-bracket fs-5 ms-2"></i>
                              </button>
                          </form>
                      </div>
                    @endguest
                </div>
            </div>
        </div>
        <div class="header-main__bottom border border-top border-0 bg-light">
               <div class="container">
                   @include('menu.index')
               </div>
            </div>
    </div>
    <div class="marquee-container">
        <div class="marquee-content text-white fw-bold text-center w-100">
            <p>
                <img src="/temp/images/icon/fire.png" width="25" alt="">
                Chia sẻ tri thức, học không giới hạn và mở cánh cửa cho sự hiểu biết vô tận
            </p>
            <p>
                <img src="/temp/images/icon/fire.png" width="25" alt="">
                Học không giới hạn, tri thức không biên giới, và chia sẻ tài liệu để hình thành tương lai
            </p>
            <p>
                <img src="/temp/images/icon/fire.png" width="25" alt="">
                Tri thức không bao giờ lạc lõng ở đây, nơi những ý tưởng trở thành hiện thực
            </p>
        </div>
    </div>
</header>

