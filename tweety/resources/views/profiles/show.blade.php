@extends('layouts.app')

@section('content')

    <header class="mb-6 relative">
        <img src="https://picsum.photos/700/223" alt="Cover" class="mb-2 rounded-lg">

        <div class="flex justify-between items-center mb-4">
            <div>
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div>
                <a class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2" href="">Edit Profile</a>
                <a class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs" href="">Follow Me</a>
            </div>
        </div>

        <p class="text-sm">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci alias aliquid atque aut consequatur cumque cupiditate delectus distinctio eligendi harum ipsum labore maiores mollitia numquam odio perferendis recusandae, rerum sapiente sint veniam veritatis vitae voluptate! Ab accusantium ad adipisci corporis ducimus, eum inventore, ipsa perspiciatis saepe sed totam veritatis!
        </p>

        <img src="{{ $user->getAvatarAttribute() }}" alt=""
             class="rounded-full absolute"
             style="width: 150px; left: calc(50% - 75px); top: 138px;"
        >
    </header>

    @include('_timeline', [
        'tweets' => $user->tweets
    ])
@endsection


