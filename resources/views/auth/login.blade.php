<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
   <div class="text-center mb-6">
    <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-100">
	Bem-vindo ao Auth System
    </h1>
    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
	Faça login para acessar sua conta.
    </p>
   </div>

    <form method="POST" action="{{ route('login') }}">
	@csrf

	<!-- Email Address -->
	<div>
	    <x-input-label for="email" :value="__('Email')" />
	    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
	    <x-input-error :messages="$errors->get('email')" class="mt-2" />
	</div>

	<!-- Password -->
	<div class="mt-4">
	    <x-input-label for="password" :value="__('Password')" />

	    <x-text-input id="password" class="block mt-1 w-full"
			    type="password"
			    name="password"
			    required autocomplete="current-password" />

	    <x-input-error :messages="$errors->get('password')" class="mt-2" />
	</div>

	<!-- Remember Me -->
	<div class="block mt-4">
	    <label for="remember_me" class="inline-flex items-center">
		<input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
		<span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
	    </label>
	</div>

	<div class="mt-6 space-y-4">
    		<x-primary-button class="w-full justify-center">
    		    {{ __('Log in') }}
    		</x-primary-button>

    		<a
    		    href="{{ route('register') }}"
    		    class="inline-flex w-full items-center justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 shadow-sm transition hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-200 dark:hover:bg-gray-800"
    		>
    		    {{ __('Create account') }}
    		</a>

    		@if (Route::has('password.request'))
    		    <div class="text-center">
    		        <a
    		            href="{{ route('password.request') }}"
    		            class="text-sm text-gray-600 underline hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-200"
    		        >
    		            {{ __('Forgot your password?') }}
    		        </a>
    		    </div>
    		@endif
	</div>
	
    </form>
</x-guest-layout>
