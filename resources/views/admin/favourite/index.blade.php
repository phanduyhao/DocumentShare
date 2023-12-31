@extends('admin.main')
@section('contents')
    <div class="container-fluid flex-grow-1 container-p-y">
        <h3 class="fw-bold text-primary py-3 mb-4">{{$title}}</h3>
        <div class="card">
            <div class="d-flex p-4 justify-content-between">
                <h5 class=" fw-bold">Danh sách yêu thích</h5>
            </div>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr class="text-center">
                        <th>ID</th>
                        <th>User</th>
                        <th>Favourite Document</th>
                    </tr>
                    </thead>
                    <tbody class="table-border-bottom-0 text-center">
                    @foreach($favourites as $favourite)
                        <tr data-id="{{$favourite->id}}">
                            <td>{{$favourite->id}}</td>
                            <td>{{$favourite->User->name}}</td>
                            <td>{{$favourite->Document->title}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="pagination mt-4 pb-4">
                    {{ $favourites->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
