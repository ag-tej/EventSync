@extends('layouts.layout')

@section('title')
    EventSync - Synchronize and Manage Events with Ease
@endsection

@section('content')
    @include('components.navbar')

    <div class="w-9/12 mx-auto text-gray-900">
        {{-- animated section --}}
        <div class="my-8 text-center text-5xl leading-snug font-bold font-mono">
            <p>The Platform to</p>
            <div class="h-[67px] overflow-hidden">
                <span class="relative animate-textChange">
                    <span style="color:#4DAF00">Start</span>🔥<br>
                    <span style="color:#0091BF">Manage</span>⚡️<br>
                    <span style="color:#FF8515">Scale</span>🚀<br>
                    <span style="color:#C03AFF">Automate</span>🤩<br>
                </span>
            </div>
            <p>your splendid Events</p>
        </div>
        {{-- happening now --}}
        <div class="my-16">
            <p class="text-center text-5xl font-semibold">Happening Now</p>
            <div class="my-8 flex gap-10">
                @for ($i = 0; $i < 3; $i++)
                    <div
                        class="border border-gray-200 border-t-8 border-t-gray-700 rounded shadow hover:shadow-md p-8 flex flex-col flex-[1]">
                        <p class="text-2xl font-semibold">StatusCode 0</p>
                        <p class="text-gray-700">September 10, 2023</p>
                        <p class="text-sm text-gray-500">In-Person</p>
                        <p class="bg-gray-100 w-fit px-3 py-2 rounded my-4">Academic Engagements</p>
                        <p class="text-lg text-gray-700">Kathmandu, Nepal</p>
                        <Button class="button w-full mx-auto mt-4">
                            Participate
                        </Button>
                    </div>
                @endfor
            </div>
            <div class="text-center">
                <a href="{{ route('explore') }}"
                    class="text-center text-xl font-semibold text-purple hover:underline">Explore</a>
            </div>
        </div>
        {{-- feature section --}}
        <div id="features" class="pt-8"></div>
        <div>
            <div class="mb-16 w-2/3 mx-auto aspect-3/2 bg-cover"
                style="background-image: url('{{ asset('svg/abstract1.svg') }}')"></div>
            <img src="{{ asset('svg/icon1.svg') }}" class="absolute right-[25rem] -mt-32 w-44">
            <div class="flex gap-4 justify-center items-baseline text-8xl font-extrabold">
                <p>EventSync is</p>
                <hr class="w-48 border-2 border-purple">
            </div>
        </div>
        {{-- portal to best events --}}
        <div class="my-16">
            <div class="flex items-center justify-center gap-16">
                <div>
                    <p class="text-gray-700 text-4xl font-semibold mb-2">Your portal to the best events</p>
                    <p class="text-gray-500 text-xl mb-4">Applying to events on EventSync is as simple as a click of a
                        button. We save all the required info so that you don't have to fill them over and over again.</p>
                    <a href="{{ route('explore') }}" class="button text-lg">Explore all events</a>
                </div>
                <img src="{{ asset('svg/icon3.svg') }}" class="w-80" data-aos="zoom-in">
            </div>
            <img src="{{ asset('svg/abstract2.svg') }}" class="w-3/5 mx-auto" data-aos="fade-in" data-aos-duration="1000">
        </div>
        {{-- tool to collaborate --}}
        <div class="my-16">
            <div class="flex items-center justify-center gap-16">
                <div>
                    <p class="text-gray-700 text-4xl font-semibold mb-2">A tool to invite and collaborate</p>
                    <p class="text-gray-500 text-xl mb-4">Give your co-workers a place to breathe. With EventSync, you can
                        invite collaborators, track stats and inspire others to build masterpiece events.</p>
                    <a href="{{ route('register') }}" class="button text-lg">Get Started</a>
                </div>
                <img src="{{ asset('svg/icon4.svg') }}" class="w-80" data-aos="zoom-in">
            </div>
            <img src="{{ asset('svg/abstract3.svg') }}" class="w-3/5 mx-auto" data-aos="fade-in" data-aos-duration="1000">
        </div>
        {{-- we speak listen grow --}}
        <div class="my-16">
            <div class="flex items-center justify-center gap-16">
                <img src="{{ asset('svg/icon5.svg') }}" class="w-96" data-aos="zoom-in">
                <div>
                    <p class="text-gray-700 text-6xl font-semibold mb-2">We speak, we listen, we discuss, we grow.</p>
                    <p class="text-gray-500 text-xl mb-4">Share ideas, feedback, connect with people over the love of our
                        community.</p>
                    <a href="{{ route('register') }}" class="button text-lg">Join our Discord Server</a>
                </div>
            </div>
        </div>
    </div>
@endsection
