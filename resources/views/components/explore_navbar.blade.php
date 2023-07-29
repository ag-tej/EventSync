<nav class="navbar">
    <aside class="flex items-center space-x-8">
        <a href="{{ route('explore') }}" class="flex items-center space-x-1 text-2xl font-mono">
            <img alt="logo" src="{{ asset('svg/favicon.svg') }}" width="25" decoding="async" loading="lazy">
            <p class="text-white">EventSync</p>
        </a>
        @if (Auth::user())
            <a href="#" class="hover:text-white">My Events</a>
        @else
            <a href="/" class="hover:text-white">Home</a>
        @endif
        <a href="#" class="hover:text-white">Blog</a>
        <a href="#" class="hover:text-white">Organize</a>
    </aside>
    @if (Auth::user())
        <div class="flex flex-col items-center">
            <button type="button" id="dropdown_button" class="flex items-center space-x-2 hover:text-[#ffa4f2]">
                <div class="w-8 h-8 rounded-full bg-cover"
                    style="background-image: url({{ asset('avatar/user_avatar.png') }})"></div>
                <p>{{ Auth::user()->username }}</p>
            </button>
            <div id="dropdown" class="absolute flex flex-col items-center top-14 z-50" style="visibility: hidden">
                <svg width="24" height="11" viewBox="0 0 24 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="rotate-180 text-white">
                    <path
                        d="M9.17157 9.17157C10.7337 10.7337 13.2663 10.7337 14.8284 9.17157L24 -4.76837e-07H0L9.17157 9.17157Z"
                        fill="currentColor"></path>
                </svg>
                <div
                    class="text-base w-60 p-4 text-gray-900 bg-white border border-gray-200 rounded-md shadow flex flex-col gap-2">
                    <div class="flex flex-col">
                        <a href="/profile/{{ Auth::user()->username }}"
                            class="p-2 rounded hover:bg-purple/10 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Profile
                        </a>
                        <a href="#" class="p-2 rounded hover:bg-purple/10 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 010 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 010-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375z" />
                            </svg>
                            Tickets
                        </a>
                        <a href="#" class="p-2 rounded hover:bg-purple/10 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.243 11.757l5.25-4.886a1.3 1.3 0 00.144-1.745l-1.247-1.62A1.3 1.3 0 0019.36 3H5m7 7l3-3m-3 3L9 7m3 3a6 6 0 100 12 6 6 0 000-12zm3-3H9m6 0l4-4M5 3a1.3 1.3 0 00-1.03.507L2.7 5.154a1.3 1.3 0 00.117 1.718l4.94 4.885M5 3l4 4" />
                            </svg>
                            Badges
                        </a>
                        <a href="#" class="p-2 rounded hover:bg-purple/10 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z" />
                            </svg>
                            Interests
                        </a>
                    </div>
                    <hr class="border-gray-500">
                    <div class="flex flex-col">
                        <a href="#" class="p-2 rounded hover:bg-purple/10 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 18"
                                stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M1 8l6-4.5 3.667 2.847L16 1m0 0v3.843M16 1h-4.184M3 17v-4.267M7 17V9m4 8v-5.867M15 17V9" />
                            </svg>
                            Organizer Dashboard
                        </a>
                    </div>
                    <hr class="border-gray-500">
                    <div class="flex flex-col">
                        <a href="{{ route('settings') }}"
                            class="p-2 rounded hover:bg-purple/10 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 011.37.49l1.296 2.247a1.125 1.125 0 01-.26 1.431l-1.003.827c-.293.24-.438.613-.431.992a6.759 6.759 0 010 .255c-.007.378.138.75.43.99l1.005.828c.424.35.534.954.26 1.43l-1.298 2.247a1.125 1.125 0 01-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 01-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 01-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 01-1.369-.49l-1.297-2.247a1.125 1.125 0 01.26-1.431l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 010-.255c.007-.378-.138-.75-.43-.99l-1.004-.828a1.125 1.125 0 01-.26-1.43l1.297-2.247a1.125 1.125 0 011.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.281z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Account Settings
                        </a>
                        <a class="p-2 rounded hover:bg-purple/10 cursor-pointer flex items-center gap-2"
                            onclick="event.preventDefault(); document.getElementById('logout_form').submit();">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                            </svg>
                            Logout
                        </a>
                        <form id="logout_form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <aside class="flex items-center space-x-8 font-semibold">
            <a href="{{ route('login') }}" class="hover:text-white">Sign in</a>
            <a href="{{ route('register') }}" class="text-[#ffa4f2]">Get Started</a>
        </aside>
    @endif
    <script>
        let dropdown_button = document.querySelector("#dropdown_button");
        let dropdown = document.querySelector("#dropdown");
        dropdown_button.onclick = function() {
            if (dropdown.style.visibility == 'hidden') {
                dropdown.style.visibility = 'visible';
                document.body.style.setProperty('pointer-events', 'none');
                dropdown.style.setProperty('pointer-events', 'auto');
            }
        }
        document.onclick = function(e) {
            if (!dropdown.contains(e.target) && !dropdown_button.contains(e.target)) {
                dropdown.style.visibility = 'hidden';
                document.body.style.setProperty('pointer-events', 'auto');
            }
        }
    </script>
</nav>
