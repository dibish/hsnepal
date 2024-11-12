<x-guest-layout>
    <section class="relative h-[300px] overflow-hidden flex items-center">
        <img class="absolute -z-1 w-full object-bottom object-cover brightness-50"
            src="{{ asset('/images/about-home-stay-nepal.webp') }}" alt="homestay nepal">
        <h1
            class="[text-shadow:_0_2px_4px_rgb(0_0_0_/_0.8)] z-10 px-4 md:px-0 container mx-auto text-white font-extrabold text-5xl">
            Contact us</h1>
    </section>
    <section class="container py-14">
        <h2 class="py-8 text-2xl">Use below form to contact us</h2>
        <div class="max-w-3xl bg-white p-8 shadow-md rounded-lg">
            <form class="space-y-4 py-6" action="" method="post">

                <!-- Name -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"
                        :value="old('name')" autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                        :value="old('email')" autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
                <div>
                    <label class="text-sm" for="message">Message</label>
                    <textarea
                        class="mt-2 w-full min-h-[200px] border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm"
                        name="message" id="message"></textarea>
                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                </div>
                <x-primary-button class="px-4 py-1">
                    <span>SEND</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="size-5 transform rotate-1 ml-2">
                        <path
                            d="M3.105 2.288a.75.75 0 0 0-.826.95l1.414 4.926A1.5 1.5 0 0 0 5.135 9.25h6.115a.75.75 0 0 1 0 1.5H5.135a1.5 1.5 0 0 0-1.442 1.086l-1.414 4.926a.75.75 0 0 0 .826.95 28.897 28.897 0 0 0 15.293-7.155.75.75 0 0 0 0-1.114A28.897 28.897 0 0 0 3.105 2.288Z" />
                    </svg>

                </x-primary-button>
            </form>
        </div>
    </section>
</x-guest-layout>
