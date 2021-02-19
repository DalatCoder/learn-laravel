@extends('layouts.admin')

@section('title')
    <title>Tạo nhóm người dùng mới</title>
@endsection

@section('style')
    <link href="{{ asset('admin_assets/main.css') }}" rel="stylesheet"/>
@endsection

@section('js')
    <script src="{{ asset('admin_assets/role/create/create.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['key' => 'Tạo', 'name' => 'Nhóm Người Dùng'])

        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <form action="{{ route('users.store') }}" method="POST" class="col-md-12">
                        @csrf
                        <div>

                            <div class="form-group">
                                <label for="name">Tên nhóm</label>
                                <input
                                    name="name"
                                    id="name"
                                    type="text"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Nhập tên nhóm người dùng"
                                    value="{{ old('name') }}"
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
                                    value="{{ old('display_name') }}"
                                >
                                @error('display_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>

                        @foreach($permissionParents as $permissionParent)
                            <div class="card border-primary my-3">
                                <h4 class="card-header">
                                    <label for=""><input type="checkbox" value=""
                                                         class="checkbox_wrapper"></label> {{ $permissionParent->name }}
                                </h4>
                                <div class="row">
                                    @foreach($permissionParent->children as $permissionChildren)
                                        <div class="card-body text-primary col-md-3">
                                            <h5 class="card-title">
                                                <label for="">
                                                    <input type="checkbox" name="permission_ids[]"
                                                           class="checkbox_child"
                                                           value="{{ $permissionChildren->id }}">
                                                </label>
                                                {{ $permissionChildren->name }}
                                            </h5>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach

                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
