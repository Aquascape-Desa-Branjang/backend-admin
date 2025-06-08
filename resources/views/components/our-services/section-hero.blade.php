@php
    $statistics = [
        [
            'name' => 'Shipping Routes',
            'value' => '100+',
            'description' => 'Delivering cargo safely across various destinations.'
        ],
        [
            'name' => 'Years of Experience',
            'value' => '4+',
            'description' => 'Providing trusted and efficient shipping solutions.'
        ],
        [
            'name' => 'Fleet & Partners',
            'value' => '50+',
            'description' => 'Ensuring smooth and timely cargo transportation.'
        ],
        [
            'name' => 'Customer Support',
            'value' => '24/7',
            'description' => 'Always ready to assist your shipping needs.'
        ],
    ]
@endphp

<section id="section-hero" class="sr-hidden flex flex-col items-center justify-center px-5 py-10 gap-4 xl:gap-8 xl:px-28 xl:py-20">
    <div class="flex flex-col items-center justify-center gap-4 xl:gap-8">
        <h1 class="text-5xl font-semibold text-center leading-tight text-primary xl:text-6xl">{{ setting('content.our-services_s1_title') }}</h1>
        <h2 class="text-xl leading-normal font-normal text-center text-secondary xl:text-2xl">{{ setting('content.our-services_s1_subtitle') }}</h2w>
    </div>

    <div class="relative flex flex-col items-center justify-center">
        <div class="overflow-hidden w-full h-auto">
            <img src="{{ setting_file('content.our-services_s1_background_image') }}" alt="Shipping Image" class="w-full h-full object-cover object-center block bg-no-repeat">
        </div>

        <div class="bottom-0 left-0 bg-primary w-full rounded-3xl p-4 grid grid-cols-2 flex-row items-start justify-between text-white gap-4 xl:absolute xl:flex xl:p-8 xl:items-center">
            @foreach (setting_arr('content.our-services_s1_statistics') as $key => $statistic)
                <div class="flex flex-col items-center text-center justify-center gap-2 xl:items-start xl:text-start">
                    <div class="flex flex-col items-center justify-center gap-0 xl:gap-2 xl:items-start">
                        <h3 class="text-4xl font-bold leading-tight xl:text-5xl">{{ $statistic['value'] }}</h2>
                        <h5 class="text-sm font-bold xl:text-xl">{{ $statistic['title'] }}</h5>
                    </div>

                    <p class="text-sm leading-normal font-normal xl:text-base">{{ $statistic['subtitle'] }}</p>
                </div>

                <div class="divider !h-36 !hidden {{ ($key + 1) == count($statistics) ? '!hidden ' : '' }} xl:block"></div>
            @endforeach
        </div>
    </div>
</section>
