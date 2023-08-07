<div id="add_question" style="visibility: hidden">
    <div class="backdrop" onclick="document.getElementById('add_question').style.visibility = 'hidden'"></div>
    <div class="popup_center">
        <div class="popup">
            @if ($errors->any())
                <script>
                    document.getElementById('add_question').style.visibility = 'visible';
                </script>
            @endif
            <form action="{{ route('application.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <p class="text-gray-900 text-lg font-semibold mb-2">Add Your Custom Question</p>
                <input type="hidden" name="event_id" value="{{ $navbar->id }}">
                <div class="mb-4">
                    <label for="question" class="form_label">Question</label>
                    <input type="text" id="question" name="question" class="form_input">
                    @error('question')
                        <script>
                            document.getElementById('question').classList.add('border-red-500')
                        </script>
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="placeholder" class="form_label">Placeholder</label>
                    <input type="text" id="placeholder" name="placeholder" class="form_input">
                    @error('placeholder')
                        <script>
                            document.getElementById('placeholder').classList.add('border-red-500')
                        </script>
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex space-x-5">
                    <a class="secondary_button w-full cursor-pointer"
                        onclick="document.getElementById('add_question').style.visibility = 'hidden'">
                        Cancel
                    </a>
                    <button type="submit" class="button w-full" id="button" onclick="loading()">
                        <img aria-hidden="true" src="{{ asset('svg/loading_icon.svg') }}"
                            class="hidden w-4 h-4 mr-2 animate-spin" id="loading_icon">
                        Add
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
