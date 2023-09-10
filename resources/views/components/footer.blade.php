<footer class="w-full bg-[#303030]">
    <section class="w-9/12 mx-auto p-16">
        <div class="flex justify-between items-start list-none">
            <div>
                <p class="text-white font-semibold text-4xl">
                    We love <span class="text-[#ffa4f2]">events</span>
                    <span class="block mt-1">and the <span class="text-[#ffa4f2]">people</span> who</span>
                    <span class="block mt-1">organize them.</span>
                </p>
                <div class="flex items-center gap-6 mt-8">
                    <img src="{{ asset('svg/facebook.svg') }}"
                        class="h-5 object-contain aspect-3/2 cursor-pointer opacity-70 hover:opacity-100">
                    <img src="{{ asset('svg/instagram.svg') }}"
                        class="h-5 object-contain aspect-3/2 cursor-pointer opacity-70 hover:opacity-100">
                    <img src="{{ asset('svg/linkedin.svg') }}"
                        class="h-5 object-contain aspect-3/2 cursor-pointer opacity-70 hover:opacity-100">
                    <img src="{{ asset('svg/gmail.svg') }}"
                        class="h-5 object-contain aspect-3/2 cursor-pointer opacity-70 hover:opacity-100">
                </div>
            </div>
            <div class="flex justify-end items-start gap-16 text-white font-medium">
                <div class="leading-8">
                    <p class="font-semibold text-white/80">Community</p>
                    <li>Organize Events</li>
                    <li>Explore Events</li>
                    <li>Code of Conduct</li>
                    <li>Brand Assests</li>
                </div>
                <div class="leading-8">
                    <p class="font-semibold text-white/80">Company</p>
                    <li>About</li>
                    <li>Blog</li>
                    <li>Jobs</li>
                    <li>Changelog</li>
                </div>
                <div class="leading-8">
                    <p class="font-semibold text-white/80">Support</p>
                    <li>Help</li>
                    <li>Refund Policy</li>
                    <li>Status</li>
                    <li>Contact us</li>
                </div>
            </div>
        </div>
        <hr class="my-8 border">
        <div class="flex gap-20 items-center">
            <a href="/" class="flex items-center space-x-1 text-2xl font-mono">
                <img alt="logo" src="{{ asset('svg/favicon.svg') }}" width="25" decoding="async" loading="lazy">
                <p class="text-white">EventSync</p>
            </a>
            <p class="ml-52 text-justify text-white/80">
                Made by Tej Agrawal for Semester Project I 2023 using PHP/Laravel, TailwindCSS and a bunch of other
                libraries that help making beautiful things on the internet possible.
            </p>
        </div>
    </section>
</footer>
