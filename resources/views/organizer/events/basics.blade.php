@extends('layouts.layout')
@section('title')
    {{ $navbar->title }} | EventSync
@endsection

@section('content')
    @include('components.organizer_navbar')
    @include('organizer.events.event_navbar')

    <div class="w-9/12 mx-auto my-16">
        <form action="{{ route('drafts.basics', $basics->slug) }}" method="POST" enctype="multipart/form-data" class="flex">
            @csrf
            @method('PUT')
            {{-- left section --}}
            <div class="w-1/2 pr-8">
                <div class="p-8 bg-white rounded border shadow-md flex flex-col gap-4">
                    <div>
                        <label for="title" class="form_label">Name *</label>
                        <input type="text" id="title" name="title" class="form_input" value="{{ $basics->title }}">
                        @error('title')
                            <script>
                                document.getElementById('title').classList.add('border-red-500')
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="tagline" class="form_label">Tagline *</label>
                        <input type="text" id="tagline" name="tagline" class="form_input"
                            value="{{ $basics->tagline }}">
                        @error('tagline')
                            <script>
                                document.getElementById('tagline').classList.add('border-red-500');
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="description" class="form_label">Description *</label>
                        <textarea name="description" id="editor" class="form_input">{{ $basics->description }}</textarea>
                        @error('description')
                            <script>
                                document.getElementById('editor').classList.add('border-red-600')
                            </script>
                            <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
                        @enderror
                    </div>
                </div>
            </div>
            {{-- right section --}}
            <div class="w-1/2 pl-8">
                <div class="p-8 bg-white rounded border shadow-md flex flex-col gap-4">
                    <div>
                        <label for="category" class="form_label">Event Category *</label>
                        <select id="category" name="category" class="form_input">
                            <option value="Academic Engagements"
                                {{ $basics->category === 'Academic Engagements' ? 'selected' : '' }}>Academic Engagements
                            </option>
                            <option value="Business Gatherings"
                                {{ $basics->category === 'Business Gatherings' ? 'selected' : '' }}>Business Gatherings
                            </option>
                            <option value="Community Empowerment"
                                {{ $basics->category === 'Community Empowerment' ? 'selected' : '' }}>Community Empowerment
                            </option>
                            <option value="Fairs and Expositions"
                                {{ $basics->category === 'Fairs and Expositions' ? 'selected' : '' }}>Fairs and Expositions
                            </option>
                            <option value="Festivals and Jubilations"
                                {{ $basics->category === 'Festivals and Jubilations' ? 'selected' : '' }}>Festivals and
                                Jubilations</option>
                            <option value="Music and Artistry"
                                {{ $basics->category === 'Music and Artistry' ? 'selected' : '' }}>Music and Artistry
                            </option>
                            <option value="Competitions and Challenges"
                                {{ $basics->category === 'Competitions and Challenges' ? 'selected' : '' }}>Competitions
                                and Challenges</option>
                            <option value="Sports and Wellness"
                                {{ $basics->category === 'Sports and Wellness' ? 'selected' : '' }}>Sports and Wellness
                            </option>
                            <option value="Health and Fitness"
                                {{ $basics->category === 'Health and Fitness' ? 'selected' : '' }}>Health and Fitness
                            </option>
                        </select>
                        @error('category')
                            <script>
                                document.getElementById('category').classList.add('border-red-500');
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="approx_participants" class="form_label">Approx. Participants</label>
                        <input type="number" id="approx_participants" name="approx_participants" class="form_input"
                            min="0" oninput="validity.valid||(value='');" value="{{ $basics->approx_participants }}"
                            placeholder="NO LIMIT">
                        @error('approx_participants')
                            <script>
                                document.getElementById('approx_participants').classList.add('border-red-500');
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="team_size" class="form_label">Team Size</label>
                        <input type="number" id="team_size" name="team_size" class="form_input" min="0"
                            oninput="validity.valid||(value='');" value="{{ $basics->team_size }}" placeholder="NONE">
                        @error('team_size')
                            <script>
                                document.getElementById('team_size').classList.add('border-red-500');
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    @if ($basics->mode != 'Online')
                        <div>
                            <label for="venue" class="form_label">Venue *</label>
                            <input type="text" id="venue" name="venue" class="form_input"
                                value="{{ $basics->venue }}">
                            @error('venue')
                                <script>
                                    document.getElementById('venue').classList.add('border-red-500');
                                </script>
                                <p class="text-sm text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    @endif
                </div>
                <button type="submit" class="button mt-9 w-fit float-right" id="button" onclick="loading()">
                    <img aria-hidden="true" src="{{ asset('svg/loading_icon.svg') }}"
                        class="hidden w-4 h-4 mr-2 animate-spin" id="loading_icon">
                    Save Changes
                </button>
            </div>
        </form>
    </div>
    <style>
        .ck-editor__editable[role="textbox"] {
            min-height: 200px;
            background-color: #f9fafb !important;
            color: rgb(55 65 81);
        }

        .ck-editor__editable[role="textbox"]:hover {
            border: 1px solid rgb(122 30 227 / 0.5) !important;
        }

        .ck-editor__editable[role="textbox"]:focus {
            border: 1px solid rgb(122 30 227) !important;
        }
    </style>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/super-build/ckeditor.js"></script>
    <script src="{{ asset('js/text-editor.js') }}" defer></script>
@endsection
