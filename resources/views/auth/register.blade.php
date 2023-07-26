@extends('layouts.layout')

@section('title')
    Get Started | EventSync
@endsection

@section('content')
    @include('components.navbar')

    {{-- register form --}}
    <a href="/" class="cursor-default">
        <div class="backdrop">
        </div>
    </a>
    <div class="popup_center">
        <div class="popup animate-open">
            <p class="mb-1 font-bold text-4xl">Sign up</p>
            <p class="mb-4 text-gray-500 font-semibold">Already have an account?
                <a href="/login" class="text-purple hover:underline">Sign in</a>
            </p>
            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" id="form">
                @csrf
                <div class="mb-4">
                    <label for="name" class="form_label">User Name</label>
                    <input type="text" id="name" name="name" class="form_input">
                    @error('name')
                        <script>
                            document.getElementById('name').classList.add('border-red-500')
                        </script>
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
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
                </div>
                <button type="submit" class="button w-full" id="button" onclick="loading()">
                    <img aria-hidden="true" src="{{ asset('svg/loading_icon.svg') }}"
                        class="hidden w-4 h-4 mr-2 animate-spin" id="loading_icon">
                    Sign up
                </button>
            </form>
        </div>
    </div>
@endsection
