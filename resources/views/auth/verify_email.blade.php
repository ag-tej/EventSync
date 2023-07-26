@extends('layouts.layout')

@section('title')
    Verify Email | EventSync
@endsection

@section('content')
    @include('components.explore_navbar')

    {{-- verify email --}}
    <div class="backdrop">
    </div>
    <div class="popup_center">
        <div class="popup animate-open">
            <div class="max-w-xl text-center">
                <h2 class="mb-4 text-[40px] font-bold text-[#303030]">Check your inbox</h2>
                <p class="mb-4 text-lg text-gray-500">We are glad, that you're with us ? We've sent you a verification link
                    to the email address
                    <span class="font-medium text-purple">{{ Auth::user()->email }}</span>.
                </p>
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit"
                        class="inline-block w-96 rounded bg-purple px-5 py-3 font-medium text-white hover:shadow-md hover:shadow-indigo-500/20">
                        Resend Verification Link
                    </button>
                </form>
                @if (session('status'))
                    <div class="mt-2 text-purple">
                        Verification link has been resent to your email.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
