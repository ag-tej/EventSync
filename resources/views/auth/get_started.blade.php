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
            <form action="/register" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="name" class="form_label">User Name</label>
                    <input required type="text" id="name" name="name" class="form_input">
                    @error('name')
                        <script>
                            document.getElementById('name').classList.add('border-red-500')
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
                    <label for="password_confirmation" class="form_label">Confirm Password</label>
                    <input required type="password" id="password_confirmation" name="password_confirmation"
                        class="form_input">
                    @error('password_confirmation')
                        <script>
                            document.getElementById('password_confirmation').classList.add('border-red-500')
                        </script>
                        <p class="text-sm text-red-500"><small>{{ $message }}</small></p>
                    @enderror
                </div>
                <button type="submit" class="button w-full">Sign up</button>
            </form>
        </div>
    </div>
</div>
