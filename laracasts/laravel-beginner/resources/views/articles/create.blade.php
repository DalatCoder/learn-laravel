@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
@endsection

@section('content')
    <div id="wrapper">
        <div id="page" class="container">
            <h1 class="heading has-text-weight-bold is-size-4">New Article</h1>

            <form action="/articles" method="POST">
                @csrf

                <div class="field">
                    <label for="title" class="label"></label>

                    <div class="control">
                        <input type="text" class="input" id="title" name="title">
                    </div>
                </div>

                <div class="field">
                    <label class="label" for="excerpt">Excerpt</label>

                    <div class="control">
                        <textarea class="textarea" name="excerpt" id="excerpt" cols="30" rows="10"></textarea>
                    </div>
                </div>

                <div class="field">
                    <label for="body" class="label">Body</label>

                    <div class="control">
                        <textarea class="textarea" name="body" id="body" cols="30" rows="10"></textarea>
                    </div>
                </div>

                <div class="field is-grouped">
                    <p class="control">
                        <button class="button is-link" type="submit">
                            Submit
                        </button>
                    </p>
                </div>
            </form>
        </div>
    </div>
@endsection
