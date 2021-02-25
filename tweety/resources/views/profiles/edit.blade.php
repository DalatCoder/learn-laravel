@component('components.app')
    <form method="POST"
          action="{{ $user->path() }}">
        @csrf
        @method('PATCH')

        <div class="mb-6">
            <label for="name"
                   class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>
            <input type="text"
                   id="name"
                   name="name"
                   class="border border-gray-400 p-2 w-full"
                   value="{{ $user->name }}"
                   required>

            @error('name')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="username"
                   class="block mb-2 uppercase font-bold text-xs text-gray-700">Username</label>
            <input type="text"
                   id="username"
                   name="username"
                   class="border border-gray-400 p-2 w-full"
                   value="{{ $user->username }}"
                   required>

            @error('username')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="email"
                   class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
            <input type="email"
                   id="email"
                   name="email"
                   class="border border-gray-400 p-2 w-full"
                   value="{{ $user->email }}"
                   required>

            @error('email')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password"
                   class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>
            <input type="password"
                   id="password"
                   name="password"
                   class="border border-gray-400 p-2 w-full"
            >

            @error('password')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password_confirmation"
                   class="block mb-2 uppercase font-bold text-xs text-gray-700">Password Comfirmation</label>
            <input type="password"
                   id="password_confirmation"
                   name="password_confirmation"
                   class="border border-gray-400 p-2 w-full"
            >

            @error('password_confirmation')
            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit"
                    class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit
            </button>
        </div>
    </form>
@endcomponent


