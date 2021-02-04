@extends('layouts.app')

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            @forelse($articles as $article)
                <div class="content">
                    <div class="title">
                        <h2><a href="{{ $article->path() }}">{{ $article->title }}</a></h2>
                    </div>

                    <p>
                        <img src="{{ asset('images/banner.jpg') }}" alt="" class="image image-full"/>

                    </p>

                    <p>
                        {!! $article->excerpt !!}
                    </p>
                </div>

            @empty
                <p>No relevant articles yet.</p>

            @endforelse
        </div>
    </div>
@endsection
