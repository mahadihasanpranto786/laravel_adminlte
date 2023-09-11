@extends('backend.master_layout')
@section('profile', 'active')
@section('main')
    <link href="{{ asset('public/build/assets/app-ba5719d2.css') }}" rel="stylesheet">
    <div class="row m-4">
        <div class="col-md-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-lg">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="p-3 pt-0 sm:p-3 bg-white shadow sm:rounded-lg">
                <div class="max-w-lg mt-4">
                    @include('profile.partials.update-password-form')
                </div>
            </div>
        </div>
    </div>

@endsection
