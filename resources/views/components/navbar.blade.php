<nav class="navbar">
    <aside class="flex items-center space-x-8">
        <a href="/" class="flex items-center space-x-1 text-2xl font-mono">
            <img alt="logo" src="{{ asset('svg/favicon.svg') }}" width="25" decoding="async" loading="lazy">
            <p class="text-white">EventSync</p>
        </a>
        <a href="{{ route('explore') }}" class="hover:text-white">Explore</a>
        <a href="#features" class="hover:text-white">Features</a>
        <a href="#" class="hover:text-white">Blog</a>
    </aside>
    <aside class="flex items-center space-x-8 font-semibold">
        <a href="{{ route('login') }}" class="hover:text-white">Sign in</a>
        <a href="{{ route('register') }}" class="text-[#ffa4f2]">Get Started</a>
    </aside>
</nav>
