@extends('layouts.admin')

@section('title')
    <title>Trang cấu hình</title>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('admin_assets/setting/index/index.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Cấu hình', 'key' => 'Tất Cả'])

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group float-right setting-action">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                Thêm cấu hình
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('settings.create') . '?type=text' }}">Chuỗi đơn giản</a></li>
                                <li><a href="{{ route('settings.create') . '?type=textarea' }}">Nhúng HTML</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên cấu hình</th>
                                <th scope="col">Giá trị</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>

                            {{--                            @foreach($menus as $index=>$menu)--}}
                            {{--                                <tr>--}}
                            {{--                                    <th scope="row">{{ $index + 1 }}</th>--}}
                            {{--                                    <td>{{ $menu->name }}</td>--}}
                            {{--                                    <td>--}}
                            {{--                                        <a href="{{ route('menus.edit', [$menu->id]) }}"--}}
                            {{--                                           class="btn btn-warning">Sửa</a>--}}
                            {{--                                        <a href="{{ route('menus.delete', [$menu->id]) }}"--}}
                            {{--                                           class="btn btn-danger">Xóa</a>--}}
                            {{--                                    </td>--}}
                            {{--                                </tr>--}}
                            {{--                            @endforeach--}}

                            </tbody>
                        </table>
                    </div>

                    <div class="col-md-12">
                        {{--                        {{ $menus->links() }}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
