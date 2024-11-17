@if (Auth::user()->user_type == 'admin')
    <x-admin-dashboard-layout>
        @include('profile.partials.edit-profile')
    </x-admin-dashboard-layout>
@elseif(Auth::user()->user_type == 'homestay_owner')
    <x-homestay-dashboard-layout>
        @include('profile.partials.edit-profile')
    </x-homestay-dashboard-layout>
@else
    <x-user-dashboard-layout>
        @include('profile.partials.edit-profile')
    </x-user-dashboard-layout>
@endif
