@extends('layouts.layout')
@section('title')
    Event Name | EventSync
@endsection

@section('content')
    @include('components.organizer_navbar')
    <section class="w-9/12 mx-auto text-gray-900 mt-6 mb-12 flex gap-12">
        <div>
            <div class="mb-6">
                <p class="text-2xl font-semibold mb-2">{{ $applicant->user->profile->first_name }}
                    {{ $applicant->user->profile->last_name }}</p>
                <div class="flex flex-col gap-2">
                    <p>Username: {{ $applicant->user->username }}</p>
                    <p>Gender: {{ $applicant->user->profile->gender }}</p>
                    <p>Dietary Preference: {{ $applicant->user->profile->dietary_preference }}</p>
                    <p>Allergies: {{ $applicant->user->profile->allergies }}</p>
                </div>
            </div>
            <div class="mb-6">
                <p class="text-2xl font-semibold mb-2">Contact Details</p>
                <div class="flex flex-col gap-2">
                    <p>Email: {{ $applicant->user->email }}</p>
                    <p>Phone: {{ $applicant->user->profile->contact_number }}</p>
                    <p>Address: {{ $applicant->user->profile->city }}, {{ $applicant->user->profile->province }},
                        {{ $applicant->user->profile->country }}</p>
                    <p>Postal Code: {{ $applicant->user->profile->postal_code }}</p>
                </div>
            </div>
            <div class="mb-6">
                <p class="text-2xl font-semibold mb-2">Social Media Links</p>
                <div class="flex flex-col gap-2">
                    <p>Facebook: {{ $applicant->user->profile->facebook_link }}</p>
                    <p>Instagram: {{ $applicant->user->profile->instagram_link }}</p>
                    <p>LinkedIn: {{ $applicant->user->profile->linkedin_link }}</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col justify-between">
            <div>
                <p class="text-2xl font-semibold mb-2">Submitted Answers</p>
                @if (count($answers))
                    @foreach ($answers as $answer)
                        <div class="mb-4">
                            <p class="font-medium">{{ $answer->application->question }}</p>
                            <p class="text-gray-500 font-medium">{{ $answer->answer }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
            @if ($applicant->status == 'Waiting')
                <div class="flex justify-between">
                    <form action="{{ route('applicant.accept', $applicant->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="button">Accept Application</button>
                    </form>
                    <form action="{{ route('applicant.reject', $applicant->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="danger_button">Reject Application</button>
                    </form>
                </div>
            @endif
        </div>
    </section>
@endsection
