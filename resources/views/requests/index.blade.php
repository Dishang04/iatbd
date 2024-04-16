<x-app-layout>
   <x-slot name="header">
       <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Verzoeken') }}
       </h2>
   </x-slot>

   <div class="py-12">
       @if ($requests->isEmpty())
           <p>Er zijn geen verzoeken.</p>
       @else
           <ul>
               @foreach ($requests as $request)
                   <li>
                       Verzoek voor huisdier: {{ $request->pet->name }} van {{ $request->sitter->name }}
                       <!-- Add buttons for accepting and declining -->
                       <form action="{{ route('requests.accept', ['request' => $request->id]) }}" method="POST">
                           @csrf
                           <button type="submit">Accepteren</button>
                       </form>
                       <form action="{{ route('requests.decline', ['request' => $request->id]) }}" method="POST">
                           @csrf
                           <button type="submit">Afwijzen</button>
                       </form>
                   </li>
               @endforeach
           </ul>
       @endif
   </div>
</x-app-layout>
