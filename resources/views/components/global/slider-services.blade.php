<div class="services-slider-count flex justify-between items-center w-full slider-button__home">
    <button class="services-slider-prev bg-transparent border-none cursor-pointer prev disabled">
        <img src="{{ $nextIcon }}" alt="Previous" class="rotate-180">
    </button>

    <p class="services-slider-number font-sora text-primary leading-normal text-lg xl:text-xl ">
        <span class="current font-semibold">{{ @$total ? 1 : 0 }}</span>
        <span class="separator font-normal opacity-50">&nbsp;/&nbsp;</span>
        <span class="total font-normal opacity-50">{{ @$total ?? 0 }}</span>
    </p>

    <button class="services-slider-next bg-transparent border-none cursor-pointer">
        <img src="{{ $nextIcon }}" alt="Next">
    </button>
</div>

<div class="services-slider-image overflow-hidden w-full h-auto min-h-52 rounded-2xl">
    <img src="" alt="Preview" class="w-full h-full object-cover object-center bg-no-repeat hidden" />
</div>
