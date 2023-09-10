@extends('layouts.layout')
@section('title')
    {{ $navbar->title }} | EventSync
@endsection

@section('content')
    @include('components.organizer_navbar')
    @include('organizer.events.event_navbar')

    <div class="w-9/12 mx-auto my-16">
        <form method="POST" enctype="multipart/form-data" class="flex"
            action="@if ($date == null) {{ route('date.store') }} @else {{ route('date.update', $date->id) }} @endif">
            @csrf
            @if ($date != null)
                @method('PUT')
            @endif
            <input type="hidden" name="event_id" value="{{ $navbar->id }}">
            {{-- left section --}}
            <div class="w-1/2 pr-8">
                <div class="p-8 bg-white rounded border shadow-md flex flex-col gap-4">
                    <div>
                        <label for="application_open" class="form_label">Application Opens *</label>
                        <input type="datetime-local" id="application_open" name="application_open" class="form_input"
                            @if ($date != null) value="{{ $date->application_open }}" @endif>
                        @error('application_open')
                            <script>
                                document.getElementById('application_open').classList.add('border-red-500')
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="application_close" class="form_label">Application Closes *</label>
                        <input type="datetime-local" id="application_close" name="application_close" class="form_input"
                            @if ($date != null) value="{{ $date->application_close }}" @endif>
                        @error('application_close')
                            <script>
                                document.getElementById('application_close').classList.add('border-red-500')
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="rsvp" class="form_label">RSVP Within *</label>
                        <input type="number" id="rsvp" name="rsvp" class="form_input" min="0"
                            oninput="validity.valid||(value='');" placeholder="DAYS"
                            @if ($date != null) value="{{ $date->rsvp }}" @endif>
                        @error('rsvp')
                            <script>
                                document.getElementById('rsvp').classList.add('border-red-500')
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
                        <label for="event_begins" class="form_label">Event Begins *</label>
                        <input type="datetime-local" id="event_begins" name="event_begins" class="form_input"
                            @if ($date != null) value="{{ $date->event_begins }}" @endif>
                        @error('event_begins')
                            <script>
                                document.getElementById('event_begins').classList.add('border-red-500')
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="event_ends" class="form_label">Event Ends *</label>
                        <input type="datetime-local" id="event_ends" name="event_ends" class="form_input"
                            @if ($date != null) value="{{ $date->event_ends }}" @endif>
                        @error('event_ends')
                            <script>
                                document.getElementById('event_ends').classList.add('border-red-500');
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="button mt-6 w-fit float-right" id="button" onclick="loading()">
                    <img aria-hidden="true" src="{{ asset('svg/loading_icon.svg') }}"
                        class="hidden w-4 h-4 mr-2 animate-spin" id="loading_icon">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
@endsection
