@extends('layouts.admin')

@section('title')
    <title>Chỉnh sửa thông tin người dùng</title>
@endsection

@section('style')
    <link href="{{ asset('vendor/select2/select2.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin_assets/main.css') }}" rel="stylesheet"/>
    <link href="{{ asset('admin_assets/user/create/create.css') }}" rel="stylesheet"/>
@endsection

@section('js')
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('admin_assets/user/create/create.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['key' => 'Chỉnh Sửa', 'name' => 'Người Dùng'])

        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ route('users.update', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Tên tài khoản</label>
                                <input
                                    name="name"
                                    id="name"
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Nhập tên tài khoản"
                                    value="{{ empty(old('name')) ? $user->name : old('name') }}"
                                >
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                    name="email"
                                    id="email"
                                    type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Nhập email"
                                    value="{{ empty(old('email')) ? $user->email : old('email') }}"
                                >
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Mật khẩu</label>
                                <input
                                    name="password"
                                    id="password"
                                    type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Nhập mật khẩu"
                                >
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="role_id">Chọn nhóm người dùng</label>
                                <select name="role_id[]" id="role_id"
                                        class="form-control select2_init @error('role_id') is-invalid @enderror"
                                        multiple>
                                    <option value=""></option>
                                    @foreach($roles as $role)
                                        <option
                                            {{ $user_roles->contains('id', $role->id) ? 'selected' : '' }}
                                            value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>

                                @error('role_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
