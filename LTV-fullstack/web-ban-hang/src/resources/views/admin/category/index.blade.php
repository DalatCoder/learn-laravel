@extends('layouts.admin')

@section('title')
    <title>Trang danh mục sản phẩm</title>
@endsection

@section('js')
    <script src="{{ asset('vendor/sweetAlert2/sweetalert2@10.js') }}"></script>
    <script src="{{ asset('admin_assets/main.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
    @include('partials.content-header', ['name' => 'Danh Mục', 'key' => 'Tất Cả'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('categories.create') }}" class="btn btn-success float-right my-2">Thêm danh
                            mục</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($categories as $index=>$category)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', [$category->id]) }}"
                                           class="btn btn-warning">Sửa</a>
                                        <a href="{{ route('categories.delete', [$category->id]) }}"
                                           data-url="{{ route('categories.delete', [$category->id]) }}"
                                           data-title="Danh mục sản phẩm"
                                           class="btn btn-danger action-delete">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        {{ $categories->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
