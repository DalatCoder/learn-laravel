@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">Create new post</div>
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST"  enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" autocomplete="off" placeholder="Title" name="title"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" id="description" autocomplete="off" placeholder="Description" name="description"
                           class="form-control">
                </div>

                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea name="content" id="content" cols="" rows="10" placeholder="Content"
                              class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="published_at">Published At</label>
                    <input type="date" id="published_at" name="published_at" class="form-control">
                </div>

                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block">Create Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection
