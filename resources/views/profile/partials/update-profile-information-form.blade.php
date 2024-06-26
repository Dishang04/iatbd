<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profielgegevens') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update de profielgegevens en het e-mailadres van uw account.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label class="mb-2" for="image" :value="__('Profielfoto')" />
            <input class="text-sm" id="image" type="file" name="image" accept="image/*" class="mt-1 block w-full" />
            @if ($user->image)
                <img src="{{ asset('storage/' . $user->image) }}" alt="Profielfoto" class="mt-4 h-24 w-auto rounded-full" />
            @endif
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="name" :value="__('Naam')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="phone" :value="__('Telefoonnummer')" />
            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" required autofocus autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div>
            <x-input-label for="address" :value="__('Adres')" />
            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $user->address)" required autofocus autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

           <!-- CHOICE -->
           {{-- <div>
            <p>Ik:</p>
                <input type="radio" id="sitterChoiceYes" name="sitterChoice" value="sitter" {{ old('sitter') == 'true' ? 'checked' : '' }}>
                <label for="sitterChoiceYes">ben een oppasser</label><br>
                <input type="radio" id="sitterChoiceNo" name="sitterChoice" value="owner" {{ old('sitter') == 'false' ? 'checked' : '' }}>
                <label for="sitterChoiceNo">zoek een oppasser</label><br>
                <x-input-error :messages="$errors->get('sitter')" class="mt-2" />
           </div> --}}

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Opslaan') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
