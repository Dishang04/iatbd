<x-app-layout>
    <h1 class="text-2xl font-semibold mb-4">Notifications</h1>

    @if(session()->has('interested_pet'))
        <p>{{ session('interested_pet')->user->name }} is interested in pet sitting for {{ session('interested_pet')->name }}</p>
        {{-- You can display other relevant information about the pet here --}}
        {{-- Don't forget to provide a button or link to remove this message from the session if necessary --}}
    @else
        <p>No new notifications</p>
    @endif
</x-app-layout>