
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
                              <a href="{{route('uploadPage')}}" class="">
                                  <i class="fa-solid fa-upload fs-5"></i>
                              </a>
                          </div>
                          <div class="header-infor position-relative ms-4">
                              <a href="{{route('profile')}}" class="user">
                                  <i class="fa-solid fa-user fs-5"></i>
                              </a>
                          </div>
                          <form action="{{route('logout')}}" method="post" class="logout ms-4">
                              @csrf
                              <button type="submit" class="dropdown-item d-flex align-items-center">
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

