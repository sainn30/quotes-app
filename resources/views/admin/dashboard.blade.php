<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-[#0f2c59] leading-tight">📊 Admin Dashboard</h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                <!-- Total Quotes -->
                <div class="bg-white border border-gray-200 rounded-xl shadow p-6 text-center hover:shadow-lg transition">
                    <div class="text-[#0f2c59] text-5xl mb-2">💬</div>
                    <h3 class="text-xl font-semibold text-[#0f2c59]">Total Quotes</h3>
                    <p class="text-4xl font-bold text-[#f4b400] mt-2">{{ $quoteCount }}</p>
                </div>

                <!-- Total Users -->
                <div class="bg-white border border-gray-200 rounded-xl shadow p-6 text-center hover:shadow-lg transition">
                    <div class="text-[#0f2c59] text-5xl mb-2">👥</div>
                    <h3 class="text-xl font-semibold text-[#0f2c59]">Total Users</h3>
                    <p class="text-4xl font-bold text-[#f4b400] mt-2">{{ $userCount }}</p>
                </div>

                <!-- Total Admins -->
                <div class="bg-white border border-gray-200 rounded-xl shadow p-6 text-center hover:shadow-lg transition">
                    <div class="text-[#0f2c59] text-5xl mb-2">🛡️</div>
                    <h3 class="text-xl font-semibold text-[#0f2c59]">Total Admins</h3>
                    <p class="text-4xl font-bold text-[#f4b400] mt-2">{{ $adminCount }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
