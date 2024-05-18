@extends('admin.main')
@section('contents')
    <!-- / Navbar -->
    <!-- Content wrapper -->
    <div class='content-wrapper'>
        <!-- Content -->
        <div class='container-fluid flex-grow-1 container-p-y'>
            <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Congratulations John! 🎉</h5>
                          <p class="mb-4">
                            You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                            your profile.
                          </p>

                          <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img src="/temp/images/avatars/{{Auth::user()->avatar}}" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-4 order-1">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="../assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded">
                            </div>
                            <div class="dropdown">
                              <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <span class="fw-semibold d-block mb-1">Profit</span>
                          <h3 class="card-title mb-2">$12,628</h3>
                          <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                      <div class="card">
                        <div class="card-body">
                          <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                              <img src="../assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded">
                            </div>
                            <div class="dropdown">
                              <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                              </div>
                            </div>
                          </div>
                          <span>Sales</span>
                          <h3 class="card-title text-nowrap mb-1">$4,679</h3>
                          <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Total Revenue -->
                
                <!--/ Total Revenue -->
                
              </div>
            <div class="row">
                <div class='col-lg-2 col-md-12 col-6 mb-4'>
                    <div class='card'>
                        <div class='card-body'>
                            <div
                                class='card-title d-flex align-items-start justify-content-between'
                            >
                                <a href="{{route('user')}}" class='avatar flex-shrink-0'>
                                    <img
                                        src='/temp/admin/assets/img/icons/unicons/user.png'
                                        alt='chart success'
                                        class='rounded'
                                    />
                                </a>
                                <div class='dropdown'>
                                    <button
                                        class='btn p-0'
                                        type='button'
                                        id='cardOpt3'
                                        data-bs-toggle='dropdown'
                                        aria-haspopup='true'
                                        aria-expanded='false'
                                    >
                                        <i
                                            class='bx bx-dots-vertical-rounded'
                                        ></i>
                                    </button>
                                    <div
                                        class='dropdown-menu dropdown-menu-end'
                                        aria-labelledby='cardOpt3'
                                    >
                                        <a
                                            class='dropdown-item'
                                            href='javascript:void(0);'
                                        >View More</a>
                                        <a
                                            class='dropdown-item'
                                            href='javascript:void(0);'
                                        >Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span
                                class='fw-semibold d-block mb-1'
                            >Tài khoản</span>
                            <h3 class='card-title mb-2'>{{$users_count}}</h3>
                        </div>
                    </div>
                </div>
                <div class='col-lg-2 col-md-12 col-6 mb-4'>
                    <div class='card'>
                        <div class='card-body'>
                            <div
                                class='card-title d-flex align-items-start justify-content-between'
                            >
                                <a href="{{route('documents.index')}}" class='avatar flex-shrink-0'>
                                    <img
                                        src='/temp/admin/assets/img/icons/unicons/documents.png'
                                        alt='chart success'
                                        class='rounded'
                                    />
                                </a>
                                <div class='dropdown'>
                                    <button
                                        class='btn p-0'
                                        type='button'
                                        id='cardOpt3'
                                        data-bs-toggle='dropdown'
                                        aria-haspopup='true'
                                        aria-expanded='false'
                                    >
                                        <i
                                            class='bx bx-dots-vertical-rounded'
                                        ></i>
                                    </button>
                                    <div
                                        class='dropdown-menu dropdown-menu-end'
                                        aria-labelledby='cardOpt3'
                                    >
                                        <a
                                            class='dropdown-item'
                                            href='javascript:void(0);'
                                        >View More</a>
                                        <a
                                            class='dropdown-item'
                                            href='javascript:void(0);'
                                        >Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span
                                class='fw-semibold d-block mb-1'
                            >Tài liệu</span>
                            <h3 class='card-title mb-2'>{{$docs_count}}</h3>
                        </div>
                    </div>
                </div>
                <div class='col-lg-2 col-md-12 col-6 mb-4'>
                    <div class='card'>
                        <div class='card-body'>
                            <div
                                class='card-title d-flex align-items-start justify-content-between'
                            >
                                <a href="{{route('cates.index')}}" class='avatar flex-shrink-0'>
                                    <img
                                        src='/temp/admin/assets/img/icons/unicons/categories.png'
                                        alt='chart success'
                                        class='rounded'
                                    />
                                </a>
                                <div class='dropdown'>
                                    <button
                                        class='btn p-0'
                                        type='button'
                                        id='cardOpt3'
                                        data-bs-toggle='dropdown'
                                        aria-haspopup='true'
                                        aria-expanded='false'
                                    >
                                        <i
                                            class='bx bx-dots-vertical-rounded'
                                        ></i>
                                    </button>
                                    <div
                                        class='dropdown-menu dropdown-menu-end'
                                        aria-labelledby='cardOpt3'
                                    >
                                        <a
                                            class='dropdown-item'
                                            href='javascript:void(0);'
                                        >View More</a>
                                        <a
                                            class='dropdown-item'
                                            href='javascript:void(0);'
                                        >Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span
                                class='fw-semibold d-block mb-1'
                            >Danh mục</span>
                            <h3 class='card-title mb-2'>{{$cates_count}}</h3>
                        </div>
                    </div>
                </div>
                <div class='col-lg-2 col-md-12 col-6 mb-4'>
                    <div class='card'>
                        <div class='card-body'>
                            <div
                                class='card-title d-flex align-items-start justify-content-between'
                            >
                                <a href="{{route('files.index')}}" class='avatar flex-shrink-0'>
                                    <img
                                        src='/temp/admin/assets/img/icons/unicons/file.png'
                                        alt='chart success'
                                        class='rounded'
                                    />
                                </a>
                                <div class='dropdown'>
                                    <button
                                        class='btn p-0'
                                        type='button'
                                        id='cardOpt3'
                                        data-bs-toggle='dropdown'
                                        aria-haspopup='true'
                                        aria-expanded='false'
                                    >
                                        <i
                                            class='bx bx-dots-vertical-rounded'
                                        ></i>
                                    </button>
                                    <div
                                        class='dropdown-menu dropdown-menu-end'
                                        aria-labelledby='cardOpt3'
                                    >
                                        <a
                                            class='dropdown-item'
                                            href='javascript:void(0);'
                                        >View More</a>
                                        <a
                                            class='dropdown-item'
                                            href='javascript:void(0);'
                                        >Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span
                                class='fw-semibold d-block mb-1'
                            >Files</span>
                            <h3 class='card-title mb-2'>{{$files_count}}</h3>
                        </div>
                    </div>
                </div>
                <div class='col-lg-2 col-md-12 col-6 mb-4'>
                    <div class='card'>
                        <div class='card-body'>
                            <div
                                class='card-title d-flex align-items-start justify-content-between'
                            >
                                <a href="{{route('comments.index')}}" class='avatar flex-shrink-0'>
                                    <img
                                        src='/temp/admin/assets/img/icons/unicons/chat.png'
                                        alt='chart success'
                                        class='rounded'
                                    />
                                </a>
                                <div class='dropdown'>
                                    <button
                                        class='btn p-0'
                                        type='button'
                                        id='cardOpt3'
                                        data-bs-toggle='dropdown'
                                        aria-haspopup='true'
                                        aria-expanded='false'
                                    >
                                        <i
                                            class='bx bx-dots-vertical-rounded'
                                        ></i>
                                    </button>
                                    <div
                                        class='dropdown-menu dropdown-menu-end'
                                        aria-labelledby='cardOpt3'
                                    >
                                        <a
                                            class='dropdown-item'
                                            href='javascript:void(0);'
                                        >View More</a>
                                        <a
                                            class='dropdown-item'
                                            href='javascript:void(0);'
                                        >Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span
                                class='fw-semibold d-block mb-1'
                            >Bình luận</span>
                            <h3 class='card-title mb-2'>{{$comments}}</h3>
                        </div>
                    </div>
                </div>
                <div class='col-lg-2 col-md-12 col-6 mb-4'>
                    <div class='card'>
                        <div class='card-body'>
                            <div
                                class='card-title d-flex align-items-start justify-content-between'
                            >
                                <a href="{{route('downloads.index')}}" class='avatar flex-shrink-0'>
                                    <img
                                        src='/temp/admin/assets/img/icons/unicons/download.png'
                                        alt='chart success'
                                        class='rounded'
                                    />
                                </a>
                                <div class='dropdown'>
                                    <button
                                        class='btn p-0'
                                        type='button'
                                        id='cardOpt3'
                                        data-bs-toggle='dropdown'
                                        aria-haspopup='true'
                                        aria-expanded='false'
                                    >
                                        <i
                                            class='bx bx-dots-vertical-rounded'
                                        ></i>
                                    </button>
                                    <div
                                        class='dropdown-menu dropdown-menu-end'
                                        aria-labelledby='cardOpt3'
                                    >
                                        <a
                                            class='dropdown-item'
                                            href='javascript:void(0);'
                                        >View More</a>
                                        <a
                                            class='dropdown-item'
                                            href='javascript:void(0);'
                                        >Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span
                                class='fw-semibold d-block mb-1'
                            >Lượt tải xuống tài liệu</span>
                            <h3 class='card-title mb-2'>{{$downloads}}</h3>
                        </div>
                    </div>
                </div>
                <div class='col-lg-2 col-md-12 col-6 mb-4'>
                    <div class='card'>
                        <div class='card-body'>
                            <div
                                class='card-title d-flex align-items-start justify-content-between'
                            >
                                <a href="{{route('rates.index')}}" class='avatar flex-shrink-0'>
                                    <img
                                        src='/temp/admin/assets/img/icons/unicons/rating.png'
                                        alt='chart success'
                                        class='rounded'
                                    />
                                </a>
                                <div class='dropdown'>
                                    <button
                                        class='btn p-0'
                                        type='button'
                                        id='cardOpt3'
                                        data-bs-toggle='dropdown'
                                        aria-haspopup='true'
                                        aria-expanded='false'
                                    >
                                        <i
                                            class='bx bx-dots-vertical-rounded'
                                        ></i>
                                    </button>
                                    <div
                                        class='dropdown-menu dropdown-menu-end'
                                        aria-labelledby='cardOpt3'
                                    >
                                        <a
                                            class='dropdown-item'
                                            href='javascript:void(0);'
                                        >View More</a>
                                        <a
                                            class='dropdown-item'
                                            href='javascript:void(0);'
                                        >Delete</a>
                                    </div>
                                </div>
                            </div>
                            <span
                                class='fw-semibold d-block mb-1'
                            >Lượt đánh giá</span>
                            <h3 class='card-title mb-2'>{{$rates}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
        <!-- Footer -->
        <footer class='content-footer footer bg-footer-theme'>
            <div
                class='container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column'
            >
                <div class='mb-2 mb-md-0'>
                    ©
                    <script>
                        document.write(new Date().getFullYear());
                    </script>2023 , made with ❤️ by
                    <a
                        href='https://themeselection.com'
                        target='_blank'
                        class='footer-link fw-bolder'
                    >ThemeSelection</a>
                </div>
                <div>
                    <a
                        href='https://themeselection.com/license/'
                        class='footer-link me-4'
                        target='_blank'
                    >License</a>
                    <a
                        href='https://themeselection.com/'
                        target='_blank'
                        class='footer-link me-4'
                    >More Themes</a>
                    <a
                        href='https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/'
                        target='_blank'
                        class='footer-link me-4'
                    >Documentation</a>
                    <a
                        href='https://github.com/themeselection/sneat-html-admin-template-free/issues'
                        target='_blank'
                        class='footer-link me-4'
                    >Support</a>
                </div>
            </div>
        </footer>
        <!-- / Footer -->
        <div class='content-backdrop fade'></div>
    </div>
    <!-- Content wrapper -->
@endsection
