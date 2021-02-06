@extends('layouts.admin')

@section('title')
    <title>Chỉnh sửa menu</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['key' => 'Chỉnh Sửa', 'name' => 'Menu'])

        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ route('menus.update', ['id' => $menu->id]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Tên menu</label>
                                <input
                                    name="name"
                                    id="name"
                                    type="text"
                                    class="form-control"
                                    placeholder="Nhập tên danh mục"
                                    value="{{ $menu->name }}"
                                >
                            </div>

                            <div class="form-group">
                                <label for="parent_id">Chọn menu cha</label>
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="0">Chọn menu cha</option>
                                    {!! $optionSelect !!}
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

