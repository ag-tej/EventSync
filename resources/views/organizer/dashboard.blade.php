@extends('layouts.layout')
@section('title')
    Organizer Dashboard | EventSync
@endsection

@section('content')
    @include('components.organizer_navbar')

    {{-- tabs section --}}
    <div class="my-4 border-b border-gray-300">
        <ul class="w-9/12 mx-auto flex justify-between items-center" id="myTab" data-tabs-toggle="myTabContent"
            role="tablist">
            <div class="text-lg flex space-x-2">
                <li role="presentation">
                    <button class="inline-block p-2 border-b-2" id="in-progress-tab" data-tabs-target="#in-progress"
                        type="button" role="tab" aria-controls="in-progress" aria-selected="false">In progress
                        @if ($inProgress_count > 0)
                            <sup
                                class="text-sm ml-2 bg-gray-500 text-white rounded-full px-1.5 animate-pulse delay-[9000] duration-[9000]">
                                {{ $inProgress_count }}
                            </sup>
                        @endif
                    </button>
                </li>
                <li role="presentation">
                    <button class="inline-block p-2 border-b-2" id="drafts-tab" data-tabs-target="#drafts" type="button"
                        role="tab" aria-controls="drafts" aria-selected="false">Drafts
                        @if ($draft_count > 0)
                            <sup
                                class="text-sm ml-2 bg-gray-500 text-white rounded-full px-1.5 animate-pulse delay-[9000] duration-[9000]">
                                {{ $draft_count }}
                            </sup>
                        @endif
                    </button>
                </li>
                <li role="presentation">
                    <button class="inline-block p-2 border-b-2" id="previous-tab" data-tabs-target="#previous"
                        type="button" role="tab" aria-controls="previous" aria-selected="false">Previous
                        @if ($previous_count > 0)
                            <sup
                                class="text-sm ml-2 bg-gray-500 text-white rounded-full px-1.5 animate-pulse delay-[9000] duration-[9000]">
                                {{ $previous_count }}
                            </sup>
                        @endif
                    </button>
                </li>
            </div>
            <div class="mb-2 flex items-center gap-8">
                <a href="#" class="secondary_button">View Invitations</a>
                <button class="button" onclick="document.getElementById('create_events').style.visibility = 'visible'">
                    Create New Event
                </button>
            </div>
        </ul>
    </div>
    {{-- content section --}}
    <div id="myTabContent" class="w-9/12 mx-auto">
        {{-- in-progress section --}}
        <div class="hidden" id="in-progress" role="tabpanel" aria-labelledby="in-progress-tab">
            <div class="mt-8 mb-16 w-full flex items-center flex-wrap gap-8">
                @foreach ($inProgress as $progress)
                    <div class="bg-white text-gray-500 rounded shadow-md px-12 py-8 w-[362.667px]">
                        <div class="flex justify-between items-start">
                            <div>
                                @if ($progress->brand->logo)
                                    <div class="rounded-full aspect-square w-16 bg-cover mb-2"
                                        style="background-image: url({{ asset('storage/' . $progress->brand->logo) }})">
                                    </div>
                                @endif
                                <p class="text-2xl text-gray-900">{{ $progress->title }}</p>
                                <p class="text-sm">{{ $progress->mode }}</p>
                            </div>
                            <a href="{{ route('drafts.basics', $progress->slug) }}" class="secondary_button py-1">Update</a>
                        </div>
                        <hr class="border-gray-300 my-4">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                <rect x="3" y="4" width="18" height="18" rx="2"
                                    ry="2"></rect>
                                <path d="M16 2v4M8 2v4M3 10h18"></path>
                            </svg>
                            @if ($progress->date->event_begins->format('YMD') === $progress->date->event_ends->format('YMD'))
                                <p>{{ $progress->date->event_begins->format('F d, Y') }}</p>
                            @else
                                <p>{{ $progress->date->event_begins->format('F d') }} -
                                    {{ $progress->date->event_ends->format('d, Y') }}</p>
                            @endif
                        </div>
                        <button class="button w-full mt-4">
                            Open Dashboard
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- drafts section --}}
        <div class="hidden" id="drafts" role="tabpanel" aria-labelledby="drafts-tab">
            <div class="mt-8 mb-16 w-full flex items-center flex-wrap gap-8">
                @foreach ($drafts as $draft)
                    <div class="bg-white text-gray-500 rounded shadow-md px-12 py-8 w-[362.667px]">
                        <p class="text-2xl text-gray-900">{{ $draft->title }}</p>
                        <p class="text-sm text-gray-500 mb-4">{{ $draft->mode }}</p>
                        <p class="bg-gray-100 w-fit px-3 py-2 rounded mb-4">{{ $draft->category }}</p>
                        <p>Last updated: {{ $draft->updated_at->format('M d, Y') }}</p>
                        <div class="flex space-x-5 mt-4">
                            <button class="danger_button w-full">
                                Delete
                            </button>
                            <a href="{{ route('drafts.basics', $draft->slug) }}" class="button w-full">
                                Continue
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        {{-- previous section --}}
        <div class="hidden" id="previous" role="tabpanel" aria-labelledby="previous-tab">
            <div class="mt-8 mb-16 w-full flex items-center flex-wrap gap-8">
                @foreach ($previous as $past)
                    <div class="bg-white text-gray-500 rounded shadow-md px-12 py-8 w-[362.667px]">
                        @if ($past->brand->logo)
                            <div class="rounded-full aspect-square w-16 bg-cover mb-2"
                                style="background-image: url({{ asset('storage/' . $past->brand->logo) }})">
                            </div>
                        @endif
                        <p class="text-2xl text-gray-900">{{ $past->title }}</p>
                        <p class="text-sm">{{ $past->mode }}</p>
                        <hr class="border-gray-300 my-4">
                        <div class="flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5">
                                <rect x="3" y="4" width="18" height="18" rx="2"
                                    ry="2"></rect>
                                <path d="M16 2v4M8 2v4M3 10h18"></path>
                            </svg>
                            @if ($past->date->event_begins->format('YMD') === $past->date->event_ends->format('YMD'))
                                <p>{{ $past->date->event_begins->format('F d, Y') }}</p>
                            @else
                                <p>{{ $past->date->event_begins->format('F d') }} -
                                    {{ $past->date->event_ends->format('d, Y') }}</p>
                            @endif
                        </div>
                        <button class="button w-full mt-4">
                            Open Dashboard
                        </button>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- create event popup --}}
    @include('organizer.popup.create_event')
@endsection
