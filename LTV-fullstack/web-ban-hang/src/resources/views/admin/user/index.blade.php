@extends('layouts.admin')

@section('title')
    <title>Trang danh sách tài khoản người dùng</title>
@endsection

@section('js')
    <script src="{{ asset('vendor/sweetAlert2/sweetalert2@10.js') }}"></script>
    <script src="{{ asset('admin_assets/main.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Tài Khoản Người Dùng', 'key' => 'Tất Cả'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('users.create') }}" class="btn btn-success float-right my-2">Thêm người dùng</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên tài khoản</th>
                                <th scope="col">Email</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $index=>$user)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('users.edit', [$user->id]) }}"
                                           class="btn btn-warning">Sửa</a>
                                        <a href="{{ route('users.delete', [$user->id]) }}"
                                           data-url="{{ route('users.delete', [$user->id]) }}"
                                           data-title="Tài khoản người dùng"
                                           class="btn btn-danger action-delete">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
