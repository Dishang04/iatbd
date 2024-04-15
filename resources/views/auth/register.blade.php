<x-guest-layout>
    <h1 class="formHeader">Registreren</h1>
    <form class="form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <x-input-label for="name" :value="__('Naam')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />

        <!-- Phone -->
        <x-input-label for="phone" :value="__('Telefoonnummer')" />
        <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
      
        <!-- Address -->
        <x-input-label for="address" :value="__('Adres')" />
        <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
        <x-input-error :messages="$errors->get('address')" class="mt-2" />
        
        <!-- CHOICE -->
        <p>Ik:</p>
        <input type="radio" id="sitterChoiceYes" name="sitterChoice" value="sitter" {{ old('sitter') == 'true' ? 'checked' : '' }}>
        <label for="sitterChoiceYes">ben een oppasser</label><br>
        <input type="radio" id="sitterChoiceNo" name="sitterChoice" value="owner" {{ old('sitter') == 'false' ? 'checked' : '' }}>
        <label for="sitterChoiceNo">zoek een oppasser</label><br>
        <x-input-error :messages="$errors->get('sitter')" class="mt-2" />

        <!-- Email Address -->
        <x-input-label for="email" :value="__('E-mailadres')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />

        <!-- image -->
        {{-- <x-input-label class="labelAddPet text-xl" for="image" :value="__('Afbeelding')" />
        <input id="image" class="block mt-1 w-full" type="file" name="image" accept="image/*" />
        <x-input-error :messages="$errors->get('image')" class="mt-2" /> --}}

        <!-- Image -->
        <x-input-label for="image" :value="__('Profielfoto')" />
        <input id="image" class="block mt-1 w-full" type="file" name="image" accept="image/*" />
        <x-input-error :messages="$errors->get('image')" class="mt-2" />

        <!-- Password -->
        <x-input-label for="password" :value="__('Wachtwoord')" />

        <x-text-input id="password" class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password')" class="mt-2" />

        <!-- Confirm Password -->
        <x-input-label for="password_confirmation" :value="__('Wachtwoord bevestigen')" />

        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                        type="password"
                        name="password_confirmation" required autocomplete="new-password" />

        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />

        <div class="buttonContainer buttonRegisterContainer">
            <input class="optionsButton loginButton" type="submit" value="Registreren">
    
            <a class="optionsButton prevButton" href="/">Terug</a>
        </div>

        <a class="forgotPwdButton" href="{{ route('login') }}">
            {{ __('Al een account?') }}
        </a>

        {{-- <x-primary-button class="ms-4">
            {{ __('Register') }}
        </x-primary-button> --}}
    </form>
</x-guest-layout>
