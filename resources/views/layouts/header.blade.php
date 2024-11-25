<header class="bg-white w-full py-2">
    <nav class="container mx-auto flex justify-between items-center px-4 md:px-0">
        <a href="{{ route('page.home') }}">
            <img class="w-[120px] md:w-[160px]" src="{{ asset('images/HomestayNepal.png') }}" alt="home stay neapl logo" />
        </a>

        <div
            class="font-medium flex items-center flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
            <a class="hidden lg:inline-block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                href="{{ route('page.home') }}">Home</a>
            <a class="hidden lg:inline-block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                href="#">Browse Homestay</a>
            <a class="hidden lg:inline-block  py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                href="{{ route('page.about') }}">About us</a>
            <a class="hidden lg:inline-block  py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                href="{{ route('page.contact') }}">Contact us</a>
            @guest
                <a href="{{ route('login') }}"
                    class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Login</a>
                <a href="{{ route('register') }}"
                    class="text-white bg-gradient-to-r from-orange-500 via-orange-600 to-orange-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-orange-300 dark:focus:ring-orange-800 shadow-lg shadow-orange-500/50 dark:shadow-lg dark:shadow-orange-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Register</a>
            @endguest
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800"
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
                    class="text-white bg-gradient-to-r from-orange-500 via-orange-600 to-orange-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-orange-300 dark:focus:ring-orange-800 shadow-lg shadow-orange-500/50 dark:shadow-lg dark:shadow-orange-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Dashboard</a>
            @endauth
        </div>
    </nav>
</header>
