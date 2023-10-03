@extends('admin.main')
@section('contents')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h3 class="fw-bold text-primary py-3 mb-4">{{$title}}</h3>
        <div class="card">
            <div class="d-flex p-4 justify-content-between">
                <h5 class=" fw-bold">Danh sách tải khoản quản trị </h5>
                <button type="button" data-id="" class="btn btn-success text-dark px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#createUser">Thêm mới</button>
            </div>

            <div class="modal fade" id="createUser" tabindex="-1" aria-labelledby="createUserLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="createUserLabel">Thêm mới tài khoản quản trị.</h1>
                        </div>
                        <div class="card-body">
                            <div class="error">
                                @include('admin.error')
                            </div>
                            <form method='POST' action='{{route('user.store')}}'>
                                @csrf
                                <div class='mb-3'>
                                    <label
                                        class='form-label'
                                        for='basic-default-fullname'
                                    >Name</label>
                                    <input
                                        type='text'
                                        class='form-control'
                                        id='name'
                                        placeholder='Input Name'
                                        name='name'
                                    />
                                </div>
                                <div class='mb-3'>
                                    <label
                                        class='form-label'
                                        for='basic-default-company'
                                    >Email</label>
                                    <input
                                        type='text'
                                        class='form-control'
                                        id='email'
                                        placeholder='Input Email'
                                        name='email'
                                    />
                                </div>
                                <div class='mb-3'>
                                    <label
                                        class='form-label'
                                        for='basic-default-email'
                                    >Password</label>
                                    <div class='input-group input-group-merge'>
                                        <input
                                            type='password'
                                            id='password'
                                            class='form-control'
                                            placeholder='Input Password'
                                            name='password'
                                        />

                                    </div>
                                </div>
                                <div class='mb-3 d-flex justify-content-start'>
                                    <div class='mb-3 me-3'>
                                        <label
                                            class='form-label'
                                            for='basic-default-email'
                                        >Level</label>
                                        <div class='input-group input-group-merge'>
                                            <input
                                                type='number'
                                                id='level'
                                                class='form-control'
                                                min='0'
                                                name='level'
                                            />
                                        </div>
                                    </div>
                                    <div class='mb-3 me-3'>
                                        <label
                                            class='form-label'
                                            for='basic-default-email'
                                        >Role</label>
                                        <div class='input-group input-group-merge'>
                                            <input
                                                type='text'
                                                id='role'
                                                class='form-control'
                                                min='0'
                                                name='role'
                                            />
                                        </div>
                                    </div>
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
                <table class="table">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Level</th>
                        <th>Created_at</th>
                        <th>Updated_at</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($users as $user)
                        <tr data-id="{{$user->id}}">
                            <td> {{ $loop->iteration }}</td>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <td>{{$user->level}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>{{$user->updated_at}}</td>
                            <td class="d-flex justify-content-between">
                                <button type="button" data-url="/admin/users/{{$user->id}}" data-id="{{$user->id}}" class="btn btn-danger btnDeleteAsk px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#deleteModal">Xóa</button>
                                <button type="button" data-id="{{$user->id}}" class="btn btn-info btnEditUser text-dark px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#editUser{{$user->id}}">Sửa</button>
                            </td>

                            <!-- Modal Delete -->
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="deleteModalLabel">Bạn có chắc chắn xóa bản ghi này vĩnh viễn không ?</h1>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="delete-forever btn btn-danger" data-id="{{ $user->id }}">Xóa</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tr>

                        <!-- Modal Edit -->
                        <div class="modal fade" id="editUser{{$user->id}}" tabindex="-1" aria-labelledby="editUser{{$user->id}}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="createUserLabel">Chỉnh sửa tài khoản.</h1>
                                    </div>
                                    <div class="card-body">
                                        <form method='post' action='{{ route('user.update',['user' => $user]) }}' class="editUserForm">
                                            @method('PATCH')
                                            @csrf
                                            <div class='mb-3'>
                                                <label
                                                    class='form-label'
                                                    for='basic-default-fullname'
                                                >Name</label>
                                                <input
                                                    type='text'
                                                    class='form-control'
                                                    id='name'
                                                    value="{{$user->name}}"
                                                    placeholder='Input Name'
                                                    name='name'
                                                />
                                            </div>
                                            <div class='mb-3'>
                                                <label
                                                    class='form-label'
                                                    for='basic-default-company'
                                                >Email</label>
                                                <input
                                                    type='text'
                                                    class='form-control'
                                                    id='email'
                                                    value="{{$user->email}}"
                                                    placeholder='Input Email'
                                                    name='email'
                                                />
                                            </div>
                                            <div class='mb-3'>
                                                <label
                                                    class='form-label'
                                                    for='basic-default-email'
                                                >Password</label>
                                                <div class='input-group input-group-merge'>
                                                    <input
                                                        type='password'
                                                        id='password'
                                                        class='form-control'
                                                        value="{{$user->password}}"
                                                        placeholder='Input Password'
                                                        name='password'
                                                    />

                                                </div>
                                            </div>
                                            <div class='mb-3 d-flex justify-content-start'>
                                                <div class='mb-3 me-3'>
                                                    <label
                                                        class='form-label'
                                                        for='basic-default-email'
                                                    >Level</label>
                                                    <div class='input-group input-group-merge'>
                                                        <input
                                                            type='number'
                                                            id='level'
                                                            class='form-control'
                                                            value="{{$user->level}}"
                                                            min='0'
                                                            name='level'
                                                        />
                                                    </div>
                                                </div>
                                                <div class='mb-3 me-3'>
                                                    <label
                                                        class='form-label'
                                                        for='basic-default-email'
                                                    >Role</label>
                                                    <div class='input-group input-group-merge'>
                                                        <input
                                                            type='text'
                                                            id='role'
                                                            value="{{$user->role}}"
                                                            class='form-control'
                                                            min='0'
                                                            name='role'
                                                        />
                                                    </div>
                                                </div>
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
                    </tbody>
                </table>
                <div class="pagination mt-4 pb-4">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
