<section id="section-about-detail" class="sr-hidden flex flex-col gap-4 py-10 b-5 xl:gap-0 xl:pt-16 xl:pb-20">
    <div class="flex flex-col items-center gap-8 ps-5 xl:gap-16 xl:pe-0 xl:ps-28 md:flex-row">
        <div class="overflow-hidden w-full h-auto md:order-2">
            <img
                src="{{ $imageTitle }}"
                alt="About Us"
                class="w-full h-full object-cover object-center bg-no-repeat"
            />
        </div>

        <div class="flex flex-col gap-2 text-center pe-5 md:text-start xl:gap-3 md:order-1 xl:pe-0">
            <x-global.title-element :text="$title" class="font-normal leading-normal text-lg xl:text-xl" />
            <x-global.sub-title-element :text="$subtitle" />
        </div>
    </div>

    <div class="flex flex-col items-center px-0 gap-8 pe-5 md:flex-row xl:gap-24 xl:pe-28 xl:-mt-12">
        <div class="flex flex-col w-full gap-4 ps-5 xl:ps-0 xl:gap-6 xl:w-11/12 md:order-2">
            <p class="font-normal text-center text-secondary leading-normal text-base xl:text-2xl md:text-start">{{ $description ?? '' }}</p>

            @if (@$button)
                <a href="{{ $buttonUrl }}" class="btn btn--primary mx-auto xl:mx-0">
                    {{ $buttonText }}

                    <img src="{{ $buttonIcon }}" alt="arrow-up">
                </a>
            @endif
        </div>

        <div class="overflow-hidden w-full h-auto flex flex-col md:order-1">
            <img
                src="{{ $imageDescription }}"
                alt="About Us"
                class="w-full h-full object-cover object-center bg-no-repeat"
            />
        </div>
    </div>
</section>
