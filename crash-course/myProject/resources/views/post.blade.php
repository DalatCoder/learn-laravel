@extends('layouts.app')

@section('content')
    <h1>Post detail page for post with id of {{ $id }}</h1>
    <p>{{ $title }}</p>
    <p>{{ $author }}</p>
@endsection

@section('script')
    <script>
        console.log('Post detail page');
    </script>
@endsection
