<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('messages.store') }}">
            @csrf
            <input type="hidden" name="pet_id" value="{{ $pet->id }}">
            <textarea
                name="message"
                placeholder="{{ __('Stel hier uw vraag of reactie') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message') }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Stuur') }}</x-primary-button>
        </form>
        <div class="mt-6 bg-white shadow-sm rounded-lg divide-green-700 divide-y-2">
            @foreach ($messages as $message)
                <div class="p-6 flex space-x-2 @if($message->user->id == auth()->id()) bg-blue-100 @endif">
                    <img class="h-9 w-9 rounded-full" src="{{ asset('storage/' . $message->user->image) }}" alt="{{ $message->user->name }}">
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800 @if($message->user->id == auth()->id()) font-bold @endif">{{ $message->user->name }}</span>
                                <small class="ml-2 text-sm text-gray-600">{{ $message->created_at->format('j M Y, H:i') }}</small>

                                @unless ($message->created_at->eq($message->updated_at))
                                    <small class="text-sm text-gray-600"> &middot; {{ __('Bewerkt') }}</small>
                                @endunless
                            </div>

                            @if ($message->user->is(auth()->user()))
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('messages.edit', $message)">
                                            {{ __('Edit') }}
                                        </x-dropdown-link>
                                        <form method="POST" action="{{ route('messages.destroy', $message) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('messages.destroy', $message)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            @elseif(auth()->user()->admin)
                                <x-dropdown>
                                    <x-slot name="trigger">
                                        <button>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                                <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <x-slot name="content">
                                        <form method="POST" action="{{ route('messages.destroy', $message) }}">
                                            @csrf
                                            @method('delete')
                                            <x-dropdown-link :href="route('messages.destroy', $message)" onclick="event.preventDefault(); this.closest('form').submit();">
                                                {{ __('Delete') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            @endif
                        </div>
                        <p class="mt-4 text-lg text-gray-900">{{ $message->message }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>