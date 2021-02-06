@extends('layouts.admin')

@section('title')
    <title>Tạo menu mới</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['key' => 'Tạo', 'name' => 'Menu'])

        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ route('menus.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Tên menu</label>
                                <input
                                    name="name"
                                    id="name"
                                    type="text"
                                    class="form-control"
                                    placeholder="Nhập tên menu"
                                >
                            </div>

                            <div class="form-group">
                                <label for="parent_id">Chọn menu cha</label>
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="0">Chọn menu cha</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
