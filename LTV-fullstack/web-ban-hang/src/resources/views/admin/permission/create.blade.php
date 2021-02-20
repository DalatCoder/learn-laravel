@extends('layouts.admin')

@section('title')
    <title>Tạo nhóm quyền mới</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('admin_assets/main.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['key' => 'Tạo', 'name' => 'Nhóm Quyền'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('permissions.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="module_parent">Chọn tài nguyên</label>
                                <select name="module_parent" id="module_parent"
                                        class="form-control @error('module_parent') is-invalid @enderror">
                                    <option value="">Chọn tài nguyên</option>
                                    @foreach(array_keys($table_modules) as $key)
                                        <option value="{{ $key . '@' . $table_modules[$key] }}">{{ $table_modules[$key] }}</option>
                                    @endforeach
                                </select>
                                @error('module_parent')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    @foreach(array_keys($module_children) as $key)
                                        <div class="col-md-3">
                                            <label for="">
                                                <input type="checkbox" name="module_children[]" value="{{ $key . '@' . $module_children[$key] }}">
                                                {{ $module_children[$key] }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
