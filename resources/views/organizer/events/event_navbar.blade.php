<div class="w-9/12 my-8 mx-auto">
    <a href="{{ route('organizer.dashboard') }}" class="flex items-center gap-2 text-lg text-gray-700 hover:text-purple">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor"
            class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
        </svg>
        <p>Finish Later</p>
    </a>
    <div class="my-8 flex justify-between items-center">
        <div>
            <p class="text-gray-900 text-2xl font-semibold mb-2">{{ $navbar->title }}</p>
            <p class="text-gray-700">Need help setting up? Email us at
                <a href="mailto:community@eventsync.co"
                    class="text-purple hover:underline cursor-pointer">community@eventsync.co</a>
            </p>
        </div>
        <hr class="rotate-90 border-gray-300 w-20">
        <div class="text-center">
            <p class="text-purple text-2xl font-semibold mb-2">{{ $navbar->percent_complete }}%</p>
            <p class="text-gray-700">set up complete</p>
        </div>
        <hr class="rotate-90 border-gray-300 w-20">
        <div>
            @if ($navbar->percent_complete == 80)
                <button class="button w-full mb-2">Finish Setup</button>
            @else
                <button disabled class="button bg-purple/50 cursor-not-allowed hover:shadow-none w-full mb-2">Finish
                    Setup</button>
            @endif
            <p class="text-gray-700">Complete set up 100% to proceed</p>
        </div>
    </div>
    <div class="text-gray-500 font-semibold flex justify-between items-center py-4 px-8 rounded border shadow-md">
        <a href="{{ route('drafts.basics', $navbar->slug) }}" class="uppercase hover:text-purple">Basics</a>
        <a href="{{ route('drafts.application', $navbar->slug) }}" class="uppercase hover:text-purple">Application</a>
        <a href="{{ route('drafts.links', $navbar->slug) }}" class="uppercase hover:text-purple">Links</a>
        <a href="{{ route('drafts.brand', $navbar->slug) }}" class="uppercase hover:text-purple">Brand</a>
        <a href="{{ route('drafts.dates', $navbar->slug) }}" class="uppercase hover:text-purple">Dates</a>
        <hr class="rotate-90 border-gray-300 w-10">
        <a href="{{ route('drafts.partners', $navbar->slug) }}" class="uppercase hover:text-purple">Partners</a>
        <a href="{{ route('drafts.perks', $navbar->slug) }}" class="uppercase hover:text-purple">Perks</a>
        <a href="{{ route('drafts.guests', $navbar->slug) }}" class="uppercase hover:text-purple">Guests</a>
        <a href="{{ route('drafts.schedule', $navbar->slug) }}" class="uppercase hover:text-purple">Schedule</a>
        <a href="{{ route('drafts.faqs', $navbar->slug) }}" class="uppercase hover:text-purple">FAQs</a>
    </div>
    {{-- current page nav highlighting script --}}
    <script>
        $(function() {
            $('a').each(function() {
                if ($(this).prop('href') == window.location.href) {
                    $(this).addClass('text-purple');
                }
            });
        });
    </script>
</div>
