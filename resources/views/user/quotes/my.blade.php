<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-[#0f2c59] leading-tight">
            ✍️ My Quotes
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto mt-8 px-4">
        @if ($quotes->count() > 0)
            @foreach ($quotes as $quote)
                <div class="bg-white shadow-md rounded-xl p-5 mb-4 border-l-4 border-[#0f2c59]">
                    <p class="text-lg font-medium text-gray-800 mb-1 italic">"{{ $quote->content }}"</p>
                    <small class="text-gray-500">📅 {{ $quote->created_at->format('d M Y') }}</small>
                    <div class="flex items-center gap-4 mt-3">
                        <a href="{{ route('quotes.edit', $quote->id) }}" class=" bg-[#f4b400] hover:bg-yellow-400 text-[#0f2c59] font-semibold px-5 py-2 rounded-lg transition duration-200 ease-in-out">✏️ Edit</a>
                        <form method="POST" action="{{ route('quotes.destroy', $quote->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class=" bg-red-500 hover:bg-red-600 px-5 py-2 rounded-lg text-white font-semibold transition duration-200 ease-in-out" onclick="return confirm('Are you sure you want to delete this quote?')">🗑️ Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach

            <div class="mt-6">
                {{ $quotes->links() }}
            </div>
        @else
            <div class="text-center mt-10 text-gray-600">
                🚫 You haven't added any quotes yet.
                <br>
                <a href="{{ route('quotes.create') }}" class="text-[#f4b400] font-semibold hover:underline">➕ Add now</a>
            </div>
        @endif
    </div>
</x-app-layout>
