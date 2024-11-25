<x-admin-dashboard-layout>
    <h2 class="ml-4 mt-4 text-2xl font-bold mb-4">All Homestays</h2>

    <div class="container mx-auto p-4">
        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4 mt-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">#</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                        <th scope="col" class="px-6 py-3">Date</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($homestays as $index => $homestay)
                        <tr
                            class="{{ $loop->even ? 'bg-gray-50' : '' }} border-b dark:bg-gray-800 dark:border-gray-700">
                            <td class="px-6 py-4">{{ $index + 1 }}</td>
                            <td class="px-6 py-4">{{ $homestay->name }}</td>
                            <td class="px-6 py-4">{{ $homestay->email }}</td>
                            @if ($homestay->status == 'approved')
                                <td class="px-6 py-4"><span
                                        class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300 capitalize">
                                        {{ $homestay->status }}</span></td>
                            @endif
                            @if ($homestay->status == 'pending')
                                <td class="px-6 py-4"><span
                                        class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300 capitalize">
                                        {{ $homestay->status }} </span></td>
                            @endif
                            @if ($homestay->status == 'rejected')
                                <td class="px-6 py-4"><span
                                        class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300 capitalize">
                                        {{ $homestay->status }} </span></td>
                            @endif
                            <td class="px-6 py-4">{{ $homestay->created_at->format('Y-m-d H:i') }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('admin.homestay.edit', $homestay->id) }}"
                                    class="text-blue-600 hover:underline">Edit</a>
                                |
                                <form action="{{ route('messages.destroy', $homestay->id) }}" method="POST"
                                    class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if ($homestays->isEmpty())
            <p class="text-center text-gray-500 mt-4">No messages found.</p>
        @endif
    </div>

</x-admin-dashboard-layout>
