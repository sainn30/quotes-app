<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-[#0f2c59] leading-tight">
            ✏️ Edit Quote
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-10 px-4">
        <form method="POST" action="{{ route('quotes.update', $quote->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label for="content" class="block text-md font-semibold text-[#0f2c59] mb-2">Quote Content</label>
                <textarea name="content" id="content" rows="4"
                    class="w-full border border-gray-300 rounded-lg shadow-sm p-3 focus:ring-2 focus:ring-[#0f2c59] focus:outline-none"
                    required>{{ old('content', $quote->content) }}</textarea>
                @error('content')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('quotes.mine') }}"
                   class="bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300 font-semibold">Cancel</a>
                <button type="submit"
                    class="bg-[#0f2c59] text-white px-5 py-2 rounded-lg hover:bg-[#0d234a] font-semibold transition">💾 Save</button>
            </div>
        </form>
    </div>
</x-app-layout>
