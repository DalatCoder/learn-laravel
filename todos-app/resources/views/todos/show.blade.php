@extends('layouts.app')

@section('title')
    @if($todo == null)
        Todo Not Found
    @else
        Todo Detail - {{ $todo->name }}
    @endif
@endsection

@section('content')
    @if($todo == null)
        TODO NOT FOUND
    @else
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center my-5">{{ $todo->name }}</h1>

                <div><a href="/todos" class="btn btn-secondary my-3">Back</a></div>
                <div class="card">
                    <div class="card-header">Detail</div>
                    <div class="card-body">
                        {{ $todo->description }}
                    </div>
                </div>

                <a href="/todos/{{ $todo->id }}/edit" class="btn btn-info my-3">Edit</a>
            </div>
        </div>
    @endif
@endsection
