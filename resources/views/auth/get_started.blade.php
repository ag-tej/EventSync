<div id="sign_up" class="hidden">
    <div class="backdrop" onclick="document.getElementById('sign_up').className ='hidden'">
    </div>
    <div class="popup_center">
        <div class="popup animate-open">
            <p class="mb-1 font-bold text-4xl">Sign up</p>
            <p class="mb-4 text-gray-500 font-semibold">Already have an account?
                <span class="text-purple hover:underline cursor-pointer"
                    onclick="document.getElementById('sign_in').className ='block', document.getElementById('sign_up').className ='hidden'">
                    Sign in</span>
            </p>
            <form id="submitForm" action="#" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="username" class="form_label">User Name</label>
                    <input required type="text" id="username" name="username" class="form_input">
                    @error('username')
                        <script>
                            document.getElementById('username').classList.add('border-red-500')
                        </script>
                        <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="form_label">Email address</label>
                    <input required type="email" id="email" name="email" class="form_input">
                    @error('email')
                        <script>
                            document.getElementById('email').classList.add('border-red-500')
                        </script>
                        <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="form_label">Password</label>
                    <input required type="password" id="password" name="password" class="form_input">
                    @error('password')
                        <script>
                            document.getElementById('password').classList.add('border-red-500')
                        </script>
                        <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
                    @enderror
                </div>
                <div class="mb-4">
                    <button type="submit" class="button w-full" id="create" onclick="loading()">
                        <img aria-hidden="true" src="{{ asset('svg/loading_icon.svg') }}"
                            class="hidden w-4 h-4 mr-2 animate-spin" id="loading_icon">
                        Sign up
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
