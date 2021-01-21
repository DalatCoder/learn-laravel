@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Create Categories</div>
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

            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" autocomplete="off"
                           placeholder="Category Name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <input type="submit" value="Add Category" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
