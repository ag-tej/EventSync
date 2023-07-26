<nav class="navbar">
    <aside class="flex items-center space-x-8">
        <a href="/" class="flex items-center space-x-1 text-2xl font-mono">
            <img alt="logo" src="/svg/favicon.svg" width="25" decoding="async" loading="lazy">
            <p class="text-white">EventSync</p>
        </a>
        <a href="/" class="hover:text-white">Home</a>
        <a href="#" class="hover:text-white">Blog</a>
    </aside>
    @if (Auth::user())
        <p>{{ Auth::user()->name }}</p>
        <form action="{{ route('logout') }}" method="POST" role="button">
            @csrf
            <a onclick="event.preventDefault(); this.closest('form').submit();">Logout</a>
        </form>
    @else
        <aside class="flex items-center space-x-8 font-semibold">
            <a href="/login" class="hover:text-white">Sign in</a>
            <a href="/register" class="text-[#ffa4f2]">Get Started</a>
        </aside>
    @endif
</nav>
