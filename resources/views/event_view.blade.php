@extends('layouts.layout')
@section('title')
    {{ $event->title }} | EventSync
@endsection

@section('content')
    @include('components.explore_navbar')
    <section class="w-9/12 mx-auto text-gray-900 mb-12">
        <div class="w-full my-8 flex justify-center items-center gap-4">
            <img src="{{ asset('storage/' . $event->brand->logo) }}" class="h-24 rounded-xl" alt="event_logo">
            <p class="text-4xl font-bold">{{ $event->title }}</p>
        </div>
        <hr>
        <div class="my-8 flex justify-between items-start gap-12">
            <div class="w-2/3 aspect-video bg-cover rounded"
                style="background-image: url('{{ asset('storage/' . $event->brand->banner) }}')"></div>
            <div class="w-1/3 bg-white shadow rounded px-8 py-5">
                <div class="border-l-2 border-purple px-4 flex flex-col gap-4">
                    <div class="font-semibold">
                        <p class="text-gray-500">RUNS FROM</p>
                        <p class="text-xl">{{ $event->date->event_begins->format('F d, Y') }}</p>
                    </div>
                    <div class="font-semibold">
                        <p class="text-gray-500">HAPPENING</p>
                        <p class="text-xl">
                            @if ($event->venue)
                                {{ $event->venue }}
                            @else
                                Online
                            @endif
                        </p>
                    </div>
                    <div class="font-semibold">
                        <p class="text-gray-500">CATEGORY</p>
                        <p class="text-xl">{{ $event->category }}</p>
                    </div>
                </div>
                <div class="bg-purple/10 px-5 py-2 font-semibold rounded my-8">
                    @if ($event->date->application_open < $now)
                        @if ($event->date->application_close < $now)
                            <p class="text-red-400">APPLICATIONS CLOSED ON</p>
                        @else
                            <p class="text-purple/60">APPLICATIONS CLOSE ON</p>
                        @endif
                        <p class="text-xl text-purple">{{ $event->date->application_close->format('M d, h:i A') }}</p>
                    @else
                        <p class="text-purple/60">APPLICATIONS OPEN ON</p>
                        <p class="text-xl text-purple">{{ $event->date->application_open->format('M d, h:i A') }}</p>
                    @endif
                </div>
                @if (Auth::user() && $hasApplied)
                    <a href="{{ route('apply.event', $event->slug) }}" class="button w-full p-4">View Application Status</a>
                @else
                    @if ($event->date->application_open < $now && $event->date->application_close > $now)
                        <a href="{{ route('apply.event', $event->slug) }}" class="button w-full p-4">Apply Now</a>
                    @else
                        <button disabled class="button w-full p-4 opacity-60 cursor-not-allowed">Apply Now</button>
                    @endif
                @endif
            </div>
        </div>
        <div class="my-8 flex justify-between items-start gap-12">
            <div class="w-2/3 text-justify">
                <p>{!! $event->description !!}</p>
                @if ($event->link->code_of_conduct)
                    <div class="mt-8">
                        <p class="font-semibold text-2xl">Rules</p>
                        <a href="{{ $event->link->code_of_conduct }}" target="_blank"
                            class="text-purple font-semibold text-xl underline mt-2">Follow Code of Conduct</a>
                    </div>
                @endif
                @if ($event->approx_participants)
                    <div class="mt-8">
                        <p class="font-semibold text-2xl">Registration</p>
                        <p class="font-medium text-xl mt-2">Approx. Participants: {{ $event->approx_participants }}</p>
                        <p class="font-medium text-xl mt-2">Team Size: {{ $event->team_size }}</p>
                    </div>
                @endif
            </div>
            <div class="w-1/3 bg-white shadow rounded px-8 py-5 flex flex-col gap-6 justify-center items-start">
                <p class="font-semibold text-xl mb-2">SOCIAL CHANNELS</p>
                <a href="{{ $event->link->facebook_link }}" class="flex items-center gap-2 font-medium"><img
                        src="{{ asset('svg/facebook.svg') }}" class="h-6 object-contain aspect-3/2">{{ $event->title }} |
                    Facebook</a>
                <hr>
                <a href="{{ $event->link->instagram_link }}" class="flex items-center gap-2 font-medium"><img
                        src="{{ asset('svg/instagram.svg') }}" class="h-6 object-contain aspect-3/2">{{ $event->title }} |
                    Instagram</a>
                @if ($event->link->linkedin_link)
                    <hr>
                    <a href="{{ $event->link->linkedin_link }}" class="flex items-center gap-2 font-medium"><img
                            src="{{ asset('svg/linkedin.svg') }}"
                            class="h-6 object-contain aspect-3/2">{{ $event->title }} | LinkedIn</a>
                @endif
                @if ($event->link->discord_link)
                    <hr>
                    <a href="{{ $event->link->discord_link }}" class="flex items-center gap-2 font-medium"><img
                            src="{{ asset('svg/discord.svg') }}" class="h-6 object-contain aspect-3/2">{{ $event->title }}
                        | Discord</a>
                @endif
                <hr>
                <a href="mailto: {{ $event->link->contact_email }}" class="flex items-center gap-2 font-medium mb-2"><img
                        src="{{ asset('svg/gmail.svg') }}"
                        class="h-6 object-contain aspect-3/2">{{ $event->link->contact_email }}</a>
            </div>
        </div>
    </section>
    @include('components.footer')
@endsection
