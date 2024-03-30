<x-app-layout>
    <h1>Delete users Pagina</h1>
    <section class="space-y-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Delete Users') }}
            </h2>
        </header>
    
        @foreach($users as $user)
            <div class="flex items-center justify-between">
                <p>{{ $user->name }}</p>
                <form method="POST" action="{{ route('admin.users.delete', $user) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-500">Delete</button>
                </form>
            </div>
        @endforeach
    </section>
</x-app-layout>