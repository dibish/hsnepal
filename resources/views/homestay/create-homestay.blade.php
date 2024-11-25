<x-homestay-dashboard-layout>
    <h1 class="ml-8 mt-6 font-semibold text-xl text-gray-800 leading-tight">Add your homestay</h1>

    @if (session('error'))
        <div class="ml-8 bg-red-100 text-red-700 p-4 rounded mb-4 mt-4">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="ml-8 bg-green-100 text-green-700 p-4 rounded mb-4 mt-4">
            {{ session('success') }}
        </div>
    @endif
    <section class="ml-8 mt-6 max-w-xl">
        <form action="{{ route('homestay.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div class="flex flex-col space-y-2">
                <label class="block font-medium text-sm text-gray-700" for="name">Homestay Name</label>
                <input class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm"
                    type="text" name="name" value="{{ old('name') }}" />
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col space-y-2">
                <label class="block font-medium text-sm text-gray-700" for="phone">Phone Number</label>
                <input class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm"
                    type="text" name="phone" value="{{ old('phone') }}" />
                @error('phone')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col space-y-2">
                <label class="block font-medium text-sm text-gray-700" for="email">Homestay's email</label>
                <input class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm"
                    type="text" name="email" value="{{ old('email') }}" />
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col space-y-2">
                <label class="block font-medium text-sm text-gray-700" for="address">Address</label>
                <input class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm"
                    type="text" name="address" value="{{ old('address') }}" />
                @error('address')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col space-y-2">
                <label class="block font-medium text-sm text-gray-700" for="description">Description</label>
                <textarea class="border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm" type="text"
                    name="description" rows="5">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex flex-col space-y-2">
                <label for="cover_photo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload
                    cover photo</label>
                <input type="file" id="cover_photo" name="cover_photo"
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />
                @error('cover_photo')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="mt-4">
                <button type='submit'
                    class ='mt-6 px-4 py-2 bg-blue-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150'>
                    Request for approval
                </button>
            </div>
        </form>
    </section>
</x-homestay-dashboard-layout>
