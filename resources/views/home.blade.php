<x-guest-layout>
    <section class="relative h-[580px] overflow-hidden bg-no-repeat bg-center bg-cover"
        style="background-image: url({{ asset('/images/hero-home.webp') }});">
        <div class="absolute inset-0 bg-gradient-to-b from-black/95 via-black/50 to-transparent">
        </div>
        <div class="relative container mx-auto h-full flex flex-col items-center justify-center text-center text-white">

            <h1 class="text-4xl md:text-7xl font-black mb-8 drop-shadow-2xl flex flex-col space-y-4">
                <span>Experience Nepal Like</span> <span>Never Before</span>
            </h1>

            <div class="flex mt-4 w-full max-w-xl items-center">
                <input type="search" placeholder="Homestays Name"
                    class="text-gray-900 h-[50px] text-xl flex-1 px-4 py-2  rounded-l-lg border-none focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <button class="bg-blue-600 h-[50px] hover:bg-blue-700 text-white px-8 py-2 rounded-r-lg">
                    Search
                </button>
            </div>
        </div>
    </section>
</x-guest-layout>
