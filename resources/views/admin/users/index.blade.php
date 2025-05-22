<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-[#0f2c59] leading-tight">
            👤 Users Login
        </h2>
    </x-slot>

    <div class="p-6">
        <div class="overflow-x-auto rounded-lg shadow-md border border-gray-200">
            <table class="min-w-full text-sm text-left">
                <thead class="bg-[#0f2c59] text-white">
                    <tr>
                        <th class="px-4 py-3">No</th>
                        <th class="px-4 py-3">Name</th>
                        <th class="px-4 py-3">Email</th>
                        <th class="px-4 py-3">Role</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @forelse ($users as $akuns)
                        @if ($akuns->usertype === 'user')
                            <tr class="border-b hover:bg-[#f4f4f4]">
                                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="px-4 py-2">{{ $akuns->name }}</td>
                                <td class="px-4 py-2">{{ $akuns->email }}</td>
                                <td class="px-4 py-2">
                                    <span class="inline-block bg-yellow-100 text-yellow-800 text-xs font-semibold px-2 py-1 rounded-sm">
                                        {{ ucfirst($akuns->usertype) }}
                                    </span>
                                </td>
                            </tr>
                        @endif
                    @empty
                        <tr>
                            <td colspan="4" class="text-center px-4 py-4 text-gray-500">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
