<x-app-layout>
    <div class="sm:max-w-[400px] mx-auto my-16 mb-64 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div class="mb-4 text-sm text-center text-gray-600">
            Enter email address that you registered with us. We will send you password reset link.
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="mt-4">
                <x-primary-button class=" flex items-start justify-center w-full text-center">
                    Email Password Reset Link
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
