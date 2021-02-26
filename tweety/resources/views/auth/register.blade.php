@component('components.master')
    <div class="container mx-auto flex justify-center mb-10">
        <div class="px-10 py-8 bg-gray-200 border border-gray-300 rounded-lg">
            <div class="col-md-10">
                <div class="font-bold text-lg mb-4">Register</div>

                <form method="POST"
                      action="{{ route('register') }}">
                    @csrf

                    <div class="mb-6">
                        <label for="username"
                               class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Username
                        </label>

                        <input type="text"
                               class="border border-gray-400 p-2 w-full"
                               name="username"
                               id="username"
                               autocomplete="username"
                               value="{{ old('username') }}"
                               required>

                        @error('username')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="name"
                               class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Name
                        </label>

                        <input type="name"
                               class="border border-gray-400 p-2 w-full"
                               name="name"
                               id="name"
                               value="{{ old('name') }}"
                               required>

                        @error('name')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="email"
                               class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Email
                        </label>

                        <input type="email"
                               class="border border-gray-400 p-2 w-full"
                               name="email"
                               id="email"
                               autocomplete="email"
                               value="{{ old('email') }}"
                               required>

                        @error('email')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password"
                               class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Password
                        </label>

                        <input type="password"
                               class="border border-gray-400 p-2 w-full"
                               name="password"
                               id="password"
                               autocomplete="current-password"
                               value="{{ old('password') }}"
                               required>

                        @error('password')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="password_confirmation"
                               class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Password Confirmation
                        </label>

                        <input type="password"
                               class="border border-gray-400 p-2 w-full"
                               name="password_confirmation"
                               id="password_confirmation"
                               autocomplete="current-password"
                               value="{{ old('password_confirmation') }}"
                               required>

                        @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit"
                                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mr-2">
                            Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endcomponent
