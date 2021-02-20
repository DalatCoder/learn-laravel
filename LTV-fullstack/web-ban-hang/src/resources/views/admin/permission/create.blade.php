@extends('layouts.admin')

@section('title')
    <title>Tạo nhóm quyền mới</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['key' => 'Tạo', 'name' => 'Nhóm Quyền'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('menus.store') }}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="parent_id">Chọn nhóm phân quyền</label>
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="0">Chọn nhóm phân quyền</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">
                                            <input type="checkbox" value="list">
                                            Xem danh sách
                                        </label>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">
                                            <input type="checkbox" value="add">
                                            Tạo mới
                                        </label>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">
                                            <input type="checkbox" value="edit">
                                            Cập nhật
                                        </label>
                                    </div>

                                    <div class="col-md-3">
                                        <label for="">
                                            <input type="checkbox" value="delete">
                                            Xóa
                                        </label>
                                    </div>
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
