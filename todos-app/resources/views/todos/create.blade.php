@extends('layouts.app')

@section('content')
    <h1 class="text-center my-5">Create New Todo</h1>

    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Fill out this form to create a new todo</div>
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
                    <form action="/store-todo" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="sr-only">Name</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Todo name"
                                   autocomplete="off" value="">
                        </div>
                        <div class="form-group">
                            <label for="description" class="sr-only">Description</label>
                            <textarea placeholder="Todo description" name="description" id="description" rows="7"
                                      class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
