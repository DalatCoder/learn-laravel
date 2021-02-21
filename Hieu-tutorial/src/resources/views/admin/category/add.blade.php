@extends('admin_layout')

@section('title', 'Tạo danh mục sản phẩm')

@section('content')
    <div class="row">
        @if(\Illuminate\Support\Facades\Session::get('message'))
            <div class="col-lg-12" id="notification">
                <div class="alert alert-success">{{\Illuminate\Support\Facades\Session::get('message')}}</div>
            </div>
            @php \Illuminate\Support\Facades\Session::put('message', null); @endphp

            <script>
                setTimeout(function () {
                    document.getElementById('notification').style.display = 'none';
                }, 3000);
            </script>
        @endif

        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Tạo danh mục sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form" method="POST" action="{{ route('categories.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="category_name">Tên danh mục</label>
                                <input type="text" class="form-control @error('category_name') is-invalid @enderror"
                                       id="category_name" name="category_name"
                                       placeholder="Nhập tên danh mục"
                                       value="{{ old('category_name') }}"
                                >
                                @error('category_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category_desc">Mô tả</label>
                                <textarea style="resize: none"
                                          class="form-control @error('category_desc') is-invalid @enderror"
                                          id="category_desc"
                                          name="category_desc" rows="7"
                                          placeholder="Nhập tên danh mục">{{ old('category_desc') }}</textarea>
                                @error('category_desc')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category_status">Trạng thái</label>
                                <select name="category_status" id="category_status"
                                        class="form-control @error('category_status') is-invalid @enderror">
                                    <option value="">Chọn chế độ</option>
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                                @error('category_status')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" name="add_category" class="btn btn-info">Thêm mới</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection

