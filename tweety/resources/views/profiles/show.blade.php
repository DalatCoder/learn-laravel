@component('components.app')

    <header class="mb-6 relative">
        <div class="relative">
            <img src="https://picsum.photos/700/223"
                 alt="Cover"
                 class="mb-2 rounded-lg">

            <img src="{{ $user->avatar }}"
                 alt=""
                 class="rounded-full absolute bottom-0 transform -translate-x-1/2 translate-y-1/2"
                 style="left: 50%"
                 width="150"
            >
        </div>

        <div class="flex justify-between items-center mb-6">
            <div style="max-width: 270px">
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div class="flex">
                @can('edit', $user)
                    <a class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2"
                       href="{{ $user->path('edit') }}">Edit Profile</a>
                @endcan

                @component('components.follow-button', ['user' => $user])@endcomponent
            </div>
        </div>

        <p class="text-sm">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci alias aliquid atque aut consequatur
            cumque cupiditate delectus distinctio eligendi harum ipsum labore maiores mollitia numquam odio perferendis
            recusandae, rerum sapiente sint veniam veritatis vitae voluptate! Ab accusantium ad adipisci corporis
            ducimus, eum inventore, ipsa perspiciatis saepe sed totam veritatis!
        </p>
    </header>

    @include('_timeline', [
        'tweets' => $tweets
    ])

@endcomponent


