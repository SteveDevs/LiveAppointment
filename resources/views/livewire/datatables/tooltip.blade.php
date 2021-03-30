<span class="relative group cursor-pointer">
    <span class="inline-block flex items-center">{{ Str::limit($slot, $length) }}</span>
    <span class="hidden group-hover:block absolute z-10 -ml-28 w-96 mt-2 p-2 text-xs whitespace-pre-wrap rounded-lg bg-theme-color-light border border-theme-color-geen shadow-xl text-theme-color-dark text-opacity-60  text-left whitespace-normal">{{ $slot }}</span>
</span>