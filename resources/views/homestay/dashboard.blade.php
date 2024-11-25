<x-homestay-dashboard-layout>
    <h1 class="ml-8 mt-6 font-semibold text-xl text-gray-800 leading-tight">Dashboard</h1>
    @if ($homestay->isEmpty())
        <div class="ml-8 mt-8 space-y-4">
            <p class="mb-4">First you need to add your Homestay</p>
            <a class="text-blue-600 underline" href="{{ route('homestay.create') }}">Add Homestay</a>
        </div>
    @endif
    <section class="ml-8 mt-4 grid grid-cols-4">
        <div class="bg-blue-100 border border-blue-500 shadow rounded-lg p-4 space-y-2">
            <h2 class="font-semibold mb-2">Your homestay</h2>
            @foreach ($homestay as $hstay)
                <p>Name : {{ $hstay->name }}</p>
                <div class="flex justify-between pt-4">
                    <a class="text-blue-500 underline inline-block"
                        href="{{ route('homestay.edit', $hstay->id) }}">Edit</a>
                    <span
                        class="{{ $hstay->status == 'approved' ? 'text-green-600' : 'text-gray-600' }} capitalize">{{ $hstay->status }}</span>
                </div>
            @endforeach
        </div>
    </section>
</x-homestay-dashboard-layout>
