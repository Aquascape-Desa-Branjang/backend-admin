<section id="section-hero" class="sr-hidden relative">
    <img
        src="{{ setting_file('content.home_s1_background_image') }}"
        alt="Hero Background"
        class="absolute inset-0 w-full h-full object-cover object-center z-0"
    />

    <div class="gradient-overlay"></div>

    <div class="relative flex flex-col justify-between z-10 gap-12 px-5 py-6 xl:gap-36 md:py-12 xl:ps-28 xl:pe-0 xl:py-32">
        <div class="flex flex-col gap-6">
            <h1 class="text-white font-bold leading-tight text-5xl text-center md:text-start xl:text-6xl xl:w-6/12">{{ setting('content.home_s1_title') }}</h1>

            <a href="{{ setting('content.home_s1_button_url') }}" class="btn btn--primary__reverse px-6 mx-auto md:mx-0">
                {{ setting('content.home_s1_button_text') }}

                <img src="{{ setting_file('content.home_s1_button_icon') }}" alt="">
            </a>
        </div>

        <div class="grid items-center grid-cols-2 text-white gap-5 md:flex xl:gap-10">
            @foreach (setting_arr('content.home_s1_statistics') as $key => $statistic)
                <div class="flex flex-col items-center gap-2 text-center md:w-fit xl:gap-3">
                    <p class="font-normal text-sm leading-normal whitespace-nowrap xl:text-base">{{ $statistic['title'] }}</p>
                    <h3 class="font-semibold text-4xl leading-tight xl:text-5xl">{{ $statistic['value'] }}</h3>
                </div>

                <div class="divider {{ $key == count($statistic) + 1 ? '!hidden' : '' }}"></div>
            @endforeach
        </div>
    </div>
</section>
