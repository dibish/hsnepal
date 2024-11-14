<x-dashboard-layout>
    <h2 class="ml-4 mt-4 text-2xl font-bold mb-4">Message details</h2>
    <div class="container mx-auto p-4">
        <div class="bg-white shadow-lg rounded-lg p-6 border border-gray-200">
            <p><strong>Name:</strong> {{ $message->name }}</p>
            <p><strong>Email:</strong> {{ $message->email }}</p>
            <p><strong>Message:</strong></p>
            <p class="mt-2 text-gray-700">{!! nl2br(e($message->message)) !!}</p>
            <p class="mt-4 text-sm text-gray-500"><strong>Received At:</strong> {{ $message->created_at->format('Y-m-d H:i') }}</p>
        </div>

        <div class="mt-4">
            <a href="{{ route('messages.index') }}" class="text-blue-600 hover:underline">Back to Messages</a>
        </div>
    </div>
</x-dashboard-layout>
