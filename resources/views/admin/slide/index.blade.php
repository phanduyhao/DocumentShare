@extends('admin.main')
@section('contents')
    <div class="container-fluid flex-grow-1 container-p-y">
        <h3 class="fw-bold text-primary py-3 mb-4">{{$title}}</h3>
        <div class="card">
            <div class="d-flex p-4 justify-content-between">
                <h5 class=" fw-bold">Danh sách slides</h5>
                <div>
                    <button type="button" data-id="" class="btn btn-success text-dark px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#createSlide">Thêm mới</button>
                    <button type="button"class="btn btn-danger me-2 px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#deleteModalAll">Xóa tất cả</button>
                    <div class="modal fade" id="deleteModalAll" tabindex="-1" aria-labelledby="deleteModalAllLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteModalLabel">Bạn có chắc chắn xóa tất cả slides không ?</h1>
                                </div>
                                <form action="{{route('deleteAllSlide')}}" method="post" class="modal-footer">
                                    @csrf
                                    <button class="delete-forever btn btn-danger fw-bolder">Xóa</button>
                                    <button type="button" class="btn btn-secondary fw-bolder" data-bs-dismiss="modal">Đóng</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="createSlide" tabindex="-1" aria-labelledby="createSlideLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="createSlideLabel">Thêm mới Slide.</h1>
                        </div>
                        <div class="card-body">
                            <div class="error">
                                @include('admin.error')
                            </div>
                            <form id="form_slide_store" class="form-create" method='POST' action='{{route('slides.store')}}' enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3 d-flex flex-column image-gallery" id="image-gallery-form_slide_store">
                                    <label
                                        class='form-label'
                                        for='basic-default-fullname'
                                    >Image</label>
                                    <input type="file" name="image" class="slide-input" id="slide-input-form_slide_store" multiple onchange="previewImages(event, 'form_slide_store')">
                                    <div class="image-preview" id="image-preview-form_slide_store"></div>
                                </div>
                                <div class='mb-3 w-100 me-3'>
                                    <label
                                        class='form-label'
                                        for='basic-default-fullname'
                                    >Title</label>
                                    <input
                                        type='text'
                                        class='form-control title input-field '
                                        id='title-store'
                                        placeholder='Nhập tiêu đề'
                                        name='title' data-require='Mời nhập Tiêu đề'
                                    />
                                </div>
                                <div class='mb-3 w-100'>
                                    <label
                                        class='form-label'
                                        for='basic-default-company'
                                    >Link</label>
                                    <input
                                        type='text'
                                        class='form-control slug input-field'
                                        id='slug-store'
                                        placeholder='Nhập Slug'
                                        name='link' data-require='Mời nhập Slug'
                                    />
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="checkbox" id="active" name="active">
                                    <label class="form-check-label" for="defaultCheck3"> Hoạt động </label>
                                </div>
                                <div class="modal-footer">
                                    <button type='submit' class='btn btn-success fw-semibold text-dark'>Thêm mới</button>
                                    <button type="button" class="btn btn-secondary fw-semibold" data-bs-dismiss="modal">Đóng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table ">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th style="width: 300px !important;">Link</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($slides as $slide)
                        <tr data-id="{{$slide->id}}">
                            <td> {{ $loop->iteration }}</td>
                            <td style="white-space: initial">{{$slide->title}}</td>
                            <td>
                                <img width="100" src="/temp/images/slide/{{$slide->image}}" alt="{{ $slide->title }}'s Avatar">
                            </td>
                            <td style="white-space: initial">{{$slide->link}}</td>
                            <td>
                                @if($slide->active == 1)
                                    <i class='bx bxs-circle text-success'></i>
                                @else
                                    <i class='bx bxs-circle text-danger'></i>
                                @endif
                            </td>
                            <td class="">
                                <button type="button" data-url="/admin/slides/{{$slide->id}}" data-id="{{$slide->id}}" class="btn btn-danger btnDeleteAsk me-2 px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>
                                <button type="button" data-id="{{$slide->id}}" class="btn btn-edit btn-info btnEditSlide text-dark px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#editSlide{{$slide->id}}">Sửa</button>
                            </td>
                            <!-- Modal Delete -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteModalLabel">Bạn có chắc chắn xóa bản ghi này vĩnh viễn không ?</h1>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="delete-forever btn btn-danger" data-id="{{ $slide->id }}">Xóa</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>

                        <!-- Modal Edit -->
                    @endforeach
                    </tbody>
                </table>
                @foreach($slides as $slide)
                    <div class="modal fade" id="editSlide{{$slide->id}}" tabindex="-1" aria-labelledby="editSlide{{$slide->id}}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="createSlideLabel">Chỉnh sửa Slide.</h1>
                                </div>
                                <div class="card-body">
                                    <div class="error">
                                        @include('admin.error')
                                    </div>
                                    <form class="form_slide_update form-edit" id="form_slide_update-{{$slide->id}}" data-id="{{$slide->id}}" method='post' action='{{ route('slides.update',['slide' => $slide]) }}' enctype="multipart/form-data">
                                        @method('Patch')
                                        @csrf
                                        <div class="mb-3 d-flex flex-column image-gallery" id="image-gallery-{{$slide->id}}">
                                            <label
                                                class='form-label'
                                                for='basic-default-fullname'
                                            >Ảnh</label>
                                            <input type="file" name="image" class="slide-input" id="slide-input-{{$slide->id}}" multiple onchange="previewImages(event, {{$slide->id}})">
                                            <div class="image-preview" id="image-preview-{{$slide->id}}"></div>
                                        </div>
                                        <div class='mb-3 w-100 me-3'>
                                            <label
                                                class='form-label'
                                                for='basic-default-fullname'
                                            >Tiêu đề</label>
                                            <input
                                                type='text'
                                                class='form-control title input-field '
                                                id='title-edit-{{$slide->id}}'
                                                placeholder='Nhập tiêu đề'
                                                value="{{$slide->Title}}"
                                                name='title' data-require='Mời nhập Tiêu đề'
                                            />
                                        </div>
                                        <div class='mb-3 w-100'>
                                            <label
                                                class='form-label'
                                                for='basic-default-company'
                                            >Slug</label>
                                            <input
                                                type='text'
                                                class='form-control slug input-field'
                                                id='slug-edit-{{$slide->id}}'
                                                value="{{$slide->slug}}"
                                                placeholder='Nhập Slug'
                                                name='slug' data-require='Mời nhập Slug'
                                            />
                                        </div>
                                        <div class="form-check me-3">
                                            @if($slide->active == 1)
                                                <input class="form-check-input" type="checkbox" checked name="active">
                                            @else
                                                <input class="form-check-input" type="checkbox" name="active">
                                            @endif
                                            <label class="form-check-label" for="defaultCheck3"> Hoạt động </label>
                                        </div>
                                        <div class="modal-footer">
                                            <button type='submit' class='btn btn-success fw-semibold text-dark'>Cập nhật</button>
                                            <button type="button" class="btn btn-secondary fw-semibold" data-bs-dismiss="modal">Đóng</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="pagination mt-4 pb-4">
                    {{ $slides->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
