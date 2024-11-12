<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
@php
    $user_type = str_replace('_', ' ', Auth::user()->user_type);
@endphp

<body>
    <header class="flex justify-between items-center px-4 bg-blue-50 py-2 border-b">
        <a href="{{ route('page.home') }}">
            <img class="w-[100px]" src="{{ asset('images/HomestayNepal.png') }}" alt="homestay nepal logo">
        </a>
        <div class="flex gap-4 items-center">
            <a href="{{ route('profile.edit') }}"
                class="flex flex-col leading-none"><strong>{{ Auth::user()->name }}</strong>
                <span class="text-xs">{{ ucwords($user_type) }}</span>
            </a>
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a class="bg-blue-800 hover:bg-blue-600 rounded-md px-3 py-2 text-white focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150"
                        href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                        Logout
                    </a>
                </form>
            @endauth
            {{-- <a href="{{ route('profile') }}">Profile</a> --}}
        </div>
    </header>
    <section class="relative grid grid-cols-[250px_minmax(900px,_1fr)]">
        <aside class=" bg-blue-50 h-screen border-r"></aside>
        <main class="p-4 h-full">

            <h2 class="ml-8 mt-4 font-bolder text-xl">{{ ucwords($user_type) }} Dashboard</h2>

            {{ $slot }}
        </main>
    </section>

</body>

</html>
