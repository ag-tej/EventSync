@extends('layouts.layout')

@section('title')
    Update Password | EventSync
@endsection

@section('content')
    @include('components.explore_navbar')

    {{-- update password form --}}
    <a href="{{ route('settings') }}" class="cursor-default">
        <div class="backdrop">
        </div>
    </a>
    <div class="popup_center">
        <div data-aos="zoom-in" data-aos-duration="300" class="popup">
            <p class="mb-4 font-bold text-lg">Update Password</p>
            <form action="{{ route('user-password.update') }}" method="POST" enctype="multipart/form-data" id="form">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="current_password" class="form_label">Current Password</label>
                    <input type="password" id="current_password" name="current_password" class="form_input">
                    @error('current_password')
                        <script>
                            document.getElementById('current_password').classList.add('border-red-500')
                        </script>
                        <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="form_label">New Password</label>
                    <input type="password" id="password" name="password" class="form_input">
                    @error('password')
                        <script>
                            document.getElementById('password').classList.add('border-red-500')
                        </script>
                        <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="form_label">Confirm New Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form_input">
                    @error('password_confirmation')
                        <script>
                            document.getElementById('password_confirmation').classList.add('border-red-500')
                        </script>
                        <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
                    @enderror
                </div>
                <div class="flex space-x-5">
                    <a href="{{ route('settings') }}" class="secondary_button w-full">
                        Back
                    </a>
                    <button type="submit" class="button w-full" id="button" onclick="loading()">
                        <img aria-hidden="true" src="{{ asset('svg/loading_icon.svg') }}"
                            class="hidden w-4 h-4 mr-2 animate-spin" id="loading_icon">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
