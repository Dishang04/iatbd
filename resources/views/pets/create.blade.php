<x-app-layout>
    <h1 class="addPetHeader">Huisdier toevoegen</h1>
    <form class="formAddPet" method="POST" action="{{ route('pets.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <x-input-label class="labelAddPet text-xl" for="name" :value="__('Huisdier naam')" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />

        <!-- Species -->
        <x-input-label class="labelAddPet text-xl" for="species" :value="__('Diersoort')" />
        <x-text-input id="species" class="block mt-1 w-full" type="text" name="species" :value="old('species')" />
        <x-input-error :messages="$errors->get('species')" class="mt-2" />

        <!-- When -->
        <x-input-label class="labelAddPet text-xl" for="when" :value="__('Wanneer')" />
        <x-text-input id="when" class="block mt-1 w-full" type="date" name="when" :value="old('when')" />
        <x-input-error :messages="$errors->get('when')" class="mt-2" />

        <!-- hourlyrate -->
        <x-input-label class="labelAddPet text-xl" for="hourlyRate" :value="__('Uurtarief')" />
        <x-text-input id="hourlyRate" class="block mt-1 w-full" type="text" name="hourlyRate" :value="old('hourlyRate')" />
        <x-input-error :messages="$errors->get('hourlyRate')" class="mt-2" />

        <!-- durationHours -->
        <x-input-label class="labelAddPet text-xl" for="durationHours" :value="__('Hoelang (uren)')" />
        <x-text-input id="durationHours" class="block mt-1 w-full" type="integer" name="durationHours" :value="old('durationHours')" />
        <x-input-error :messages="$errors->get('durationHours')" class="mt-2" />

        <!-- details -->
        <x-input-label class="labelAddPet text-xl" for="details" :value="__('Belangrijke zaken')" />
        <x-text-input id="details" class="block mt-1 w-full" type="text" name="details" :value="old('details')" />
        <x-input-error :messages="$errors->get('details')" class="mt-2" />

        <!-- image -->
        <x-input-label class="labelAddPet text-xl" for="image" :value="__('Afbeelding')" />
        <input id="image" class="block mt-1 w-full" type="file" name="image" accept="image/*" />
        <x-input-error :messages="$errors->get('image')" class="mt-2" />

        <div class="buttonContainer">
            <input class="addButton bg-blue-500" type="submit" value="Toevoegen">
    
            <a class="prevButton" href="{{ route('pets.index') }}">Terug</a>
        </div>
</x-app-layout>