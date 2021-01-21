@extends('layouts.app')

@section('content')
    <h1 class="text-center my-5">Update Todo</h1>

    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Fill out this form to update the task</div>
                <div class="card-body">
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-group">
                                @foreach($errors->all() as $error)
                                    <li class="list-group-item">
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="/update-todo" method="POST">
                        @csrf
                        <input type="hidden" name="todo_id" value="{{ $todo->id }}">
                        <div class="form-group">
                            <label for="name" class="sr-only">Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Todo name"
                                   autocomplete="off" value="{{ $todo->name }}">
                        </div>
                        <div class="form-group">
                            <label for="description" class="sr-only">Description</label>
                            <textarea placeholder="Todo description" name="description" id="description" rows="7"
                                      class="form-control">{{ $todo->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
