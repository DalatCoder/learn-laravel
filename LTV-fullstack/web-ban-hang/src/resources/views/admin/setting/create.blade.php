@extends('layouts.admin')

@section('title')
    <title>Tạo cấu hình mới</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('admin_assets/setting/create/create.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['key' => 'Tạo', 'name' => 'Cấu Hình'])

        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ route('settings.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="config_key">Tên cấu hình</label>
                                <input
                                    name="config_key"
                                    id="config_key"
                                    type="text"
                                    value="{{ old('config_key') }}"
                                    class="form-control @error('config_key') is-invalid @enderror"
                                    placeholder="Nhập tên cấu hình"
                                >
                                @error('config_key')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            @if(request()->get('type') === 'text')
                                <div class="form-group">
                                    <label for="config_value">Giá trị</label>
                                    <input
                                        name="config_value"
                                        id="config_value"
                                        type="text"
                                        value="{{ old('config_value') }}"
                                        class="form-control @error('config_value') is-invalid @enderror"
                                        placeholder="Nhập giá trị"
                                    >
                                    @error('config_value')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @elseif(request()->get('type') === 'textarea')
                                <div class="form-group">
                                    <label for="config_value">Giá trị</label>
                                    <textarea name="config_value" id="config_value" rows="5"
                                              class="form-control @error('config_value') is-invalid @enderror"
                                              placeholder="Nhập giá trị cấu hình">{{ old('config_value') }}</textarea>
                                    @error('config_value')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endif

                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
