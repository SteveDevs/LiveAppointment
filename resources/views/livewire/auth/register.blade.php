@section('title', 'Create a new account')

<div id="register-container">
    <div class="sm:mx-auto sm:w-full sm:max-w-md text-center">
        <a href="{{ url('/') }}">
                <x-logo class="-auto h-16 mx-auto text-theme-color-dark" inner-color="#57BA98" />
            </a>
        <h2 class="mt-6 text-3xl font-extrabold text-center text-theme-color-light-blue leading-9">
            {{ __('Create a new account') }}
        </h2>

        <p class="mt-2 text-sm text-center text-theme-color-green leading-5 max-w">
            Or
            <a href="{{ route('login') }}" class="font-medium text-theme-color-green hover:text-theme-color-dark  focus:outline-none focus:underline transition ease-in-out duration-150">
                {{ __('Sign in to your account') }}
            </a>
        </p>
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <form wire:submit.prevent="register">
                <div>
                    <label for="name" class="block text-sm font-medium text-color-dark text-opacity-80 leading-5">
                        {{ __('Name') }}
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="name" id="name" type="text" required autofocus class="appearance-none block w-full border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded py-3 px-4 mb-3 outline-none @error('name') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('name')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="email" class="block text-sm font-medium text-color-dark text-opacity-80 leading-5">
                        {{ __('Email Address') }}
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="email" id="email" type="email" required class="appearance-none block w-full border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded py-3 px-4 mb-3 outline-none @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium text-color-dark text-opacity-80 leading-5">
                        {{ __('Password') }}
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="password" id="password" type="password" required class="appearance-none block w-full border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded py-3 px-4 mb-3 outline-none @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-color-dark text-opacity-80 leading-5">
                        {{ __('Confirm Password') }}
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="passwordConfirmation" id="password_confirmation" type="password" required class="appearance-none block w-full border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded py-3 px-4 mb-3 outline-none" />
                    </div>
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-theme-color-green border border-transparent rounded-md hover:bg-theme-color-dark focus:outline-none focus:border-theme-color-light focus:ring-theme-color-light-blue active:bg-theme-color-light-green transition duration-150 ease-in-out">
                            {{ __('Register') }}
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>
