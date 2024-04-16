<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Pet Sitting Requests') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if ($sitterRequests->isEmpty())
            <p>Geen huisdier oppasverzoeken gevonden.</p>
        @else
            <ul>
                @foreach ($sitterRequests as $request)
                    <li>
                        Verzoek voor huisdier: {{ $request->pet->name }} - Status: {{ ucfirst($request->status) }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</x-app-layout>