@extends('layout.main')

@if ( Auth::user()->role == 'user')
    @extends('layout.sidebar_user')
@elseif ( Auth::user()->role == 'owner')
    @extends('layout.sidebar_owner')
@else
    @extends('layout.sidebar_admin')
@endif

@section('isi')
    <div class="sm:ml-64 bg-[#E8F1E3]">
        <p class="font-semibold text-xl py-10 text-center text-gray-800 leading-tight">
            Profil Akun
        </p>
        <div class="py-6">
            <div class="grid grid-cols-2 gap-3 mx-auto sm:px-6 lg:px-8">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
    
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
    
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg col-span-2">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection