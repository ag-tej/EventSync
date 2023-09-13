<div id="create_events" style="visibility: hidden">
    <div class="backdrop" onclick="document.getElementById('create_events').style.visibility = 'hidden'"></div>
    <div class="popup_center">
        <div class="popup">
            @if ($errors->any())
                <script>
                    document.getElementById('create_events').style.visibility = 'visible';
                </script>
            @endif
            <form action="{{ route('event.create') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <p class="text-gray-900 text-lg font-semibold mb-2">Let's get you started</p>
                <input type="hidden" name="organizer_id" value="{{ Auth::user()->id }}">
                <div class="mb-4">
                    <label for="title" class="form_label">Name</label>
                    <input type="text" id="title" name="title" class="form_input"
                        placeholder="What are you calling your event?">
                    @error('title')
                        <script>
                            document.getElementById('title').classList.add('border-red-500')
                        </script>
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="mode" class="form_label">Choose Your Event Mode</label>
                    <select id="mode" name="mode" class="form_input">
                        <option value="In-Person">In-Person</option>
                        <option value="Online">Online</option>
                        <option value="Hybrid">Hybrid</option>
                    </select>
                    @error('mode')
                        <script>
                            document.getElementById('mode').classList.add('border-red-500');
                        </script>
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="category" class="form_label">Choose Event Category</label>
                    <select id="category" name="category" class="form_input">
                        <option value="Academic Engagements">Academic Engagements</option>
                        <option value="Business Gatherings">Business Gatherings</option>
                        <option value="Community Empowerment">Community Empowerment</option>
                        <option value="Fairs and Expositions">Fairs and Expositions</option>
                        <option value="Festivals and Jubilations">Festivals and Jubilations</option>
                        <option value="Music and Artistry">Music and Artistry</option>
                        <option value="Competition / Challenges">Competition / Challenges</option>
                        <option value="Sports and Wellness">Sports and Wellness</option>
                        <option value="Health and Fitness">Health and Fitness</option>
                    </select>
                    @error('category')
                        <script>
                            document.getElementById('category').classList.add('border-red-500');
                        </script>
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex space-x-5">
                    <a class="secondary_button w-full cursor-pointer"
                        onclick="document.getElementById('create_events').style.visibility = 'hidden'">
                        Cancel
                    </a>
                    <button type="submit" class="button w-full" id="button" onclick="loading()">
                        <img aria-hidden="true" src="{{ asset('svg/loading_icon.svg') }}"
                            class="hidden w-4 h-4 mr-2 animate-spin" id="loading_icon">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
