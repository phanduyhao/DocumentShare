@extends('layout.layout')
@section('content')
    <div class="main mt-5 py-4">
        <div class="container">
            <div class="row pt-5">
                <div class="col col-3">
                    <div class="pr-sub d-flex justify-content-center align-items-center py-2 px-3">
                        <div class="avata-user">
                            <img src="/temp/images/avatars/{{$user->avatar}}" alt="">
                        </div>
                        <div class="pr-info-sub ms-2">
                            <div class="pr-sub-name">{{$user->name}}</div>
                            <div class="pr-sub-point d-flex align-items-center">
                                <span>Điểm tích luỹ:</span>
                                <div class="point ms-1">{{$user->score}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="pr-sub mt-3 ">
                        <div class="pr-sub-nav border-bottom" onclick="openInfo()">
                            <a href="#" class="pr-sub-nav-item">Thông tin cá nhân</a>
                        </div>
                        <div class="pr-sub-nav border-bottom" onclick="openEditInfo()">
                            <a href="#" class="pr-sub-nav-item">Cập nhật thông tin</a>
                        </div>
                        <div class="pr-sub-nav border-bottom" onclick="openEditPassword()">
                            <a href="#" class="pr-sub-nav-item">Thay đổi mật khẩu</a>
                        </div>
                        <div class="pr-sub-nav border-bottom">
                            <a href="{{route('favourite')}}" class="pr-sub-nav-item">Tài liệu yêu thích</a>
                        </div>
                        <div class="pr-sub-nav border-bottom">
                            <a href="{{route('paymentHistory')}}" class="pr-sub-nav-item">Lịch sử nạp tiền</a>
                        </div>
                        <form action="{{route('logout')}}" method="post" class="logout pr-sub-nav">
                            @csrf
                            <input type="hidden" name="_token" value="aGABVq1t8wgyC2s3Qxf15F5VglX99UZpv7u9Juh8" autocomplete="off">
                            <button type="submit" class="dropdown-item pr-sub-nav-item">
                                <i class="bx bx-power-off me-2"></i>
                                <span class="align-middle">Đăng xuất</span>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="col col-9">
                    <div id="info-user" class="info-pr"  >
                        <div class="info-pr-titel">
                            <div class="info-pr-titel-name">
                                Thông tin cá nhân
                            </div>
                        </div>
                        <div class="info-pr-decs">
                            <div class="row info-pr-item d-flex justify-content-center align-items-center">
                                <div class="col col-2">
                                    <span>Họ và tên:</span>
                                </div>
                                <div class="col col-6">
                                    {{$user->name}}
                                </div>
                            </div>
                            <div class="row info-pr-item d-flex justify-content-center align-items-center">
                                <div class="col col-2">
                                    <span>Giới tính:</span>
                                </div>
                                <div class="col col-6">
                                  @if($user->sex == null)
                                      Chưa cập nhật
                                  @else
                                        {{$user->sex}}
                                  @endif
                                </div>
                            </div>
                            <div class="row info-pr-item d-flex justify-content-center align-items-center">
                                <div class="col col-2">
                                    <span>Ngày sinh:</span>
                                </div>
                                <div class="col col-6">
                                    @if($user->date == null )
                                        Chưa cập nhật
                                    @else
                                        {{$user->date}}
                                    @endif
                                </div>
                            </div>
                            <div class="row info-pr-item d-flex justify-content-center align-items-center">
                                <div class="col col-2">
                                    <span>Email:</span>
                                </div>
                                <div class="col col-6">
                                    {{$user->email}}
                                </div>
                            </div>
                            <div class="row info-pr-item d-flex justify-content-center align-items-center">
                                <div class="col col-2">
                                    <span>Số điện thoại:</span>
                                </div>
                                <div class="col col-6">
                                    @if($user->phone == null )
                                        Chưa cập nhật
                                    @else
                                        {{$user->phone}}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Cập nhật thông tin -->
                    <div id="update-info-user" class="info-pr" style="display: none;">
                        <div class="info-pr-titel">
                            <div class="info-pr-titel-name">
                                Cập nhật thông tin
                            </div>
                        </div>
                        <form id="form-update_profile" method="post" action="{{ route('profile.update',['user' => $user]) }}" enctype="multipart/form-data" class="info-pr-decs">
                            @csrf
                            <div class="row info-pr-item d-flex justify-content-center align-items-center mt-3 image-gallery" id="image-gallery-form-update_profile">
                               <div class="col-2">
                                   <label
                                       class='form-label'
                                       for='basic-default-fullname'
                                   >Avatar</label>
                               </div>
                                <div class="col-6">
                                    <input type="file" name="avatar" class="file-input" id="file-input-form-update_profile" multiple onchange="previewImages(event, 'form-update_profile')">
                                    <div class="image-preview" id="image-preview-form-update_profile"></div>

                                </div>
                            </div>
                            <div class="row info-pr-item d-flex justify-content-center align-items-center mt-3">
                                <div class="col col-2">
                                    <span>Họ và tên:</span>
                                </div>
                                <div class="col col-6">
                                    <input type="text" name="name" class="form-control"  value="{{ $user->name }}"  placeholder="">
                                </div>
                            </div>
                            <div class="row info-pr-item d-flex justify-content-center align-items-center mt-3">
                                <div class="col col-2">
                                    <span>Số điện thoại:</span>
                                </div>
                                <div class="col col-6">
                                    <input type="text" name="phone" class="form-control"  value="{{ $user->phone }}"  placeholder="">
                                </div>
                            </div>
                            <div class="row info-pr-item d-flex justify-content-center align-items-center">
                                <div class="col col-2">
                                    <span>Email:</span>
                                </div>
                                <div class="col col-6">
                                    <input type="email" value="{{$user->email}}" name="email" class="form-control"  placeholder="">
                                </div>
                            </div>
                            <div class="row info-pr-item d-flex justify-content-center align-items-center">
                                <div class="col col-2">
                                    <span>Giới tính:</span>
                                </div>
                                <div class="col col-6">
                                    <select name="sex" class="form-select" aria-label="Default select example">
                                        @if($user->sex == null)
                                            <option selected>Giới tính</option>
                                            <option value="Nam">Nam</option>
                                            <option value="Nữ">Nữ</option>
                                        @else
                                            <option value="{{$user->sex}}">{{$user->sex}}</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="row info-pr-item d-flex justify-content-center align-items-center">
                                <div class="col col-2">
                                    <span>Ngày sinh:</span>
                                </div>
                                <div class="col col-6">
                                    <input type="date" value="{{$user->date}}" id="birthday" name="date">
                                </div>
                            </div>
                            <div class="row info-pr-item d-flex justify-content-center align-items-center">
                                <button type="submit" class="btn btn-primary w-25">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                    <!-- Thay mật khẩu -->
                    <div id="edit-password" class="info-pr" style="display: none;">
                        <div class="info-pr-titel">
                            <div class="info-pr-titel-name">
                                Thay đổi mật khẩu
                            </div>
                        </div>
                        <form method="post" action="{{ route('profile.resetPass') }}" class="info-pr-decs" id="changePasswordForm">
                            @csrf
                            <div class="row info-pr-item d-flex justify-content-center align-items-center mt-3">
                                <div class="col col-2">
                                    <span>Mật khẩu hiện tại:</span>
                                </div>
                                <div class="col col-6">
                                    <input type="password" name="old_pass" class="form-control" id="old_pass" placeholder="">
                                    <span class="text-danger" id="old_pass_error"></span>
                                </div>
                            </div>
                            <div class="row info-pr-item d-flex justify-content-center align-items-center">
                                <div class="col col-2">
                                    <span>Mật khẩu mới:</span>
                                </div>
                                <div class="col col-6">
                                    <input type="password" name="new_pass" class="form-control" id="new_pass" placeholder="">
                                    <span class="text-danger" id="new_pass_error"></span>
                                </div>
                            </div>
                            <div class="row info-pr-item d-flex justify-content-center align-items-center">
                                <div class="col col-2">
                                    <span>Xác nhận mật khẩu:</span>
                                </div>
                                <div class="col col-6">
                                    <input type="password" name="confirm_pass" class="form-control" id="confirm_pass" placeholder="">
                                    <span class="text-danger" id="confirm_pass_error"></span>
                                </div>
                            </div>

                            <div class="row info-pr-item d-flex justify-content-center align-items-center">
                                <button type="button" class="btn btn-primary w-25" id="btn-reset_pass">Cập nhật</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
