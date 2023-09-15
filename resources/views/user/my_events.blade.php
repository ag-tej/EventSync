@extends('layouts.layout')
@section('title')
    My Events | EventSync
@endsection

@section('content')
    @include('components.explore_navbar')
    <section class="w-9/12 mx-auto text-gray-900 mb-12">
        <div class="bg-white my-8 py-3 px-5 rounded-md shadow">
            <p class="text-2xl font-semibold">My Events</p>
        </div>
        <div class="flex items-center justify-between flex-wrap gap-8">
            @foreach ($applicants as $applicant)
                <div class="border border-gray-200 rounded shadow hover:shadow-md p-7 w-[48%] h-60">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="text-2xl text-gray-900 font-semibold">{{ $applicant->event->title }}</p>
                            <p class="text-gray-700 font-medium">{{ $applicant->event->tagline }}</p>
                        </div>
                        @if ($applicant->event->link->website_link)
                            <a href="{{ $applicant->event->link->website_link }}" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 26 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="w-12 h-12 p-2 text-purple bg-purple/10 rounded-full hover:shadow-md">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                                </svg>
                            </a>
                        @endif
                    </div>
                    <div class="flex justify-between items-center my-4">
                        <div>
                            <div class="flex items-center gap-2 text-gray-700 font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <p>{{ $applicant->event->date->event_begins->format('F d, Y') }}</p>
                            </div>
                            <p class="text-gray-700 font-medium mt-1">{{ $applicant->event->category }}</p>
                        </div>
                        <p class="text-xl font-medium">Applied On: {{ $applicant->updated_at->format('d M') }}</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex gap-x-3 font-medium">
                            <p class="secondary_button">{{ $applicant->event->mode }}</p>
                            <p class="secondary_button">Status: {{ $applicant->status }}
                            </p>
                        </div>
                        <a href="{{ route('apply.event', $applicant->event->slug) }}" class="button">View Application</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    @include('components.footer')
@endsection
