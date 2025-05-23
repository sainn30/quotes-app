<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-[#0f2c59] leading-tight">📝 Manage Quotes</h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-8 px-4">
        @forelse ($quotes as $quote)
            <div class="bg-white border border-gray-200 shadow-md rounded-xl p-6 mb-4 hover:shadow-lg transition duration-300">
                <p class="text-lg text-gray-800 italic">"{{ $quote->content }}"</p>
                <p class="text-sm text-gray-500 mt-2">By {{ $quote->user->name }}</p>

                <form method="POST" action="{{ route('admin.quotes.destroy', $quote->id) }}" class="mt-4">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Yakin ingin menghapus quote ini?')" class="bg-red-500 hover:bg-red-600 px-5 py-2 rounded-lg text-white font-semibold transition duration-200 ease-in-out">
                        🗑️ Delete
                    </button>
                </form>
            </div>
        @empty
            <div class="bg-yellow-100 text-yellow-800 text-center p-4 rounded-md">
                No quotes available yet.
            </div>
        @endforelse

        <div class="mt-6 pb-6">
            {{ $quotes->links() }}
        </div>
    </div>
</x-app-layout>