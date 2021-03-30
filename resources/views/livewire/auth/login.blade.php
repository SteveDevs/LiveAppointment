@section('title', 'Sign in to your account')
<div>
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <a href="{{ url('/') }}">
                <x-logo class="-auto h-16 mx-auto  text-theme-color-light" inner-color="#65CCB8" />
            </a>
        <h2 class="mt-6 text-3xl font-extrabold text-center text-theme-color-light leading-9">
            {{ __('Sign in to your account') }}
        </h2>
        @if (Route::has('register'))
            <p class="mt-2 text-sm text-center text-theme-color-light-blue leading-5 max-w">
                Or
                <a href="{{ route('register') }}" class="font-medium text-theme-color-green hover:text-theme-color-light focus:outline-none focus:underline transition ease-in-out duration-150">
                    {{ __('Create a new account') }}
                </a>
            </p>
        @endif
    </div>

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="px-4 py-8 bg-white shadow sm:rounded-lg sm:px-10">
            <form wire:submit.prevent="authenticate">
                <div>
                    <label for="email" class="block text-sm font-medium text-theme-color-dark text-opacity-80 leading-5">
                        {{ __('Email Address') }}
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="email" id="email" name="email" type="email" required autofocus class="appearance-none block w-full border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded py-3 px-4 mb-3 outline-none @error('email') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-6">
                    <label for="password" class="block text-sm font-medium text-theme-color-dark text-opacity-80 leading-5">
                        {{ __('Password') }}
                    </label>

                    <div class="mt-1 rounded-md shadow-sm">
                        <input wire:model.lazy="password" id="password" type="password" required class="appearance-none block w-full border border-gray-300 text-theme-color-dark ransition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-20 focus:border-theme-color-light-green rounded py-3 px-4 mb-3 outline-none @error('password') border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:ring-red @enderror" />
                    </div>

                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input wire:model.lazy="remember" id="remember" type="checkbox" class="form-checkbox w-4 h-4 appearance-none text-theme-color-green transition ease-in-out duration-150 focus:outline-none focus:ring focus:ring-theme-color-light-green  focus:ring-opacity-60 focus:border-theme-color-light-green" />
                        <label for="remember" class="block ml-2 text-sm text-theme-color-dark text-opacity-80 leading-5">
                            {{ __('Remember') }}
                        </label>
                    </div>

                    <div class="text-sm leading-5">
                        <a href="{{ route('password.request') }}" class="font-medium text-theme-color-green  hover:text-theme-color-dark focus:outline-none focus:underline transition ease-in-out duration-150">
                            {{ __('Forgot your password?') }}
                        </a>
                    </div>
                </div>

                <div class="mt-6">
                    <span class="block w-full rounded-md shadow-sm">
                        <button type="submit" class="flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-theme-color-green border border-transparent rounded-md hover:bg-theme-color-dark focus:outline-none focus:border-theme-light-green  focus:ring-theme-color-green active:bg-theme-color-light-blue transition duration-150 ease-in-out">
                            {{ __('Sign in') }}
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>

