<form method="POST"
      action="/profiles/{{ $user->name }}/follow">
    @csrf

    @if(auth()->id() != $user->id)

        <button type="submit"
                class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs"
        >
            {{ auth()->user()->following($user) ? 'Unfollow Me' : 'Follow Me' }}
        </button>

    @endif
</form>
