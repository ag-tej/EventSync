@extends('layouts.layout')

@section('title')
    Reset Password | EventSync
@endsection

@section('content')
    @include('components.navbar')

    {{-- register form --}}
    <div class="backdrop">
    </div>
    <div class="popup_center">
        <div data-aos="zoom-in" data-aos-duration="300" class="popup">
            <p class="mb-4 font-bold text-4xl">Reset Password</p>
            <form action="{{ route('password.update') }}" method="POST" enctype="multipart/form-data" id="form">
                @csrf
                <div class="mb-4">
                    <label for="email" class="form_label">Email address</label>
                    <input type="email" id="email" name="email" class="form_input">
                    @error('email')
                        <script>
                            document.getElementById('email').classList.add('border-red-500')
                        </script>
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="form_label">Password</label>
                    <input type="password" id="password" name="password" class="form_input">
                    @error('password')
                        <script>
                            document.getElementById('password').classList.add('border-red-500')
                        </script>
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="form_label">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form_input">
                    @error('password_confirmation')
                        <script>
                            document.getElementById('password_confirmation').classList.add('border-red-500')
                        </script>
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                    @if (session('status'))
                        <div class="text-sm text-purple">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <input type="hidden" name="token" value="{{ request()->route('token') }}">
                <button type="submit" class="button w-full" id="button" onclick="loading()">
                    <img aria-hidden="true" src="{{ asset('svg/loading_icon.svg') }}"
                        class="hidden w-4 h-4 mr-2 animate-spin" id="loading_icon">
                    Reset Password
                </button>
            </form>
        </div>
    </div>
@endsection
