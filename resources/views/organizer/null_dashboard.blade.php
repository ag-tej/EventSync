@extends('layouts.layout')
@section('title')
    Organizer Dashboard | EventSync
@endsection

@section('content')
    @include('components.organizer_navbar')

    <div class="w-1/2 mx-auto my-32 flex flex-col items-center">
        <p class="text-center text-gray-700 text-5xl font-bold mb-8">Organize an Event!</p>
        <p class="text-center text-lg text-gray-500 mb-16">
            The only thing that can match the thrill of attending an event is the exhilaration of organizing one yourself!
            Join 100s of other events on EventSync and turn your ideas into unforgettable experiences. Whether you're
            planning a conference, workshop, concert, or any other gathering, EventSync provides the tools you need to make
            it a seamless success. Start creating your event today and let your vision come to life!
        </p>
        <button class="button w-1/2 h-12" onclick="document.getElementById('create_events').style.visibility = 'visible'">
            Organize your event on EventSync
        </button>
    </div>
    {{-- create event popup --}}
    @include('organizer.components.create_event')
@endsection
