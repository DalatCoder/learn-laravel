@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Create Categories</div>
        <div class="card-body">
            <form action="">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" autocomplete="off"
                           placeholder="Category Name">
                </div>
                <div class="form-group">
                    <input type="submit" value="Add Category" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
@endsection
