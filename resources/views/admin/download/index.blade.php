@extends('admin.main')
@section('contents')
    <div class="container-fluid flex-grow-1 container-p-y">
        <h3 class="fw-bold text-primary py-3 mb-4">{{$title}}</h3>
        <div class="card">
            <div class="d-flex p-4 justify-content-between">
                <h5 class=" fw-bold">Danh sách tải xuống</h5>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr class="text-center">
                        <th>STT</th>
                        <th>User</th>
                        <th>Document</th>
                        <th>Downloads</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0 text-center">
                    @foreach($downloads as $download)
                        <tr data-id="{{$download->id}}">
                            <td> {{ $loop->iteration }}</td>
                            <td>{{$download->User->name}}</td>
                            <td>{{$download->Document->title}}</td>
                            <td>{{$download->download_count}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination mt-4 pb-4">
                    {{ $downloads->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
