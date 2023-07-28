@extends('layouts.layout')

@section('title')
    Sign in | EventSync
@endsection

@section('content')
    @include('components.navbar')

    {{-- login form --}}
    <a href="/" class="cursor-default">
        <div class="backdrop">
        </div>
    </a>
    <div class="popup_center">
        <div data-aos="zoom-in" data-aos-duration="300" class="popup">
            <p class="mb-1 font-bold text-4xl">Sign in</p>
            <p class="mb-4 text-gray-500 font-semibold">Don't have an account?
                <a href="/register" class="text-purple hover:underline">Sign up</a>
            </p>
            <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data" id="form">
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
                    <p class="text-purple font-semibold hover:underline">
                        <a href="#">Forgot password?</a>
                    </p>
                </div>
                <button type="submit" class="button w-full" id="button" onclick="loading()">
                    <img aria-hidden="true" src="{{ asset('svg/loading_icon.svg') }}"
                        class="hidden w-4 h-4 mr-2 animate-spin" id="loading_icon">
                    Sign in
                </button>
            </form>
        </div>
    </div>
@endsection
