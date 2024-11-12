<x-guest-layout>
    <div class="mx-auto sm:max-w-4xl mt-6 px-6 py-8 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <h3 class="font-bold text-xl text-center mb-6 text-gray-600">Register</h3>
        <form method="POST" action="{{ route('register') }}" class="max-w-6xl grid grid-cols-2 gap-4">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-0">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    autocomplete="email" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Nationality -->
            <div class="mt-4">
                <x-input-label for="nationality" :value="__('Nationality')" />
                <x-text-input id="nationality" class="block mt-1 w-full" type="text" name="nationality"
                    :value="old('nationality')" autofocus autocomplete="nationality" />
                <x-input-error :messages="$errors->get('nationality')" class="mt-2" />
            </div>

            <!-- Phone -->
            <div class="mt-4">
                <x-input-label for="phone" :value="__('Phone Number')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')"
                    autofocus autocomplete="phone" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Gender -->
            <div class="mt-4 gap-4 content-center flex-col space-y-2">
                <h3>Gender</h3>
                <div class="flex gap-4 align-center">
                    <x-text-input id="male" class="" type="radio" name="gender" value="male" autofocus
                        autocomplete="male" />
                    <x-input-label for="male" :value="__('Male')" />
                </div>
                <div class="flex gap-4 align-center">
                    <x-text-input id="female" class="" type="radio" name="gender" value="female" autofocus
                        autocomplete="female" />
                    <x-input-label for="female" :value="__('Female')" />
                </div>
                <div class="flex gap-4 align-center">
                    <x-text-input id="other" class="" type="radio" name="gender" value="other" autofocus
                        autocomplete="other" />
                    <x-input-label for="other" :value="__('Other')" />
                </div>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-input-label for="address" :value="__('Address')" />
                <x-text-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')"
                    autofocus autocomplete="address" />
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>


            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password"
                    autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                    name="password_confirmation" autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <!-- User type -->
            <div class="mt-4 gap-4 content-center flex-col">
                <h3>Are you homestay owner?</h3>
                <div class="flex gap-4 align-center">
                    <input id="homestay_owner" class="mt-1" type="radio" name="user_type" value="homestay_owner" />
                    <x-input-label for="homestay_owner" :value="__('Yes')" />
                </div>
                <div class="flex gap-4 mt-2 items-center">
                    <input id="user" class="mt-1" type="radio" name="user_type" value="user" />
                    <x-input-label for="user" :value="__('No')" />
                </div>
                <x-input-error :messages="$errors->get('user_type')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    href="{{ route('login') }}">
                    Already registered?
                </a>

                <x-primary-button class="ms-4">
                    Register
                </x-primary-button>
            </div>
        </form>
    </div>
    <div class="h-16"></div>
</x-guest-layout>
