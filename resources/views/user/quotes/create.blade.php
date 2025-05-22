<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-[#0f2c59] leading-tight">📝 Add Quote</h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-8 px-4">
        <div class="bg-white shadow-md rounded-xl p-6">
            <form method="POST" action="{{ route('quotes.store') }}">
                @csrf

                <label for="content" class="block mb-2 font-medium text-gray-700">Type your quote:</label>
                <textarea name="content" rows="4" id="content" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-2 focus:ring-[#0f2c59] focus:outline-none" required placeholder="Example: Life is a journey of struggle, not a path of escape."></textarea>

                <button type="submit" class="mt-4 bg-[#f4b400] hover:bg-yellow-400 text-black font-semibold px-5 py-2 rounded-lg transition duration-200 ease-in-out">
                    🚀 Post Quote
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
