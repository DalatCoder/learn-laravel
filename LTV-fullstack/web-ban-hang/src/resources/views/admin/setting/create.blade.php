@extends('layouts.admin')

@section('title')
    <title>Tạo cấu hình mới</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['key' => 'Tạo', 'name' => 'Cấu Hình'])

        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ route('menus.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="config_key">Tên cấu hình</label>
                                <input
                                    name="config_key"
                                    id="config_key"
                                    type="text"
                                    class="form-control"
                                    placeholder="Nhập tên cấu hình"
                                >
                            </div>

                            @if(request()->get('type') === 'text')
                                <div class="form-group">
                                    <label for="config_value">Giá trị</label>
                                    <input
                                        name="config_value"
                                        id="config_value"
                                        type="text"
                                        class="form-control"
                                        placeholder="Nhập giá trị"
                                    >
                                </div>
                            @elseif(request()->get('type') === 'textarea')
                                <div class="form-group">
                                    <label for="config_value">Giá trị</label>
                                    <textarea name="config_value" id="config_value" rows="5" class="form-control"
                                              placeholder="Nhập giá trị cấu hình"></textarea>
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
