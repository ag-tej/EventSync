@extends('layouts.layout')

@section('title')
    Forgot Password | EventSync
@endsection

@section('content')
    @include('components.navbar')

    {{-- forgot password form --}}
    <a href="/" class="cursor-default">
        <div class="backdrop">
        </div>
    </a>
    <div class="popup_center">
        <div data-aos="zoom-in" data-aos-duration="300" class="popup">
            <p class="mb-1 font-bold text-4xl">Forgot Password?</p>
            <p class="mb-4 text-gray-500 font-semibold">Remember your account?
                <a href="{{ route('login') }}" class="text-purple hover:underline">Sign in</a>
            </p>
            <form action="{{ route('password.email') }}" method="POST" enctype="multipart/form-data" id="form">
                @csrf
                <div class="mb-4">
                    <label for="email" class="form_label">Email address</label>
                    <input type="email" id="email" name="email"
                        class="form_input @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                    @if (session('status'))
                        <div class="mt-1 text-sm text-purple">{{ session('status') }}</div>
                    @endif
                </div>
                <button type="submit" class="button w-full" id="button" onclick="loading()">
                    <img aria-hidden="true" src="{{ asset('svg/loading_icon.svg') }}"
                        class="hidden w-4 h-4 mr-2 animate-spin" id="loading_icon">
                    Request Reset Link
                </button>
            </form>
        </div>
    </div>
@endsection
