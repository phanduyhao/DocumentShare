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
                          <h5 class="card-title text-primary">Xin chào {{Auth::user()->name}}🎉</h5>
                          <p class="mb-4">
                            Dưới đây là những thống kê website
                          </p>
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
                        <div class='card'>
                            <div class='card-body'>
                                <div
                                    class='card-title d-flex align-items-start justify-content-between'
                                >
                                    <a href="#" class='avatar flex-shrink-0'>
                                        <img
                                            src='/temp/images/icon/view.png'
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
                                >Lượt truy cập tài liệu</span>
                                <h3 class='card-title mb-2'>{{$view_count}}</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-6 mb-4">
                        <div class='card'>
                            <div class='card-body'>
                                <div
                                    class='card-title d-flex align-items-start justify-content-between'
                                >
                                    <a href="#" class='avatar flex-shrink-0'>
                                        <img
                                            src='/temp/images/icon/payment.png'
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
                                >Lượt giao dịch</span>
                                <h3 class='card-title mb-2'>{{$payments}}</h3>
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
            <div class="row">
                <!-- Order Statistics -->
                <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                      <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Order Statistics</h5>
                        <small class="text-muted">42.82k Total Sales</small>
                      </div>
                      <div class="dropdown">
                        <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                          <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                          <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                          <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center mb-3" style="position: relative;">
                        <div class="d-flex flex-column align-items-center gap-1">
                          <h2 class="mb-2">8,258</h2>
                          <span>Total Orders</span>
                        </div>
                        <div id="orderStatisticsChart" style="min-height: 137.55px;"><div id="apexchartsask9btyl" class="apexcharts-canvas apexchartsask9btyl apexcharts-theme-light" style="width: 130px; height: 137.55px;"><svg id="SvgjsSvg1733" width="130" height="137.55" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1735" class="apexcharts-inner apexcharts-graphical" transform="translate(-7, 0)"><defs id="SvgjsDefs1734"><clipPath id="gridRectMaskask9btyl"><rect id="SvgjsRect1737" width="150" height="173" x="-4.5" y="-2.5" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskask9btyl"></clipPath><clipPath id="nonForecastMaskask9btyl"></clipPath><clipPath id="gridRectMarkerMaskask9btyl"><rect id="SvgjsRect1738" width="145" height="172" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG1739" class="apexcharts-pie"><g id="SvgjsG1740" transform="translate(0, 0) scale(1)"><circle id="SvgjsCircle1741" r="44.835365853658544" cx="70.5" cy="70.5" fill="transparent"></circle><g id="SvgjsG1742" class="apexcharts-slices"><g id="SvgjsG1743" class="apexcharts-series apexcharts-pie-series" seriesName="Electronic" rel="1" data:realIndex="0"><path id="SvgjsPath1744" d="M 70.5 10.71951219512195 A 59.78048780487805 59.78048780487805 0 0 1 97.63977353321047 123.7648046533095 L 90.85483014990785 110.44860348998213 A 44.835365853658544 44.835365853658544 0 0 0 70.5 25.664634146341456 L 70.5 10.71951219512195 z" fill="rgba(105,108,255,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="5" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-0" index="0" j="0" data:angle="153" data:startAngle="0" data:strokeWidth="5" data:value="85" data:pathOrig="M 70.5 10.71951219512195 A 59.78048780487805 59.78048780487805 0 0 1 97.63977353321047 123.7648046533095 L 90.85483014990785 110.44860348998213 A 44.835365853658544 44.835365853658544 0 0 0 70.5 25.664634146341456 L 70.5 10.71951219512195 z" stroke="#ffffff"></path></g><g id="SvgjsG1745" class="apexcharts-series apexcharts-pie-series" seriesName="Sports" rel="2" data:realIndex="1"><path id="SvgjsPath1746" d="M 97.63977353321047 123.7648046533095 A 59.78048780487805 59.78048780487805 0 0 1 70.5 130.28048780487805 L 70.5 115.33536585365854 A 44.835365853658544 44.835365853658544 0 0 0 90.85483014990785 110.44860348998213 L 97.63977353321047 123.7648046533095 z" fill="rgba(133,146,163,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="5" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-1" index="0" j="1" data:angle="27" data:startAngle="153" data:strokeWidth="5" data:value="15" data:pathOrig="M 97.63977353321047 123.7648046533095 A 59.78048780487805 59.78048780487805 0 0 1 70.5 130.28048780487805 L 70.5 115.33536585365854 A 44.835365853658544 44.835365853658544 0 0 0 90.85483014990785 110.44860348998213 L 97.63977353321047 123.7648046533095 z" stroke="#ffffff"></path></g><g id="SvgjsG1747" class="apexcharts-series apexcharts-pie-series" seriesName="Decor" rel="3" data:realIndex="2"><path id="SvgjsPath1748" d="M 70.5 130.28048780487805 A 59.78048780487805 59.78048780487805 0 0 1 10.71951219512195 70.50000000000001 L 25.664634146341456 70.5 A 44.835365853658544 44.835365853658544 0 0 0 70.5 115.33536585365854 L 70.5 130.28048780487805 z" fill="rgba(3,195,236,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="5" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-2" index="0" j="2" data:angle="90" data:startAngle="180" data:strokeWidth="5" data:value="50" data:pathOrig="M 70.5 130.28048780487805 A 59.78048780487805 59.78048780487805 0 0 1 10.71951219512195 70.50000000000001 L 25.664634146341456 70.5 A 44.835365853658544 44.835365853658544 0 0 0 70.5 115.33536585365854 L 70.5 130.28048780487805 z" stroke="#ffffff"></path></g><g id="SvgjsG1749" class="apexcharts-series apexcharts-pie-series" seriesName="Fashion" rel="4" data:realIndex="3"><path id="SvgjsPath1750" d="M 10.71951219512195 70.50000000000001 A 59.78048780487805 59.78048780487805 0 0 1 70.48956633664653 10.719513105630845 L 70.4921747524849 25.664634829223125 A 44.835365853658544 44.835365853658544 0 0 0 25.664634146341456 70.5 L 10.71951219512195 70.50000000000001 z" fill="rgba(113,221,55,1)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="5" stroke-dasharray="0" class="apexcharts-pie-area apexcharts-donut-slice-3" index="0" j="3" data:angle="90" data:startAngle="270" data:strokeWidth="5" data:value="50" data:pathOrig="M 10.71951219512195 70.50000000000001 A 59.78048780487805 59.78048780487805 0 0 1 70.48956633664653 10.719513105630845 L 70.4921747524849 25.664634829223125 A 44.835365853658544 44.835365853658544 0 0 0 25.664634146341456 70.5 L 10.71951219512195 70.50000000000001 z" stroke="#ffffff"></path></g></g></g><g id="SvgjsG1751" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)" style="opacity: 1;"><text id="SvgjsText1752" font-family="Helvetica, Arial, sans-serif" x="70.5" y="90.5" text-anchor="middle" dominant-baseline="auto" font-size="0.8125rem" font-weight="400" fill="#a1acb8" class="apexcharts-text apexcharts-datalabel-label" style="font-family: Helvetica, Arial, sans-serif; fill: rgb(161, 172, 184);">Weekly</text><text id="SvgjsText1753" font-family="Public Sans" x="70.5" y="71.5" text-anchor="middle" dominant-baseline="auto" font-size="1.5rem" font-weight="400" fill="#566a7f" class="apexcharts-text apexcharts-datalabel-value" style="font-family: &quot;Public Sans&quot;;">38%</text></g></g><line id="SvgjsLine1754" x1="0" y1="0" x2="141" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1755" x1="0" y1="0" x2="141" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line></g><g id="SvgjsG1736" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div><div class="apexcharts-tooltip apexcharts-theme-dark" style="left: -3.46875px; top: -36.3594px;"><div class="apexcharts-tooltip-series-group apexcharts-active" style="order: 1; display: flex; background-color: rgb(113, 221, 55);"><span class="apexcharts-tooltip-marker" style="background-color: rgb(113, 221, 55); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Fashion: </span><span class="apexcharts-tooltip-text-y-value">50</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 2; display: none; background-color: rgb(113, 221, 55);"><span class="apexcharts-tooltip-marker" style="background-color: rgb(113, 221, 55); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Fashion: </span><span class="apexcharts-tooltip-text-y-value">50</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 3; display: none; background-color: rgb(113, 221, 55);"><span class="apexcharts-tooltip-marker" style="background-color: rgb(113, 221, 55); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Fashion: </span><span class="apexcharts-tooltip-text-y-value">50</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div><div class="apexcharts-tooltip-series-group" style="order: 4; display: none; background-color: rgb(113, 221, 55);"><span class="apexcharts-tooltip-marker" style="background-color: rgb(113, 221, 55); display: none;"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label">Fashion: </span><span class="apexcharts-tooltip-text-y-value">50</span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div></div></div>
                      <div class="resize-triggers"><div class="expand-trigger"><div style="width: 398px; height: 139px;"></div></div><div class="contract-trigger"></div></div></div>
                      <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-primary"><i class="bx bx-mobile-alt"></i></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Electronic</h6>
                              <small class="text-muted">Mobile, Earbuds, TV</small>
                            </div>
                            <div class="user-progress">
                              <small class="fw-semibold">82.5k</small>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-success"><i class="bx bx-closet"></i></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Fashion</h6>
                              <small class="text-muted">T-shirt, Jeans, Shoes</small>
                            </div>
                            <div class="user-progress">
                              <small class="fw-semibold">23.8k</small>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-info"><i class="bx bx-home-alt"></i></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Decor</h6>
                              <small class="text-muted">Fine Art, Dining</small>
                            </div>
                            <div class="user-progress">
                              <small class="fw-semibold">849k</small>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex">
                          <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-secondary"><i class="bx bx-football"></i></span>
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <h6 class="mb-0">Sports</h6>
                              <small class="text-muted">Football, Cricket Kit</small>
                            </div>
                            <div class="user-progress">
                              <small class="fw-semibold">99</small>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!--/ Order Statistics -->

                <!-- Expense Overview -->
                <div class="col-md-6 col-lg-4 order-1 mb-4">
                  <div class="card h-100">
                    <div class="card-header">
                      <ul class="nav nav-pills" role="tablist">
                        <li class="nav-item">
                          <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab" data-bs-target="#navs-tabs-line-card-income" aria-controls="navs-tabs-line-card-income" aria-selected="true">
                            Income
                          </button>
                        </li>
                        <li class="nav-item">
                          <button type="button" class="nav-link" role="tab">Expenses</button>
                        </li>
                        <li class="nav-item">
                          <button type="button" class="nav-link" role="tab">Profit</button>
                        </li>
                      </ul>
                    </div>
                    <div class="card-body px-0">
                      <div class="tab-content p-0">
                        <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel" style="position: relative;">
                          <div class="d-flex p-4 pt-3">
                            <div class="avatar flex-shrink-0 me-3">
                              <img src="../assets/img/icons/unicons/wallet.png" alt="User">
                            </div>
                            <div>
                              <small class="text-muted d-block">Total Balance</small>
                              <div class="d-flex align-items-center">
                                <h6 class="mb-0 me-1">$459.10</h6>
                                <small class="text-success fw-semibold">
                                  <i class="bx bx-chevron-up"></i>
                                  42.9%
                                </small>
                              </div>
                            </div>
                          </div>
                          <div id="incomeChart" style="min-height: 215px;"><div id="apexchartsiltit8mj" class="apexcharts-canvas apexchartsiltit8mj apexcharts-theme-light" style="width: 445px; height: 215px;"><svg id="SvgjsSvg1756" width="445" height="215" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1758" class="apexcharts-inner apexcharts-graphical" transform="translate(0, 10)"><defs id="SvgjsDefs1757"><clipPath id="gridRectMaskiltit8mj"><rect id="SvgjsRect1763" width="433.635009765625" height="175.73" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMaskiltit8mj"></clipPath><clipPath id="nonForecastMaskiltit8mj"></clipPath><clipPath id="gridRectMarkerMaskiltit8mj"><rect id="SvgjsRect1764" width="455.635009765625" height="201.73" x="-14" y="-14" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1784" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1785" stop-opacity="0.5" stop-color="rgba(105,108,255,0.5)" offset="0"></stop><stop id="SvgjsStop1786" stop-opacity="0.25" stop-color="rgba(195,196,255,0.25)" offset="0.95"></stop><stop id="SvgjsStop1787" stop-opacity="0.25" stop-color="rgba(195,196,255,0.25)" offset="1"></stop></linearGradient></defs><line id="SvgjsLine1762" x1="0" y1="0" x2="0" y2="173.73" stroke="#b6b6b6" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs" x="0" y="0" width="1" height="173.73" fill="#b1b9c4" filter="none" fill-opacity="0.9" stroke-width="1"></line><g id="SvgjsG1790" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1791" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"><text id="SvgjsText1793" font-family="Helvetica, Arial, sans-serif" x="0" y="202.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1794"></tspan><title></title></text><text id="SvgjsText1796" font-family="Helvetica, Arial, sans-serif" x="61.09071568080358" y="202.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1797">Jan</tspan><title>Jan</title></text><text id="SvgjsText1799" font-family="Helvetica, Arial, sans-serif" x="122.18143136160717" y="202.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1800">Feb</tspan><title>Feb</title></text><text id="SvgjsText1802" font-family="Helvetica, Arial, sans-serif" x="183.27214704241072" y="202.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1803">Mar</tspan><title>Mar</title></text><text id="SvgjsText1805" font-family="Helvetica, Arial, sans-serif" x="244.36286272321428" y="202.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1806">Apr</tspan><title>Apr</title></text><text id="SvgjsText1808" font-family="Helvetica, Arial, sans-serif" x="305.45357840401783" y="202.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1809">May</tspan><title>May</title></text><text id="SvgjsText1811" font-family="Helvetica, Arial, sans-serif" x="366.5442940848214" y="202.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1812">Jun</tspan><title>Jun</title></text><text id="SvgjsText1814" font-family="Helvetica, Arial, sans-serif" x="427.63500976562494" y="202.73" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#a1acb8" class="apexcharts-text apexcharts-xaxis-label " style="font-family: Helvetica, Arial, sans-serif;"><tspan id="SvgjsTspan1815">Jul</tspan><title>Jul</title></text></g></g><g id="SvgjsG1818" class="apexcharts-grid"><g id="SvgjsG1819" class="apexcharts-gridlines-horizontal"><line id="SvgjsLine1821" x1="0" y1="0" x2="427.635009765625" y2="0" stroke="#eceef1" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1822" x1="0" y1="43.4325" x2="427.635009765625" y2="43.4325" stroke="#eceef1" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1823" x1="0" y1="86.865" x2="427.635009765625" y2="86.865" stroke="#eceef1" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1824" x1="0" y1="130.29749999999999" x2="427.635009765625" y2="130.29749999999999" stroke="#eceef1" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-gridline"></line><line id="SvgjsLine1825" x1="0" y1="173.73" x2="427.635009765625" y2="173.73" stroke="#eceef1" stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-gridline"></line></g><g id="SvgjsG1820" class="apexcharts-gridlines-vertical"></g><line id="SvgjsLine1827" x1="0" y1="173.73" x2="427.635009765625" y2="173.73" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line><line id="SvgjsLine1826" x1="0" y1="1" x2="0" y2="173.73" stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line></g><g id="SvgjsG1765" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1766" class="apexcharts-series" seriesName="seriesx1" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1788" d="M 0 173.73L 0 112.92450000000001C 21.38175048828125 112.92450000000001 39.70896519252232 125.95425 61.09071568080357 125.95425C 82.47246616908481 125.95425 100.79968087332588 86.86500000000001 122.18143136160714 86.86500000000001C 143.5631818498884 86.86500000000001 161.89039655412947 121.611 183.27214704241072 121.611C 204.65389753069195 121.611 222.98111223493305 34.74600000000001 244.36286272321428 34.74600000000001C 265.7446132114955 34.74600000000001 284.0718279157366 104.238 305.45357840401783 104.238C 326.8353288922991 104.238 345.16254359654016 65.14875 366.54429408482144 65.14875C 387.9260445731027 65.14875 406.2532592773438 91.20825 427.635009765625 91.20825C 427.635009765625 91.20825 427.635009765625 91.20825 427.635009765625 173.73M 427.635009765625 91.20825z" fill="url(#SvgjsLinearGradient1784)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskiltit8mj)" pathTo="M 0 173.73L 0 112.92450000000001C 21.38175048828125 112.92450000000001 39.70896519252232 125.95425 61.09071568080357 125.95425C 82.47246616908481 125.95425 100.79968087332588 86.86500000000001 122.18143136160714 86.86500000000001C 143.5631818498884 86.86500000000001 161.89039655412947 121.611 183.27214704241072 121.611C 204.65389753069195 121.611 222.98111223493305 34.74600000000001 244.36286272321428 34.74600000000001C 265.7446132114955 34.74600000000001 284.0718279157366 104.238 305.45357840401783 104.238C 326.8353288922991 104.238 345.16254359654016 65.14875 366.54429408482144 65.14875C 387.9260445731027 65.14875 406.2532592773438 91.20825 427.635009765625 91.20825C 427.635009765625 91.20825 427.635009765625 91.20825 427.635009765625 173.73M 427.635009765625 91.20825z" pathFrom="M -1 217.1625L -1 217.1625L 61.09071568080357 217.1625L 122.18143136160714 217.1625L 183.27214704241072 217.1625L 244.36286272321428 217.1625L 305.45357840401783 217.1625L 366.54429408482144 217.1625L 427.635009765625 217.1625"></path><path id="SvgjsPath1789" d="M 0 112.92450000000001C 21.38175048828125 112.92450000000001 39.70896519252232 125.95425 61.09071568080357 125.95425C 82.47246616908481 125.95425 100.79968087332588 86.86500000000001 122.18143136160714 86.86500000000001C 143.5631818498884 86.86500000000001 161.89039655412947 121.611 183.27214704241072 121.611C 204.65389753069195 121.611 222.98111223493305 34.74600000000001 244.36286272321428 34.74600000000001C 265.7446132114955 34.74600000000001 284.0718279157366 104.238 305.45357840401783 104.238C 326.8353288922991 104.238 345.16254359654016 65.14875 366.54429408482144 65.14875C 387.9260445731027 65.14875 406.2532592773438 91.20825 427.635009765625 91.20825" fill="none" fill-opacity="1" stroke="#696cff" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMaskiltit8mj)" pathTo="M 0 112.92450000000001C 21.38175048828125 112.92450000000001 39.70896519252232 125.95425 61.09071568080357 125.95425C 82.47246616908481 125.95425 100.79968087332588 86.86500000000001 122.18143136160714 86.86500000000001C 143.5631818498884 86.86500000000001 161.89039655412947 121.611 183.27214704241072 121.611C 204.65389753069195 121.611 222.98111223493305 34.74600000000001 244.36286272321428 34.74600000000001C 265.7446132114955 34.74600000000001 284.0718279157366 104.238 305.45357840401783 104.238C 326.8353288922991 104.238 345.16254359654016 65.14875 366.54429408482144 65.14875C 387.9260445731027 65.14875 406.2532592773438 91.20825 427.635009765625 91.20825" pathFrom="M -1 217.1625L -1 217.1625L 61.09071568080357 217.1625L 122.18143136160714 217.1625L 183.27214704241072 217.1625L 244.36286272321428 217.1625L 305.45357840401783 217.1625L 366.54429408482144 217.1625L 427.635009765625 217.1625"></path><g id="SvgjsG1767" class="apexcharts-series-markers-wrap" data:realIndex="0"><g id="SvgjsG1769" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskiltit8mj)"><circle id="SvgjsCircle1770" r="6" cx="0" cy="112.92450000000001" class="apexcharts-marker no-pointer-events wq5qqcj8gl" stroke="transparent" fill="transparent" fill-opacity="1" stroke-width="4" stroke-opacity="0.9" rel="0" j="0" index="0" default-marker-size="6"></circle><circle id="SvgjsCircle1771" r="6" cx="61.09071568080357" cy="125.95425" class="apexcharts-marker no-pointer-events wlt7o5uyt" stroke="transparent" fill="transparent" fill-opacity="1" stroke-width="4" stroke-opacity="0.9" rel="1" j="1" index="0" default-marker-size="6"></circle></g><g id="SvgjsG1772" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskiltit8mj)"><circle id="SvgjsCircle1773" r="6" cx="122.18143136160714" cy="86.86500000000001" class="apexcharts-marker no-pointer-events wmq6yyb8c" stroke="transparent" fill="transparent" fill-opacity="1" stroke-width="4" stroke-opacity="0.9" rel="2" j="2" index="0" default-marker-size="6"></circle></g><g id="SvgjsG1774" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskiltit8mj)"><circle id="SvgjsCircle1775" r="6" cx="183.27214704241072" cy="121.611" class="apexcharts-marker no-pointer-events wsz0iqtuc" stroke="transparent" fill="transparent" fill-opacity="1" stroke-width="4" stroke-opacity="0.9" rel="3" j="3" index="0" default-marker-size="6"></circle></g><g id="SvgjsG1776" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskiltit8mj)"><circle id="SvgjsCircle1777" r="6" cx="244.36286272321428" cy="34.74600000000001" class="apexcharts-marker no-pointer-events w4mk9uth6" stroke="transparent" fill="transparent" fill-opacity="1" stroke-width="4" stroke-opacity="0.9" rel="4" j="4" index="0" default-marker-size="6"></circle></g><g id="SvgjsG1778" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskiltit8mj)"><circle id="SvgjsCircle1779" r="6" cx="305.45357840401783" cy="104.238" class="apexcharts-marker no-pointer-events wx7lszzlx" stroke="transparent" fill="transparent" fill-opacity="1" stroke-width="4" stroke-opacity="0.9" rel="5" j="5" index="0" default-marker-size="6"></circle></g><g id="SvgjsG1780" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskiltit8mj)"><circle id="SvgjsCircle1781" r="6" cx="366.54429408482144" cy="65.14875" class="apexcharts-marker no-pointer-events w5gnj3d21" stroke="transparent" fill="transparent" fill-opacity="1" stroke-width="4" stroke-opacity="0.9" rel="6" j="6" index="0" default-marker-size="6"></circle></g><g id="SvgjsG1782" class="apexcharts-series-markers" clip-path="url(#gridRectMarkerMaskiltit8mj)"><circle id="SvgjsCircle1783" r="6" cx="427.635009765625" cy="91.20825" class="apexcharts-marker no-pointer-events wswgkc8n8" stroke="#696cff" fill="#ffffff" fill-opacity="1" stroke-width="4" stroke-opacity="0.9" rel="7" j="7" index="0" default-marker-size="6"></circle></g></g></g><g id="SvgjsG1768" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1828" x1="0" y1="0" x2="427.635009765625" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1829" x1="0" y1="0" x2="427.635009765625" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1830" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1831" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1832" class="apexcharts-point-annotations"></g><rect id="SvgjsRect1833" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-zoom-rect"></rect><rect id="SvgjsRect1834" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe" class="apexcharts-selection-rect"></rect></g><rect id="SvgjsRect1761" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect><g id="SvgjsG1816" class="apexcharts-yaxis" rel="0" transform="translate(-8, 0)"><g id="SvgjsG1817" class="apexcharts-yaxis-texts-g"></g></g><g id="SvgjsG1759" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 107.5px;"></div><div class="apexcharts-tooltip apexcharts-theme-light"><div class="apexcharts-tooltip-title" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div><div class="apexcharts-tooltip-series-group" style="order: 1;"><span class="apexcharts-tooltip-marker" style="background-color: rgb(105, 108, 255);"></span><div class="apexcharts-tooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"><div class="apexcharts-tooltip-y-group"><span class="apexcharts-tooltip-text-y-label"></span><span class="apexcharts-tooltip-text-y-value"></span></div><div class="apexcharts-tooltip-goals-group"><span class="apexcharts-tooltip-text-goals-label"></span><span class="apexcharts-tooltip-text-goals-value"></span></div><div class="apexcharts-tooltip-z-group"><span class="apexcharts-tooltip-text-z-label"></span><span class="apexcharts-tooltip-text-z-value"></span></div></div></div></div><div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"><div class="apexcharts-xaxistooltip-text" style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div></div><div class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light"><div class="apexcharts-yaxistooltip-text"></div></div></div></div>
                          <div class="d-flex justify-content-center pt-4 gap-2">
                            <div class="flex-shrink-0" style="position: relative;">
                              <div id="expensesOfWeek" style="min-height: 57.7px;"><div id="apexcharts3jlyksme" class="apexcharts-canvas apexcharts3jlyksme apexcharts-theme-light" style="width: 60px; height: 57.7px;"><svg id="SvgjsSvg1835" width="60" height="57.7" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1837" class="apexcharts-inner apexcharts-graphical" transform="translate(-10, -10)"><defs id="SvgjsDefs1836"><clipPath id="gridRectMask3jlyksme"><rect id="SvgjsRect1839" width="86" height="87" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="forecastMask3jlyksme"></clipPath><clipPath id="nonForecastMask3jlyksme"></clipPath><clipPath id="gridRectMarkerMask3jlyksme"><rect id="SvgjsRect1840" width="84" height="89" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath></defs><g id="SvgjsG1841" class="apexcharts-radialbar"><g id="SvgjsG1842"><g id="SvgjsG1843" class="apexcharts-tracks"><g id="SvgjsG1844" class="apexcharts-radialbar-track apexcharts-track" rel="1"><path id="apexcharts-radialbarTrack-0" d="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 1 1 39.99617740968999 18.098171065291247" fill="none" fill-opacity="1" stroke="rgba(236,238,241,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="2.0408536585365864" stroke-dasharray="0" class="apexcharts-radialbar-area" data:pathOrig="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 1 1 39.99617740968999 18.098171065291247"></path></g></g><g id="SvgjsG1846"><g id="SvgjsG1850" class="apexcharts-series apexcharts-radial-series" seriesName="seriesx1" rel="1" data:realIndex="0"><path id="SvgjsPath1851" d="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 1 1 22.2810479140526 52.873572242130095" fill="none" fill-opacity="0.85" stroke="rgba(105,108,255,0.85)" stroke-opacity="1" stroke-linecap="round" stroke-width="4.081707317073173" stroke-dasharray="0" class="apexcharts-radialbar-area apexcharts-radialbar-slice-0" data:angle="234" data:value="65" index="0" j="0" data:pathOrig="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 1 1 22.2810479140526 52.873572242130095"></path></g><circle id="SvgjsCircle1847" r="18.881402439024395" cx="40" cy="40" class="apexcharts-radialbar-hollow" fill="transparent"></circle><g id="SvgjsG1848" class="apexcharts-datalabels-group" transform="translate(0, 0) scale(1)" style="opacity: 1;"><text id="SvgjsText1849" font-family="Helvetica, Arial, sans-serif" x="40" y="45" text-anchor="middle" dominant-baseline="auto" font-size="13px" font-weight="400" fill="#697a8d" class="apexcharts-text apexcharts-datalabel-value" style="font-family: Helvetica, Arial, sans-serif;">$65</text></g></g></g></g><line id="SvgjsLine1852" x1="0" y1="0" x2="80" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1853" x1="0" y1="0" x2="80" y2="0" stroke-dasharray="0" stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden"></line></g><g id="SvgjsG1838" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend"></div></div></div>
                            <div class="resize-triggers"><div class="expand-trigger"><div style="width: 61px; height: 59px;"></div></div><div class="contract-trigger"></div></div></div>
                            <div>
                              <p class="mb-n1 mt-1">Expenses This Week</p>
                              <small class="text-muted">$39 less than last week</small>
                            </div>
                          </div>
                        <div class="resize-triggers"><div class="expand-trigger"><div style="width: 446px; height: 377px;"></div></div><div class="contract-trigger"></div></div></div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/ Expense Overview -->

                <!-- Transactions -->
                <div class="col-md-6 col-lg-4 order-2 mb-4">
                  <div class="card h-100">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="card-title m-0 me-2">Transactions</h5>
                      <div class="dropdown">
                        <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                          <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                          <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                          <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                        </div>
                      </div>
                    </div>
                    <div class="card-body">
                      <ul class="p-0 m-0">
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <img src="../assets/img/icons/unicons/paypal.png" alt="User" class="rounded">
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <small class="text-muted d-block mb-1">Paypal</small>
                              <h6 class="mb-0">Send money</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0">+82.6</h6>
                              <span class="text-muted">USD</span>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <img src="../assets/img/icons/unicons/wallet.png" alt="User" class="rounded">
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <small class="text-muted d-block mb-1">Wallet</small>
                              <h6 class="mb-0">Mac'D</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0">+270.69</h6>
                              <span class="text-muted">USD</span>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <img src="../assets/img/icons/unicons/chart.png" alt="User" class="rounded">
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <small class="text-muted d-block mb-1">Transfer</small>
                              <h6 class="mb-0">Refund</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0">+637.91</h6>
                              <span class="text-muted">USD</span>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <img src="../assets/img/icons/unicons/cc-success.png" alt="User" class="rounded">
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <small class="text-muted d-block mb-1">Credit Card</small>
                              <h6 class="mb-0">Ordered Food</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0">-838.71</h6>
                              <span class="text-muted">USD</span>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex mb-4 pb-1">
                          <div class="avatar flex-shrink-0 me-3">
                            <img src="../assets/img/icons/unicons/wallet.png" alt="User" class="rounded">
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <small class="text-muted d-block mb-1">Wallet</small>
                              <h6 class="mb-0">Starbucks</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0">+203.33</h6>
                              <span class="text-muted">USD</span>
                            </div>
                          </div>
                        </li>
                        <li class="d-flex">
                          <div class="avatar flex-shrink-0 me-3">
                            <img src="../assets/img/icons/unicons/cc-warning.png" alt="User" class="rounded">
                          </div>
                          <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                              <small class="text-muted d-block mb-1">Mastercard</small>
                              <h6 class="mb-0">Ordered Food</h6>
                            </div>
                            <div class="user-progress d-flex align-items-center gap-1">
                              <h6 class="mb-0">-92.45</h6>
                              <span class="text-muted">USD</span>
                            </div>
                          </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!--/ Transactions -->
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
