<x-app-layout>
   <h1 class="myPetsHeader">Verzoeken</h1>

   <section class="requestContainer">
       @if ($requests->isEmpty())
           <p>Er zijn geen verzoeken.</p>
       @else
           <ul>
               @foreach ($requests as $request)
                   <li class="requestItem">
                       <p>Verzoek voor huisdier: {{ $request->pet->name }}</p>
                       <p>Aangevraagd door: {{ $request->sitter->name }}</p>
                       <div class=requestButtonCnt>
                            <form action="{{ route('requests.accept', ['request' => $request->id]) }}" method="POST">
                                @csrf
                                <button class="requestButton acceptButton bg-green-600" type="submit">Accepteren</button>
                            </form>
                            <form action="{{ route('requests.decline', ['request' => $request->id]) }}" method="POST">
                                @csrf
                                <button class="requestButton declineButton bg-red-600" type="submit">Afwijzen</button>
                            </form>
                        </div>
                   </li>
                   <hr class="requestItemSplit">
               @endforeach
           </ul>
       @endif
   </section>
</x-app-layout>
