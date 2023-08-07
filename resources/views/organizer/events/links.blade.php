@extends('layouts.layout')
@section('title')
    {{ $navbar->title }} | EventSync
@endsection

@section('content')
    @include('components.organizer_navbar')
    @include('organizer.events.event_navbar')

    <div class="w-9/12 mx-auto my-16">
        <form method="POST" enctype="multipart/form-data" class="flex"
            action="@if ($link == null) {{ route('link.store') }} @else {{ route('link.update', $link->id) }} @endif">
            @csrf
            @if ($link != null)
                @method('PUT')
            @endif
            <input type="hidden" name="event_id" value="{{ $navbar->id }}">
            {{-- left section --}}
            <div class="w-1/2 pr-8">
                <div class="p-8 bg-white rounded border shadow-md flex flex-col gap-4">
                    <div>
                        <label for="facebook_link" class="form_label">Facebook *</label>
                        <input type="url" id="facebook_link" name="facebook_link" class="form_input"
                            @if ($link != null) value="{{ $link->facebook_link }}" @endif>
                        @error('facebook_link')
                            <script>
                                document.getElementById('facebook_link').classList.add('border-red-500')
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="instagram_link" class="form_label">Instagram *</label>
                        <input type="url" id="instagram_link" name="instagram_link" class="form_input"
                            @if ($link != null) value="{{ $link->instagram_link }}" @endif>
                        @error('instagram_link')
                            <script>
                                document.getElementById('instagram_link').classList.add('border-red-500')
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="twitter_link" class="form_label">Twitter</label>
                        <input type="url" id="twitter_link" name="twitter_link" class="form_input"
                            @if ($link != null) value="{{ $link->twitter_link }}" @endif>
                        @error('twitter_link')
                            <script>
                                document.getElementById('twitter_link').classList.add('border-red-500')
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="linkedin_link" class="form_label">LinkedIn</label>
                        <input type="url" id="linkedin_link" name="linkedin_link" class="form_input"
                            @if ($link != null) value="{{ $link->linkedin_link }}" @endif>
                        @error('linkedin_link')
                            <script>
                                document.getElementById('linkedin_link').classList.add('border-red-500')
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="discord_link" class="form_label">Discord</label>
                        <input type="url" id="discord_link" name="discord_link" class="form_input"
                            @if ($link != null) value="{{ $link->discord_link }}" @endif>
                        @error('discord_link')
                            <script>
                                document.getElementById('discord_link').classList.add('border-red-500')
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            {{-- right section --}}
            <div class="w-1/2 pl-8">
                <div class="p-8 bg-white rounded border shadow-md flex flex-col gap-4">
                    <div>
                        <label for="website_link" class="form_label">Event's Website</label>
                        <input type="url" id="website_link" name="website_link" class="form_input"
                            @if ($link != null) value="{{ $link->website_link }}" @endif>
                        @error('website_link')
                            <script>
                                document.getElementById('website_link').classList.add('border-red-500')
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="contact_email" class="form_label">Contact Email *</label>
                        <input type="text" id="contact_email" name="contact_email" class="form_input"
                            @if ($link != null) value="{{ $link->contact_email }}" @endif>
                        @error('contact_email')
                            <script>
                                document.getElementById('contact_email').classList.add('border-red-500');
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="code_of_conduct" class="form_label">Link to Code of Conduct</label>
                        <input type="url" id="code_of_conduct" name="code_of_conduct" class="form_input"
                            @if ($link != null) value="{{ $link->code_of_conduct }}" @endif>
                        @error('code_of_conduct')
                            <script>
                                document.getElementById('code_of_conduct').classList.add('border-red-500')
                            </script>
                            <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="button mt-16 w-fit float-right" id="button" onclick="loading()">
                    <img aria-hidden="true" src="{{ asset('svg/loading_icon.svg') }}"
                        class="hidden w-4 h-4 mr-2 animate-spin" id="loading_icon">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
@endsection
