@extends('layouts.layout')
@section('title')
    {{ Auth::user()->username }} | EventSync
@endsection

@section('content')
    @include('components.explore_navbar')

    {{-- profile section --}}
    <div class="w-9/12 mx-auto mt-8 mb-16">
        <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data" class="flex" id="form">
            @csrf
            @method('PUT')
            {{-- left section --}}
            <div class="w-1/2 pr-8">
                <p class="text-gray-900 text-lg mb-2">Basic Information</p>
                <div class="p-8 bg-white rounded border shadow-md flex flex-col gap-4">
                    <div>
                        <label for="first_name" class="form_label">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="form_input"
                            value="{{ $profile->first_name }}">
                        @error('first_name')
                            <script>
                                document.getElementById('first_name').classList.add('border-red-500')
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="last_name" class="form_label">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="form_input"
                            value="{{ $profile->last_name }}">
                        @error('last_name')
                            <script>
                                document.getElementById('last_name').classList.add('border-red-500');
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="birth_date" class="form_label">Birth Date</label>
                        <input type="date" id="birth_date" name="birth_date" class="form_input"
                            value="{{ $profile->birth_date }}">
                        @error('birth_date')
                            <script>
                                document.getElementById('birth_date').classList.add('border-red-500');
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="gender" class="form_label">Gender</label>
                        <select id="gender" name="gender" class="form_input">
                            <option value="Male" {{ $profile->gender === 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ $profile->gender === 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ $profile->gender === 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('gender')
                            <script>
                                document.getElementById('gender').classList.add('border-red-500');
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="occupation" class="form_label">Occupation</label>
                        <select id="occupation" name="occupation" class="form_input">
                            <option value="Student" {{ $profile->gender === 'Student' ? 'selected' : '' }}>Student</option>
                            <option value="Professional" {{ $profile->gender === 'Professional' ? 'selected' : '' }}>
                                Professional</option>
                            <option value="Other" {{ $profile->gender === 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('occupation')
                            <script>
                                document.getElementById('occupation').classList.add('border-red-500');
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="dietary_preference" class="form_label">Dietary Preference</label>
                        <select id="dietary_preference" name="dietary_preference" class="form_input">
                            <option value="Vegetarian" {{ $profile->gender === 'Vegetarian' ? 'selected' : '' }}>Vegetarian
                            </option>
                            <option value="Non-Vegetarian" {{ $profile->gender === 'Non-Vegetarian' ? 'selected' : '' }}>
                                Non-Vegetarian</option>
                            <option value="Vegan" {{ $profile->gender === 'Vegan' ? 'selected' : '' }}>Vegan</option>
                        </select>
                        @error('dietary_preference')
                            <script>
                                document.getElementById('dietary_preference').classList.add('border-red-500');
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="allergies" class="form_label">Allergies</label>
                        <input type="text" id="allergies" name="allergies" class="form_input"
                            value="{{ $profile->allergies }}">
                        @error('allergies')
                            <script>
                                document.getElementById('allergies').classList.add('border-red-500');
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>
            {{-- right section --}}
            <div class="w-1/2 pl-8">
                <p class="text-gray-900 text-lg mb-2">Contact Details</p>
                <div class="p-8 bg-white rounded border shadow-md flex flex-col gap-4">
                    <div>
                        <label for="contact_number" class="form_label">Contact Number</label>
                        <input type="tel" id="contact_number" name="contact_number" class="form_input"
                            value="{{ $profile->contact_number }}">
                        @error('contact_number')
                            <script>
                                document.getElementById('contact_number').classList.add('border-red-500');
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="city" class="form_label">City</label>
                        <input type="text" id="city" name="city" class="form_input"
                            value="{{ $profile->city }}">
                        @error('city')
                            <script>
                                document.getElementById('city').classList.add('border-red-500');
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="province" class="form_label">Province</label>
                        <input type="text" id="province" name="province" class="form_input"
                            value="{{ $profile->province }}">
                        @error('province')
                            <script>
                                document.getElementById('province').classList.add('border-red-500');
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="country" class="form_label">Country</label>
                        <input type="text" id="country" name="country" class="form_input"
                            value="{{ $profile->country }}">
                        @error('country')
                            <script>
                                document.getElementById('country').classList.add('border-red-500');
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="postal_code" class="form_label">Postal Code</label>
                        <input type="text" id="postal_code" name="postal_code" class="form_input"
                            value="{{ $profile->postal_code }}">
                        @error('postal_code')
                            <script>
                                document.getElementById('postal_code').classList.add('border-red-500');
                            </script>
                            <p class="text-sm text-red-500">{{ $message }}</p>
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
