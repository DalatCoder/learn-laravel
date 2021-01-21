@extends('layouts.app')

@section('title')
    Todos List
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-5">
                <div class="card-header text-center">
                    Todos
                </div>
                <div class="card-body">
                    <a href="/new-todo" class="btn btn-primary my-3">New todo</a>
                    <ul class="list-group">
                        @foreach($todos as $todo)
                            <li class="list-group-item">
                                {{ $todo->name }}
                                <a href="todos/{{ $todo->id }}" class="btn btn-info btn-sm float-right">View</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
