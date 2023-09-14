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
            {{-- left section --}}
            <div class="w-2/3 flex flex-col gap-8">
                <div class="bg-white px-12 py-8 rounded shadow">
                    <p class="mx-auto mb-8 w-2/3 text-xl text-center font-medium">Submitting your application will share the
                        following details with <span class="font-semibold">{{ $event->title }}</span> organizers</p>
                    <div class="flex flex-col gap-6">
                        <div class="flex items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                            <div>
                                <p class="text-gray-900 font-semibold text-xl">About</p>
                                <p class="text-gray-500 font-medium">Your username, first name, last name, gender,
                                    occupation and dietary preference.</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                            </svg>
                            <div>
                                <p class="text-gray-900 font-semibold text-xl">Links</p>
                                <p class="text-gray-500 font-medium">Your social media profile links.</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-8 h-8">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                            </svg>
                            <div>
                                <p class="text-gray-900 font-semibold text-xl">Contact</p>
                                <p class="text-gray-500 font-medium">Your email, phone number and address.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-white px-12 py-8 rounded shadow">
                    @if (!$hasApplied)
                        <p class="mx-auto mb-8 w-2/3 text-xl text-center font-medium"><b>{{ $event->title }}</b>
                            organizers wish to know your details for evaluating your application.</p>
                        <form action="{{ route('submit.event', $event->slug) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                                <p class="mb-2 font-semibold text-red-500">Please answer all questions.</p>
                            @endif
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="event_id" value="{{ $event->id }}">
                            @foreach ($questions as $question)
                                <div class="mb-8">
                                    <input type="hidden" name="application_id_{{ $question->id }}"
                                        value="{{ $question->id }}">
                                    <label class="form_label">{{ $question->question }} *</label>
                                    <input type="text" name="answer_{{ $question->id }}" class="form_input"
                                        placeholder="{{ $question->placeholder }}">
                                </div>
                            @endforeach
                            <button type="submit" class="button float-right" id="button" onclick="loading()">
                                <img aria-hidden="true" src="{{ asset('svg/loading_icon.svg') }}"
                                    class="hidden w-4 h-4 mr-2 animate-spin" id="loading_icon">
                                Submit your application
                            </button>
                        </form>
                    @else
                        <p class="mb-8 text-xl text-center font-medium">You have submitted your application
                            for <b>{{ $event->title }}</b>.</p>
                        @if (count($answers))
                            <div class="mb-8">
                                <p class="text-xl font-semibold mb-2">Application Details</p>
                                @foreach ($answers as $answer)
                                    <div class="mb-4">
                                        <p class="font-medium">{{ $answer->application->question }}</p>
                                        <p class="text-gray-500 font-medium">{{ $answer->answer }}</p>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <p class="text-center font-medium mb-8">If you have any questions or concerns, please don't hesitate
                            to
                            contact the organizers of <b>{{ $event->title }}</b>. We're here to help and happy to assist
                            with anything you need!</p>
                        <form action="{{ route('withdraw.event', $event->slug) }}" method="POSt">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="danger_button float-right">Withdraw Your Application</button>
                        </form>
                    @endif
                </div>
            </div>
            {{-- right section --}}
            <div class="w-1/3 flex flex-col gap-8">
                <div class="bg-white shadow rounded px-8 py-5">
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
                    @if ($hasApplied)
                        <div class="bg-purple/10 px-5 py-2 font-semibold rounded mt-8">
                            <p class="text-purple/60">APPLICATION STATUS</p>
                            <p class="text-xl text-purple">{{ $hasApplied->status }}</p>
                        </div>
                    @endif
                </div>
                <div class="bg-white shadow rounded px-8 py-5 flex flex-col gap-6 justify-center items-start">
                    <p class="font-semibold text-xl mb-2">SOCIAL CHANNELS</p>
                    <a href="{{ $event->link->facebook_link }}" class="flex items-center gap-2 font-medium"><img
                            src="{{ asset('svg/facebook.svg') }}"
                            class="h-6 object-contain aspect-3/2">{{ $event->title }}
                        |
                        Facebook</a>
                    <hr>
                    <a href="{{ $event->link->instagram_link }}" class="flex items-center gap-2 font-medium"><img
                            src="{{ asset('svg/instagram.svg') }}"
                            class="h-6 object-contain aspect-3/2">{{ $event->title }} |
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
                                src="{{ asset('svg/discord.svg') }}"
                                class="h-6 object-contain aspect-3/2">{{ $event->title }}
                            | Discord</a>
                    @endif
                    <hr>
                    <a href="mailto: {{ $event->link->contact_email }}"
                        class="flex items-center gap-2 font-medium mb-2"><img src="{{ asset('svg/gmail.svg') }}"
                            class="h-6 object-contain aspect-3/2">{{ $event->link->contact_email }}</a>
                </div>
            </div>
        </div>
    </section>
    @include('components.footer')
@endsection
