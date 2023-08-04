@extends('layouts.layout')
@section('title')
    Settings | EventSync
@endsection

@section('content')
    @include('components.explore_navbar')

    {{-- tabs section --}}
    <div class="my-4 border-b border-gray-300">
        <ul class="w-9/12 mx-auto text-lg flex space-x-2" id="myTab" data-tabs-toggle="myTabContent" role="tablist">
            <li role="presentation">
                <button class="inline-block p-2 border-b-2" id="general-tab" data-tabs-target="#general" type="button"
                    role="tab" aria-controls="general" aria-selected="false">General</button>
            </li>
            <li role="presentation">
                <button class="inline-block p-2 border-b-2" id="email-notification-tab"
                    data-tabs-target="#email-notification" type="button" role="tab" aria-controls="email-notification"
                    aria-selected="false">Email
                    Notifications</button>
            </li>
        </ul>
    </div>
    {{-- content section --}}
    <div id="myTabContent" class="w-9/12 mx-auto">
        {{-- general section --}}
        <div class="hidden" id="general" role="tabpanel" aria-labelledby="general-tab">
            <div class="mt-8 mb-16 w-full flex">
                {{-- left section --}}
                <div class="w-1/2 pr-8 flex flex-col gap-8">
                    {{-- update block --}}
                    <div class="px-12 py-8 rounded border shadow-md flex flex-col gap-5">
                        <div class="flex gap-8 items-center">
                            <div class="rounded-full aspect-square w-28 bg-cover"
                                @if (Auth::user()->profile->image) style="background-image: url({{ asset('storage/' . Auth::user()->profile->image) }})"
                            @else
                            style="background-image: url({{ asset('avatar/user_avatar.png') }})" @endif>
                            </div>
                            <div class="flex flex-col gap-3 w-full">
                                <div>
                                    <button id="selectFileButton" class="button w-full text-lg">
                                        Upload New Avatar
                                    </button>
                                    <form id="uploadForm" action="{{ route('update.avatar') }}" method="POST"
                                        enctype="multipart/form-data" style="display: none">
                                        @csrf
                                        <input type="file" name="image" id="fileInput" />
                                    </form>
                                    @error('image')
                                        <p class="text-sm text-red-500">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    @if (Auth::user()->profile->image)
                                        <form action="{{ route('delete.avatar') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="danger_button text-lg w-full">
                                                Delete Avatar
                                            </button>
                                        </form>
                                    @else
                                        <button disabled
                                            class="button w-full text-lg bg-red-500 opacity-50 hover:shadow-none cursor-not-allowed">
                                            Delete Avatar
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <hr class="border-gray-500">
                        <div>
                            <p class="text-gray-900 text-lg">Account Details</p>
                            <p class="text-gray-700">Update your account's username and email address.</p>
                            <p class="text-gray-500 italic mb-4">Last updated:
                                {{ Auth::user()->updated_at->format('M d, Y') }}</p>
                            <a href="{{ route('update.account') }}" class="button w-full text-lg">Change Account
                                Details</a>
                        </div>
                        <hr class="border-gray-500">
                        <div>
                            <p class="text-gray-900 text-lg">Password</p>
                            <p class="text-gray-700 mb-4">Update your account's password.</p>
                            <a href="{{ route('update.password') }}" class="button w-full text-lg">Change Password</a>
                        </div>
                    </div>
                    {{-- delete block --}}
                    <div class="px-12 py-8 rounded border shadow-md">
                        <p class="text-gray-900 text-lg">Delete Account</p>
                        <p class="text-gray-700 mb-4">Permanently delete your account including your awesome EventSync
                            profile.</p>
                        <form id="delete_account" action="{{ route('delete.account', Auth::user()->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="button w-full text-lg bg-red-500 hover:shadow-red-500/30"
                                onclick="document.getElementById('confirmation_box').className = 'block'; document.documentElement.scrollTop = 0;">Delete</button>
                        </form>
                    </div>
                </div>
                {{-- right section --}}
                <div class="w-1/2 pl-8 flex flex-col gap-8">
                    {{-- qr block --}}
                    <div class="px-12 py-8 rounded border shadow-md">
                        <p class="text-gray-900 text-lg mb-4">My EventSync QR Code</p>
                        {!! QrCode::size(200)->color(122, 30, 227)->generate(Auth::user()->username) !!}
                    </div>
                    {{-- link accounts block --}}
                    <div class="px-12 py-8 rounded border shadow-md">
                        <form action="{{ route('update.links.profile') }}" method="POST" enctype="multipart/form-data"
                            id="form">
                            @csrf
                            @method('PUT')
                            <p class="text-gray-900 text-lg">Link Accounts</p>
                            <p class="text-gray-700 mb-4">Link your Facebook, Instagram and LinkedIn accounts to EventSync.
                            </p>
                            <div class="mb-4">
                                <label for="facebook_link" class="form_label">Facebook</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-2">
                                        <a
                                            @if (Auth::user()->profile->facebook_link) href="{{ Auth::user()->profile->facebook_link }}" target="_blank" @endif>
                                            <img src="{{ asset('svg/facebook.svg') }}" alt="facebook"
                                                class="h-5 object-contain aspect-3/2"></a>
                                    </div>
                                    <input type="url" id="facebook_link" name="facebook_link" class="form_input px-12"
                                        value="{{ Auth::user()->profile->facebook_link }}">
                                    @if (Auth::user()->profile->facebook_link)
                                        <button onclick="document.getElementById('facebook_link').value = ''"
                                            class="absolute inset-y-0 right-0 flex items-center pr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                                @error('facebook_link')
                                    <script>
                                        document.getElementById('facebook_link').classList.add('border-red-500');
                                    </script>
                                    <p class="text-sm text-red-500">Please enter a valid link.</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="instagram_link" class="form_label">Instagram</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-2">
                                        <a
                                            @if (Auth::user()->profile->instagram_link) href="{{ Auth::user()->profile->instagram_link }}" target="_blank" @endif>
                                            <img src="{{ asset('svg/instagram.svg') }}" alt="instagram"
                                                class="h-5 object-contain aspect-3/2"></a>
                                    </div>
                                    <input type="url" id="instagram_link" name="instagram_link"
                                        class="form_input px-12" value="{{ Auth::user()->profile->instagram_link }}">
                                    @if (Auth::user()->profile->instagram_link)
                                        <button onclick="document.getElementById('instagram_link').value = ''"
                                            class="absolute inset-y-0 right-0 flex items-center pr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                                @error('instagram_link')
                                    <script>
                                        document.getElementById('instagram_link').classList.add('border-red-500');
                                    </script>
                                    <p class="text-sm text-red-500">Please enter a valid link.</p>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="linkedin_link" class="form_label">LinkedIn</label>
                                <div class="relative">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-2">
                                        <a
                                            @if (Auth::user()->profile->linkedin_link) href="{{ Auth::user()->profile->linkedin_link }}" target="_blank" @endif>
                                            <img src="{{ asset('svg/linkedin.svg') }}" alt="linkedin"
                                                class="h-5 object-contain aspect-3/2"></a>
                                    </div>
                                    <input type="url" id="linkedin_link" name="linkedin_link"
                                        class="form_input px-12" value="{{ Auth::user()->profile->linkedin_link }}">
                                    @if (Auth::user()->profile->linkedin_link)
                                        <button onclick="document.getElementById('linkedin_link').value = ''"
                                            class="absolute inset-y-0 right-0 flex items-center pr-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-red-500">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                                @error('linkedin_link')
                                    <script>
                                        document.getElementById('linkedin_link').classList.add('border-red-500');
                                    </script>
                                    <p class="text-sm text-red-500">Please enter a valid link.</p>
                                @enderror
                            </div>
                            <button type="submit" class="button w-fit float-right" id="button" onclick="loading()">
                                <img aria-hidden="true" src="{{ asset('svg/loading_icon.svg') }}"
                                    class="hidden w-4 h-4 mr-2 animate-spin" id="loading_icon">
                                Save Changes
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- email notification section --}}
        <div class="hidden" id="email-notification" role="tabpanel" aria-labelledby="email-notification-tab">
            <div class="mt-8 mb-16 w-full flex">
                {{-- left section --}}
                <div class="w-1/2 pr-8 flex flex-col gap-8">
                    <div class="px-12 py-8 rounded border shadow-md">
                        <p class="text-gray-700 text-justify mb-8">
                            At EventSync, we want to ensure that you receive relevant and valuable information about the
                            events and initiatives that matter most to you.
                        </p>
                        <div class="mb-8">
                            <p class="text-gray-700 mb-4">We will send you emails regarding the following:</p>
                            <div class="flex items-center gap-3 mb-4">
                                <input type="checkbox" id="eventsync_updates" name="eventsync_updates" value="1"
                                    class="w-4 h-4 text-purple bg-white rounded">
                                <label for="eventsync_updates" class="form_label mb-0">EventSync Updates</label>
                            </div>
                            <div class="flex items-center gap-3 mb-4">
                                <input type="checkbox" id="upcoming_events" name="upcoming_events" value="1"
                                    class="w-4 h-4 text-purple bg-white rounded">
                                <label for="upcoming_events" class="form_label mb-0">Upcoming Events</label>
                            </div>
                            <div class="flex items-center gap-3 mb-4">
                                <input type="checkbox" id="community_newsletter" name="community_newsletter"
                                    value="1" class="w-4 h-4 text-purple bg-white rounded">
                                <label for="community_newsletter" class="form_label mb-0">Community Newsletter</label>
                            </div>
                            <div class="flex items-center gap-3">
                                <input type="checkbox" id="partner_initiatives" name="partner_initiatives"
                                    value="1" class="w-4 h-4 text-purple bg-white rounded">
                                <label for="partner_initiatives" class="form_label mb-0">Partner Initiatives</label>
                            </div>
                        </div>
                        <p class="text-gray-700 text-justify">
                            Thank you for being a part of the EventSync community. We look forward to keeping you informed
                            about the events that matter most to you.
                        </p>
                    </div>
                </div>
                {{-- right section --}}
                <div class="w-1/2 pl-8 flex flex-col gap-8">
                    {{-- email preferences --}}
                    <div class="px-12 py-8 rounded border shadow-md">
                        <div class="flex items-center gap-2 mb-4">
                            <img src="{{ asset('svg/gmail.svg') }}" alt="email"
                                class="h-6 object-contain aspect-3/2">
                            <p class="text-gray-900 text-lg font-medium">Manage Your Email Preferences</p>
                        </div>
                        <p class="text-gray-700 text-justify mb-2">
                            We understand that your preferences may change over time, and we want to give you full control
                            over the content you receive.
                        </p>
                        <p class="text-gray-700 text-justify">
                            You can easily manage your email preferences at any time by accessing your account settings on
                            the EventSync platform.
                        </p>
                    </div>
                    {{-- stay connected --}}
                    <div class="px-12 py-8 rounded border shadow-md">
                        <div class="flex items-center gap-2 mb-4">
                            <img src="{{ asset('svg/favicon.svg') }}" alt="connected"
                                class="h-6 object-contain aspect-3/2">
                            <p class="text-gray-900 text-lg font-medium">Stay Informed, Stay Connected</p>
                        </div>
                        <p class="text-gray-700 text-justify mb-2">
                            At EventSync, we believe in fostering a vibrant and engaged community of event enthusiasts.
                        </p>
                        <p class="text-gray-700 text-justify">
                            Our email updates are designed to provide you with valuable insights, relevant opportunities,
                            and exciting event experiences.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const selectFileButton = document.getElementById("selectFileButton");
        const uploadForm = document.getElementById("uploadForm");
        const fileInput = document.getElementById("fileInput");
        selectFileButton.addEventListener("click", () => {
            fileInput.click();
        });
        fileInput.addEventListener("change", () => {
            uploadForm.submit();
        });
    </script>
@endsection
