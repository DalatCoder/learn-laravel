@extends('layouts.admin')

@section('title')
    <title>Trang thêm menu</title>
@endsection

@section('js')
    <script src="{{ asset('vendor/sweetAlert2/sweetalert2@10.js') }}"></script>
    <script src="{{ asset('admin_assets/main.js') }}"></script>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Menu', 'key' => 'Tất Cả'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('menus.create') }}" class="btn btn-success float-right my-2">Thêm menu</a>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên menu</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($menus as $index=>$menu)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $menu->name }}</td>
                                    <td>
                                        <a href="{{ route('menus.edit', [$menu->id]) }}"
                                           class="btn btn-warning">Sửa</a>
                                        <a href="{{ route('menus.delete', [$menu->id]) }}"
                                           data-url="{{ route('menus.delete', [$menu->id]) }}"
                                           data-title="Menu"
                                           class="btn btn-danger action-delete">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        {{ $menus->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
