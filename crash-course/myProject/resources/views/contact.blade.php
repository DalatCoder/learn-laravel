@extends('layouts.app')

@section('content')
    <h1>Contact Page</h1>

    @if(isset($people) && count($people) > 0)

        <h3>All customers:</h3>

        <ul>
            @foreach($people as $person)
                <li>{{ $person }}</li>
            @endforeach
        </ul>

    @else
        <p>There is no one to show</p>
    @endif

@endsection
