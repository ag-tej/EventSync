@extends('layouts.layout')

@section('title')
    Update Avatar | EventSync
@endsection

@section('content')
    @include('components.explore_navbar')

    {{-- update password form --}}
    <a href="{{ route('settings') }}" class="cursor-default">
        <div class="backdrop">
        </div>
    </a>
    <div class="popup_center">
        <div data-aos="zoom-in" data-aos-duration="300" class="popup">
            <p class="mb-4 font-bold text-lg">Update Avatar</p>
            <form action="{{ route('update.avatar') }}" method="POST" enctype="multipart/form-data" id="form">
                @csrf
                <div class="mb-4">
                    <label for="image" class="form_label">Select New Avatar</label>
                    <input type="file" id="image" name="image" class="form_input mt-1" accept="image/*"
                        onchange="previewImage(event)">
                    <img id="preview" class="hidden mt-2 h-20">
                    @error('image')
                        <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
                    @enderror
                </div>
                <div class="flex space-x-5">
                    <a href="{{ route('settings') }}" class="cancel_button w-full">
                        Back
                    </a>
                    <button type="submit" class="button w-full" id="button" onclick="loading()">
                        <img aria-hidden="true" src="{{ asset('svg/loading_icon.svg') }}"
                            class="hidden w-4 h-4 mr-2 animate-spin" id="loading_icon">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
