@extends('layouts.admin')

@section('title')
    <title>Chỉnh sửa danh mục sản phẩm</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['key' => 'Chỉnh Sửa', 'name' => 'Danh Mục'])

        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <form action="{{ route('categories.update', ['id' => $category->id]) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Tên danh mục</label>
                                <input
                                    name="name"
                                    id="name"
                                    type="text"
                                    class="form-control"
                                    placeholder="Nhập tên danh mục"
                                    value="{{ $category->name }}"
                                >
                            </div>

                            <div class="form-group">
                                <label for="parent_id">Chọn danh mục cha</label>
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="0">Chọn danh mục cha</option>
                                    {!! $htmlSelect !!}
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

