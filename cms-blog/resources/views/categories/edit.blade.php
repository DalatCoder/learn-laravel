@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Edit Category</div>
        <div class="card-body">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-group">
                        @foreach($errors->all() as $error)
                            <li class="list-group-item text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" autocomplete="off"
                           placeholder="Category Name" value="{{ $category->name }}">
                </div>
                <div class="form-group">
                    <input type="submit" value="Update Category" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
