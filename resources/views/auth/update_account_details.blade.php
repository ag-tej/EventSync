@extends('layouts.layout')

@section('title')
    Update Account Details | EventSync
@endsection

@section('content')
    @include('components.explore_navbar')

    {{-- update account details form --}}
    <a href="{{ route('settings') }}" class="cursor-default">
        <div class="backdrop">
        </div>
    </a>
    <div class="popup_center">
        <div data-aos="zoom-in" data-aos-duration="300" class="popup">
            <p class="mb-4 font-bold text-lg">Update Account Details</p>
            <form action="{{ route('user-profile-information.update') }}" method="POST" enctype="multipart/form-data"
                id="form">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="username" class="form_label">Username</label>
                    <input type="text" id="username" name="username" class="form_input"
                        value="{{ Auth::user()->username }}">
                    @error('username')
                        <script>
                            document.getElementById('username').classList.add('border-red-500')
                        </script>
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="form_label">Email address</label>
                    <input type="email" id="email" name="email" class="form_input"
                        value="{{ Auth::user()->email }}">
                    @error('email')
                        <script>
                            document.getElementById('email').classList.add('border-red-500')
                        </script>
                        <p class="text-sm text-red-500">{{ $message }}</p>
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
