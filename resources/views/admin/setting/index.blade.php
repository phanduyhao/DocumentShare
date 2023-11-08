@extends('admin.main')
@section('contents')
    <div class="container-fluid flex-grow-1 container-p-y">
        <h3 class="fw-bold text-primary py-3 mb-4">{{$title}}</h3>
        <div class="card">
            <div class="d-flex p-4 justify-content-between">
                <h5 class=" fw-bold">Thiết lập cài đặt.</h5>
            </div>

            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr class="text-center">
                        <th>Register Point</th>
                        <th>Document Accepting Point</th>
                        <th>Documents Home Number</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($settings as $setting)
                        <tr data-id="{{$setting->id}}" class="text-center">
                            <td>{{$setting->score_register}}</td>
                            <td>{{$setting->score_doc_ok}}</td>
                            <td>{{$setting->docs_home}}</td>
                            <td class="">
                                <button type="button" data-id="{{$setting->id}}" class="btn btn-edit btn-info btnEditSetting text-dark px-2 py-1 fw-bolder" data-bs-toggle="modal" data-bs-target="#editSetting{{$setting->id}}">Sửa</button>
                            </td>
                        </tr>

                        <!-- Modal Edit -->

                    @endforeach
                    </tbody>
                </table>
                @foreach($settings as $setting)
                    <div class="modal fade" id="editSetting{{$setting->id}}" tabindex="-1" aria-labelledby="editSetting{{$setting->id}}Label" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="createSettingLabel">Thiết lập lại.</h1>
                                </div>
                                <div class="card-body">
                                    <div class="error">
                                        @include('admin.error')
                                    </div>
                                    <form class="form_setting_update form-edit" id="form_setting_update-{{$setting->id}}" data-id="{{$setting->id}}" method='post' action='{{ route('settings.update',['setting' => $setting]) }}'>
                                        @method('PATCH')
                                        @csrf
                                        <div class='mb-3'>
                                            <label
                                                class='form-label'
                                                for='basic-default-fullname'
                                            >Register Point</label>
                                            <input
                                                type='text'
                                                class='form-control title'
                                                id='score_register-edit-{{$setting->id}}'
                                                placeholder='Input Score'
                                                name='score_register'
                                                value="{{$setting->score_register}}"
                                            />
                                        </div>
                                        <div class='mb-3'>
                                            <label
                                                class='form-label'
                                                for='basic-default-fullname'
                                            >document accepting point</label>
                                            <input
                                                type='text'
                                                class='form-control title'
                                                id='score_accept_admin-edit-{{$setting->id}}'
                                                placeholder='Input Score'
                                                name='score_admin_accept'
                                                value="{{$setting->score_doc_ok}}"
                                            />
                                        </div>
                                        <div class='mb-3'>
                                            <label
                                                class='form-label'
                                                for='basic-default-fullname'
                                            >Documents Home Number</label>
                                            <input
                                                type='text'
                                                class='form-control title'
                                                id='docs_home-edit-{{$setting->id}}'
                                                placeholder='Input Score'
                                                name='docs_home'
                                                value="{{$setting->docs_home}}"
                                            />
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
            </div>
        </div>
    </div>
@endsection
