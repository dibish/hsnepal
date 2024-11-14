<x-dashboard-layout>
    <h2 class="ml-4 mt-4 text-2xl font-bold mb-4">Messages</h2>
    @if(session('success'))
    <div class="bg-green-100 text-green-700 p-8 rounded mb-4">
        {{ session('success') }}
    </div>
@endif

    <div class="container mx-auto p-4">

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-lg">
                <thead class="bg-gray-100 border-b border-gray-200">
                    <tr>
                        <th class="text-left px-4 py-2 text-sm font-medium text-gray-600">#</th>
                        <th class="text-left px-4 py-2 text-sm font-medium text-gray-600">Name</th>
                        <th class="text-left px-4 py-2 text-sm font-medium text-gray-600">Email</th>
                        <th class="text-left px-4 py-2 text-sm font-medium text-gray-600">Message</th>
                        <th class="text-left px-4 py-2 text-sm font-medium text-gray-600">Date</th>
                        <th class="text-center px-4 py-2 text-sm font-medium text-gray-600">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($messages as $index => $message)
                        <tr class="{{ $loop->even ? 'bg-gray-50' : '' }} border-b">
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $message->name }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $message->email }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ \Illuminate\Support\Str::limit($message->message, 50) }}</td>
                            <td class="px-4 py-2 text-sm text-gray-700">{{ $message->created_at->format('Y-m-d H:i') }}</td>
                            <td class="px-4 py-2 text-sm text-center">
                                <a href="{{ route('messages.show', $message->id) }}" class="text-blue-600 hover:underline">View</a>
                                |
                                <form action="{{ route('messages.destroy', $message->id) }}" method="POST" class="inline">
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

        @if ($messages->isEmpty())
            <p class="text-center text-gray-500 mt-4">No messages found.</p>
        @endif
    </div>

</x-dashboard-layout>
