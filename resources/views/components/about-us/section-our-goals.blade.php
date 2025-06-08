@php
    $missions = [
        'Gaining sizable market-shares through dependable quality of service and customer satisfactions.',
        'Strengthening core competence through the improvement of management performance, business efficiency and flexibility, risk management and the fulfillment of the corporate governance and social responsibility.',
        'Reinforcing partnerships through the creation of mutually beneficial business cooperation and strategic alliances.',
    ];
@endphp

<section id="section-our-goals" class="sr-hidden flex flex-col gap-8 py-10 px-5 xl:gap-16 xl:px-28 xl:pt-16 xl:pb-20">
    <div class="flex flex-col items-center gap-4 xl:gap-16 xl:pe-0 md:flex-row">
        <div class="overflow-hidden w-full h-auto md:order-2">
            <img
                src="{{ setting_file('content.about-us_s3_vision_image') }}"
                alt="About Us"
                class="w-full h-full object-cover object-center bg-no-repeat"
            />
        </div>

        <div class="flex flex-col gap-4 text-center md:text-start xl:gap-8 md:order-1 xl:pe-0">
            <h2 class="text-primary font-bold leading-tight text-4xl xl:text-6xl">{{ setting('content.about-us_s3_vision_title') }}</h2>
            <p class="font-normal text-center text-secondary leading-normal text-base xl:text-2xl md:text-start">{{ setting('content.about-us_s3_vision_description') }}</p>
        </div>
    </div>

    <div class="flex flex-col items-center gap-8 xl:items-start xl:px-0 md:flex-row xl:gap-8">
        <div class="overflow-hidden w-full h-auto xl:max-h-[33rem] flex flex-col rounded-3xl md:order-1">
            <img
                src="{{ setting_file('content.about-us_s3_mission_image') }}"
                alt="About Us"
                class="w-full h-full object-cover object-center bg-no-repeat"
            />
        </div>

        <div class="flex flex-col w-full gap-4 xl:ps-0 xl:gap-8 xl:w-11/12 md:order-2">
            <h2 class="text-primary font-bold leading-tight text-center text-4xl xl:text-6xl md:text-start">{{ setting('content.about-us_s3_mission_title') }}</h2>

            <ul class="ps-0 my-0 flex flex-col gap-4">
                @foreach (setting_arr('content.about-us_s3_mission_list') as $mission)
                    <li class="flex flex-row items-start gap-2">
                        <img src="{{ setting_file('content.about-us_s3_checked_icon') }}" alt="" class="w-7 h-7 xl:w-8 xl:h-8">
                        <p class="font-normal text-start text-secondary leading-normal text-base xl:text-2xl">{{ $mission['value'] }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
