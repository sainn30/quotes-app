<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-[#0f2c59] leading-tight">
            📊 App Statistics
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-xl p-6 border border-gray-200">

                <!-- Statistik Umum -->
                <h3 class="text-xl font-semibold text-[#0f2c59] mb-4">📌 General Statistics</h3>
                <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-6 text-gray-800">
                    <li class="bg-[#f4b400] text-white p-4 rounded-lg shadow flex items-center justify-between">
                        <span class="text-sm sm:text-base">Total Quotes</span>
                        <strong class="text-lg sm:text-xl">{{ $quoteCount }}</strong>
                    </li>
                    <li class="bg-[#0f2c59] text-white p-4 rounded-lg shadow flex items-center justify-between">
                        <span class="text-sm sm:text-base">Total Users</span>
                        <strong class="text-lg sm:text-xl">{{ $userCount }}</strong>
                    </li>
                    <li class="bg-[#f4b400] text-white p-4 rounded-lg shadow flex items-center justify-between">
                        <span class="text-sm sm:text-base">Total Admins</span>
                        <strong class="text-lg sm:text-xl">{{ $adminCount }}</strong>
                    </li>
                </ul>

                <!-- Top 5 Users -->
                <h3 class="text-xl font-semibold text-[#0f2c59] mb-4">🏆 Top 5 Users with the Most Quotes</h3>
                <ul class="bg-gray-50 p-4 rounded-lg divide-y divide-gray-200">
                    @forelse ($topUsers as $user)
                        <li class="py-2 flex flex-col sm:flex-row sm:justify-between">
                            <span class="text-sm sm:text-base">{{ $user->name }}</span>
                            <span class="font-bold text-[#0f2c59] text-sm sm:text-base">{{ $user->quotes_count }} Quotes</span>
                        </li>
                    @empty
                        <li class="py-2 text-gray-500 text-sm">No user data with quotes available yet.</li>
                    @endforelse
                </ul>

            </div>
        </div>
    </div>
</x-app-layout>
