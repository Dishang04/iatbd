<x-guest-layout>
    <h1 class="formHeader">Inloggen</h1>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form class="form" method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <x-input-label for="email" :value="__('E-mailadres')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />

        <!-- Password -->
        <x-input-label for="password" :value="__('Wachtwoord')" />

        <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="current-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />

        <section class="loginButtonContainer">   
        @if (Route::has('password.request'))
            <a class="forgotPwdButton" href="{{ route('password.request') }}">
                {{ __('Wachtwoord vergeten?') }}
            </a>
        @endif
        
        <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
            <span class="ms-2 text-sm text-gray-600">{{ __('Onthoud mij') }}</span>
        </label>

    </section>


        @if (session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <div class="buttonContainer">
            <input class="optionsButton loginButton" type="submit" value="Inloggen">
            <a class="optionsButton prevButton" href="/">Terug</a>
        </div>
    </form>
</x-guest-layout>