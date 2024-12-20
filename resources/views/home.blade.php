<x-app-layout>
    <section class="relative h-[580px] overflow-hidden bg-no-repeat bg-center bg-cover"
        style="background-image: url({{ asset('/images/hero-home.webp') }});">
        <div class="absolute inset-0 bg-gradient-to-b from-black/95 via-black/50 to-transparent">
        </div>
        <div class="relative container mx-auto h-full flex flex-col items-center justify-center text-center text-white">

            <h1 class="text-3xl text-baalance md:text-7xl font-black mb-4 drop-shadow-sm flex flex-col space-y-4">
                <span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Experience
                    Nepal
                    Like</span> <span>Never Before</span>
            </h1>

            <div class="flex flex-col mt-4 w-full max-w-4xl items-center">
                <p class="drop-shadow-md text-2xl">Discover charming homestays across Nepal, from the
                    Himalayas to hidden
                    valleys.Immerse yourself in
                    authentic Nepali hospitality and explore the beauty of this incredible country.</p>
                {{-- <input type="search" placeholder="Homestays Name"
                    class="text-gray-900 h-[50px] text-xl flex-1 px-4 py-2  rounded-l-lg border-none focus:outline-none focus:ring-2 focus:ring-blue-500" /> --}}
                <button
                    class="bg-blue-600 h-[50px] hover:bg-blue-700 text-white px-8 py-2 mt-6 font-semibold rounded-lg">
                    Find Your Nepal Homestay
                </button>
            </div>
        </div>
    </section>
    <section class="min-h-96 py-16">
        <div class="container">
            <h2 class="font-semibold text-2xl">Just Added</h2>
        </div>
        <div class="container mt-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @foreach ($homestays as $homestay)
                <div class="p-2 bg-white shadow-lg rounded">
                    <img class="w-full aspect-[4/3]" src="{{ asset('storage/' . $homestay->cover_photo) }}"
                        alt="Homestay name">
                    @php
                        $averageRating = $homestay->reviews->avg('rating');
                    @endphp
                    <div class="flex gap-2 py-2">
                        @for ($i = 1; $i <= 5; $i++)
                            @if ($i <= $averageRating)
                                <img src="{{ asset('/images/star-solid.svg') }}" alt="homestay rating">
                            @else
                                <img src="{{ asset('/images/star-outline.svg') }}" alt="homestay rating">
                            @endif
                        @endfor
                    </div>
                    <div class="flex gap-2 justify-between items-start py-2">
                        <h2 class="font-medium text-xl line-clamp-2">{{ $homestay->name }}</h2>
                        <a class="bg-blue-700 hover:bg-blue-700/80 transition duration-300 delay-75 py-1 px-3 text-sm font-medium text-white drop-shadow rounded-md"
                            href="{{ route('homestay.show', $homestay->id) }}">view</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
</x-app-layout>
