
<header class="header position-fixed top-0 d-flex">
    <div class="container d-flex align-items-center">
        <div class="row w-100">
            <div class="col col-5">
                <div class="d-flex h-100 align-items-center">
                    <div class="header-categories d-flex align-items-center me-3 h-100">
                        <i class="ti-menu me-2"></i>
                        <span>Danh sách tài liệu</span>
                    </div>
                    <div class="header-search d-flex align-items-center position-relative">
                        <input class="border-0" type="text">
                        <i class="fa-solid fa-magnifying-glass text-black"></i>
                    </div>
                </div>
            </div>
            <div class="col col-2">
                <div class="header-logo d-flex align-items-center justify-content-center">
                    <a href="#" title="Trang chủ">
                        <img src="https://hocmai.vn/img/hocmai/logo_w_45x43.png" alt="logo">
                    </a>
                </div>
            </div>
            <div class="col col-5">
                <div class="header-action d-flex align-items-center justify-content-end h-100">
                    <a href="{{route('login')}}" class="btn btn-primary me-3">
                        Đăng nhập
                    </a>
                    <a href="{{route('register')}}" class="btn btn-primary">Đăng ký</a>
                </div>
            </div>
        </div>
    </div>
</header>

@include('menu.index')
<form action="{{route('logout')}}" method="post" class="logout">
    @csrf
    <button type="submit" class="dropdown-item">
        <i class="bx bx-power-off me-2"></i>
        <span class="align-middle">Log Out</span>
    </button>
</form>
