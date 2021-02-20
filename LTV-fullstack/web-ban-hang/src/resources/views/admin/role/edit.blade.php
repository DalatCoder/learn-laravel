@extends('layouts.admin')

@section('title')
    <title>Chỉnh sửa nhóm người dùng</title>
@endsection

@section('style')
    <link href="{{ asset('admin_assets/main.css') }}" rel="stylesheet"/>
@endsection

@section('js')
    <script src="{{ asset('admin_assets/role/create/create.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['key' => 'Chỉnh Sửa', 'name' => 'Nhóm Người Dùng'])

        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <form action="{{ route('roles.update', ['id' => $role->id]) }}" method="POST" class="col-md-12">
                        @csrf
                        @method('PUT')
                        <div>

                            <div class="form-group">
                                <label for="name">Tên nhóm</label>
                                <input
                                    name="name"
                                    id="name"
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Nhập tên nhóm người dùng"
                                    value="{{ empty(old('name')) ? $role->name : old('name') }}"
                                >
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="display_name">Mô tả</label>
                                <input
                                    name="display_name"
                                    id="display_name"
                                    type="text"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Nhập mô tả ngắn"
                                    value="{{ empty(old('display_name')) ? $role->display_name : old('display_name') }}"
                                >
                                @error('display_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>

                        <div>
                            <label for="" class="text-primary">
                                <input type="checkbox" class="checkbox_all">
                                Chọn tất cả
                            </label>
                        </div>

                        @foreach($permissionParents as $permissionParent)
                            <div class="card border-primary my-3">
                                <h4 class="card-header">
                                    <label for=""><input type="checkbox" value=""
                                                         class="checkbox_wrapper"></label> {{ $permissionParent->display_name }}
                                </h4>
                                <div class="row">
                                    @foreach($permissionParent->children as $permissionChildren)
                                        <div class="card-body text-primary col-md-3">
                                            <h5 class="card-title">
                                                <label for="">
                                                    <input type="checkbox" name="permission_ids[]"
                                                           {{ $role_permissions->contains('id', $permissionChildren->id) ? 'checked' : '' }}
                                                           class="checkbox_child"
                                                           value="{{ $permissionChildren->id }}">
                                                </label>
                                                {{ $permissionChildren->display_name }}
                                            </h5>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                        <button type="submit" class="btn btn-primary mb-5">Cập nhật</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
