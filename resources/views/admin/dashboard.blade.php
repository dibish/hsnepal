<x-admin-dashboard-layout>
    <h2 class="ml-4 mt-4 text-2xl font-bold mb-4">Dashboard</h2>
    <div class="grid grid-cols-4 gap-6 ml-4">
        <div class="text-center shadow py-10 rounded-lg">
            <h2 class="text-5xl font-bold">{{ $data['message_count'] }}</h2>
            <p>Messages</p>
        </div>
        <div class="text-center shadow py-10 rounded-lg"></div>
        <div class="text-center shadow py-10 rounded-lg"></div>
    </div>
</x-admin-dashboard-layout>
