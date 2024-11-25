<x-app-layout>
    <section class="relative h-[580px] overflow-hidden bg-no-repeat bg-bottom bg-cover"
        style="background-image: url({{ asset('storage/' . $homestay->cover_photo) }});">
        <div class="absolute -z-0 inset-0 bg-gradient-to-t from-black/95 via-black/50 to-transparent"></div>
        <div class="h-full relative container p-0 z-50 flex items-end">
            <div>
                <h1 class="text-5xl text-white font-extrabold mb-6 drop-shadow-sm">{{ $homestay->name }}</h1>
                <div></div>
            </div>
        </div>

    </section>
    <section class="bg-white py-4 px-4 md:px-0">
        <div class="container flex justify-end gap-4">
            <a href="#"
                class="text-white uppercase leading-loose bg-gradient-to-r from-orange-500 via-orange-600 to-orange-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-orange-300 dark:focus:ring-orange-800 shadow-lg shadow-orange-500/50 dark:shadow-lg dark:shadow-orange-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Message
                Owner</a>
            <a href="#"
                class="text-white uppercase leading-loose bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Book
                Now</a>
        </div>
    </section>
    <section class="min-h-screen">

    </section>
</x-app-layout>
