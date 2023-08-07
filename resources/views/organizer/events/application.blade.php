@extends('layouts.layout')
@section('title')
    {{ $navbar->title }} | EventSync
@endsection

@section('content')
    @include('components.organizer_navbar')
    @include('organizer.events.event_navbar')

    <div class="w-9/12 mx-auto my-16">
        <div class="flex justify-between items-center">
            <div class="text-gray-700 text-lg">
                <p>We will be sharing profile information of your applicants with you.</p>
                <p>You can also add custom questions to your event's application.</p>
            </div>
            <button class="button px-8" onclick="document.getElementById('add_question').style.visibility = 'visible'">
                + ADD
            </button>
        </div>
        <div class="mt-8 flex flex-col gap-4">
            @foreach ($questions as $question)
                <div class="bg-white rounded p-8 shadow-md flex justify-between items-center">
                    <div>
                        <p class="text-gray-900 mb-2">{{ $question->question }}</p>
                        <p class="text-gray-500">{{ $question->placeholder }}</p>
                    </div>
                    <form action="{{ route('application.destroy', $question->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="danger_button px-8">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>

    {{-- add question popup --}}
    @include('organizer.popup.add_question')
@endsection
