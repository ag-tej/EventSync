<div id="sign_in" class="hidden">
    <div class="backdrop" onclick="document.getElementById('sign_in').className = 'hidden'">
    </div>
    <div class="popup_center">
        <div class="popup animate-open">
            <p class="mb-1 font-bold text-4xl">Sign in</p>
            <p class="mb-4 text-gray-500 font-semibold">Don't have an account?
                <span class="text-purple hover:underline cursor-pointer"
                    onclick="document.getElementById('sign_up').className ='block', document.getElementById('sign_in').className ='hidden'">
                    Sign up</span>
            </p>
            <form action="/login" method="POST" enctype="multipart/form-data">
                @csrf
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
                    <p class="text-purple font-semibold hover:underline">
                        <a href="#">Forgot password?</a>
                    </p>
                </div>
                <button type="submit" class="button w-full">Sign in</button>
            </form>
        </div>
    </div>
</div>
