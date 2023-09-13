@extends('layouts.layout')
@section('title')
    Explore | EventSync
@endsection

@section('content')
    @include('components.explore_navbar')

    <section class="w-9/12 mx-auto text-gray-900 mb-12">
        {{-- search box --}}
        <div class="bg-white my-8 py-3 px-5 rounded-md shadow">
            <input type="text" class="form_input text-xl" placeholder="Type to begin search, or use the global shortcut">
        </div>
        {{-- featured event --}}
        <div class="flex justify-between items-center gap-12 my-12">
            <div class="w-[50%] h-64 rounded bg-cover"
                style="background-image: url('https://devfolio.co/_next/image?url=https%3A%2F%2Fassets.devfolio.co%2Fcontent%2Fa1f504bee74b4f19be305d409aa4fc16%2F28dbc73c-a915-47f7-ad1a-0e98e4243b9e.png&w=1440&q=75')">
            </div>
            <div class="border border-gray-200 rounded shadow hover:shadow-md p-8 w-[50%] h-64">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="text-2xl text-gray-900 font-semibold">Web3 Hackfest</p>
                        <p class="text-gray-700 font-medium">Fawning over Innovation</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 26 24" stroke-width="1.5"
                        stroke="currentColor"
                        class="w-12 h-12 p-2 text-purple bg-purple/10 rounded-full hover:shadow-md cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                    </svg>
                </div>
                <div class="flex justify-between items-center my-4">
                    <div>
                        <div class="flex items-center gap-2 text-gray-700 font-medium">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p>October 01, 2023</p>
                        </div>
                        <p class="text-gray-700 font-medium mt-1">Academic Engagements</p>
                    </div>
                    <p class="text-2xl font-semibold">+500 participants</p>
                </div>
                <div class="flex items-center justify-between">
                    <div class="flex gap-x-4 font-medium">
                        <p class="secondary_button">Online</p>
                        <p class="secondary_button">Open</p>
                        <p class="secondary_button">Starts Oct 15, 2023</p>
                    </div>
                    <button class="button">Apply Now</button>
                </div>
            </div>
        </div>
        {{-- open events --}}
        <section>
            <div class="flex gap-3 items-baseline text-3xl font-bold mt-16 mb-8">
                <p>Open</p>
                <hr class="w-full border-gray-300 border">
            </div>
            <div class="flex items-center justify-between flex-wrap gap-8">
                @foreach ($opens as $open)
                    <div class="border border-gray-200 rounded shadow hover:shadow-md p-8 w-[48%] h-64">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-2xl text-gray-900 font-semibold">{{ $open->title }}</p>
                                <p class="text-gray-700 font-medium">{{ $open->tagline }}</p>
                            </div>
                            <a href="{{ $open->link->facebook_link }}" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 26 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="w-12 h-12 p-2 text-purple bg-purple/10 rounded-full hover:shadow-md">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                                </svg>
                            </a>
                        </div>
                        <div class="flex justify-between items-center my-4">
                            <div>
                                <div class="flex items-center gap-2 text-gray-700 font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <p>{{ $open->date->application_close->format('F d, Y') }}</p>
                                </div>
                                <p class="text-gray-700 font-medium mt-1">{{ $open->category }}</p>
                            </div>
                            <p class="text-2xl font-semibold">+500 participants</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex gap-x-3 font-medium">
                                <p class="secondary_button">{{ $open->mode }}</p>
                                <p class="secondary_button">Starts {{ $open->date->event_begins->format('M d, Y') }}</p>
                            </div>
                            <button class="button">Apply Now</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        {{-- upcoming events --}}
        <section>
            <div class="flex gap-3 items-baseline text-3xl font-bold mt-16 mb-8">
                <p>Upcoming</p>
                <hr class="w-full border-gray-300 border">
            </div>
            <div class="flex items-center justify-between flex-wrap gap-8">
                @foreach ($upcomings as $upcoming)
                    <div class="border border-gray-200 rounded shadow hover:shadow-md p-8 w-[48%] h-64">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-2xl text-gray-900 font-semibold">{{ $upcoming->title }}</p>
                                <p class="text-gray-700 font-medium">{{ $upcoming->tagline }}</p>
                            </div>
                            <a href="{{ $upcoming->link->facebook_link }}" target="_blank">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 26 24"
                                    stroke-width="1.5" stroke="currentColor"
                                    class="w-12 h-12 p-2 text-purple bg-purple/10 rounded-full hover:shadow-md">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                                </svg>
                            </a>
                        </div>
                        <div class="flex justify-between items-center my-4">
                            <div>
                                <div class="flex items-center gap-2 text-gray-700 font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" class="w-5 h-5">
                                        <rect x="3" y="4" width="18" height="18"
                                            rx="2" ry="2"></rect>
                                        <path d="M16 2v4M8 2v4M3 10h18"></path>
                                    </svg>
                                    <p>{{ $upcoming->date->event_begins->format('F d, Y') }}</p>
                                </div>
                                <p class="text-gray-700 font-medium mt-1">{{ $upcoming->category }}</p>
                            </div>
                            <p class="text-2xl font-semibold">250 seats available</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex gap-x-3 font-medium">
                                <p class="secondary_button">{{ $upcoming->mode }}</p>
                                <p class="secondary_button">Opens
                                    {{ $upcoming->date->application_open->format('M d, Y') }}</p>
                            </div>
                            <button class="button">Remind Me</button>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
        {{-- past events --}}
        <section>
            <div class="flex gap-3 items-baseline text-3xl font-bold mt-16 mb-8">
                <p>Past</p>
                <hr class="w-full border-gray-300 border">
            </div>
            <div class="flex items-center justify-between flex-wrap gap-8">
                @for ($i = 0; $i < 4; $i++)
                    <div class="border border-gray-200 rounded shadow hover:shadow-md p-8 w-[48%] h-64">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-2xl text-gray-900 font-semibold">Web3 Hackfest</p>
                                <p class="text-gray-700 font-medium">Fawning over Innovation</p>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 26 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="w-12 h-12 p-2 text-purple bg-purple/10 rounded-full hover:shadow-md">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244" />
                            </svg>
                        </div>
                        <div class="flex justify-between items-center my-4">
                            <div>
                                <div class="flex items-center gap-2 text-gray-700 font-medium">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" class="w-5 h-5">
                                        <rect x="3" y="4" width="18" height="18"
                                            rx="2" ry="2"></rect>
                                        <path d="M16 2v4M8 2v4M3 10h18"></path>
                                    </svg>
                                    <p>August 18, 2023</p>
                                </div>
                                <p class="text-gray-700 font-medium mt-1">Academic Engagements</p>
                            </div>
                            <p class="text-2xl font-semibold">300 participated</p>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="flex gap-x-3 font-medium">
                                <p class="secondary_button">In-Person</p>
                                <p class="secondary_button">Ended Aug 20, 2023</p>
                            </div>
                            <button class="button">See Details</button>
                        </div>
                    </div>
                @endfor
            </div>
        </section>
    </section>
    @include('components.footer')
@endsection
