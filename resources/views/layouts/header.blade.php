<header class="bg-white w-full py-2">
    <nav class="container mx-auto flex justify-between items-center px-4 md:px-0 py-2">
        <a href="{{ route('page.home') }}">
            <img class="w-[120px] md:w-[160px]" src="{{ asset('images/HomestayNepal.png') }}" alt="home stay neapl logo" />
        </a>

        <div class="flex gap-6 items-center font-semibold">
            <a class="hidden lg:inline-block" href="{{ route('page.home') }}">Home</a>
            <a class="hidden lg:inline-block" href="#">Browse Homestay</a>
            <a class="hidden lg:inline-block" href="{{ route('page.about') }}">About us</a>
            <a class="hidden lg:inline-block" href="{{ route('page.contact') }}">Contact us</a>
            @guest
                <a href="{{ route('login') }}"
                    class="bg-blue-800 hover:bg-blue-600 font-semibold rounded-md px-3 py-1 text-white focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">Login</a>
                <a href="{{ route('register') }}"
                    class="bg-[#FF3131] rounded-md px-3 py-1 text-white font-semibold focus:ring-2 focus:ring-[#f74444] focus:ring-offset-2 transition ease-in-out duration-150">Register</a>
            @endguest
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a class="bg-blue-800 hover:bg-blue-600 rounded-md px-3 py-2 text-white focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150"
                        href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                        Logout
                    </a>
                </form>

                @php
                    $path = '';
                    if (Auth::user()->user_type === 'admin') {
                        $path = 'admin.dashboard';
                    } elseif (Auth::user()->user_type === 'homestay_owner') {
                        $path = 'homestay.dashboard';
                    } elseif (Auth::user()->user_type === 'user') {
                        $path = 'user.dashboard';
                    } else {
                        $path = 'login';
                    }

                @endphp

                <a href="{{ route($path) }}"
                    class="bg-orange-700 hover:bg-orange-600 rounded-md px-3 py-1 text-white focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">Dashboard</a>
            @endauth
        </div>
    </nav>
</header>
