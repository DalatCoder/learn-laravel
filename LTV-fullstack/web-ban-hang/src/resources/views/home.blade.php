@extends('layouts.admin')

@section('title')
    <title>Trang quản trị</title>
@endsection

@section('content')
    <div class="content-wrapper">
        @include('partials.content-header', ['name' => 'Trang Chủ', 'key' => ''])

        <div class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <h1>Trang chu</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
