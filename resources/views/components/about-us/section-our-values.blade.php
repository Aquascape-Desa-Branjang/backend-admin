<section id="section-our-values" class="sr-hidden flex flex-col">
    @php
        $values = [
            [
                'name' => 'Commitment',
                'description' => 'Our business experience in the past has proven that commitment to customer satisfactions is essential.',
                'image' => 'static/about-component/our-values-1.jpg',
            ],
            [
                'name' => 'Competence',
                'description' => 'It is our beliefs that an improved competency shall provide significant advantages in facing a highly contested market structures.',
                'image' => 'static/about-component/our-values-2.jpg',
            ],
            [
                'name' => 'Professionalism',
                'description' => 'Professionalism and dedications are the core values of our management. Positive work ethics must be consistently reinforced.',
                'image' => 'static/about-component/our-values-3.jpg',
            ]
        ];
    @endphp

    <div class="relative">
        <div class="absolute inset-0 overflow-hidden w-full h-auto">
            <img src="{{ setting_file('content.about-us_s4_background_image') }}" alt="Background" class="w-full h-full object-cover object-center bg-no-repeat">
        </div>

        <div class="absolute bg-misc-3 bg-opacity-50 inset-0"></div>

        <div class="relative px-5 py-10 gap-4 flex flex-col xl:flex-row xl:gap-8 xl:py-20 xl:px-28" id="container-our-values">
            <div class="md:hidden text-center">
                <x-global.sub-title-element class="text-quaternary" :text="setting('content.about-us_s4_title')" />
            </div>

            @foreach ($values as $keyValues => $value)
                <div class="value flex-col gap-4 transition-opacity duration-200 ease-in-out xl:gap-8  md:grid-cols-2 {{ $keyValues == 0 ? 'flex md:grid opacity-100' : 'hidden opacity-0' }}" data-key="{{ $keyValues + 1 }}">
                    <div class="col-span-1 col-start-2 overflow-hidden w-auto h-full rounded-3xl xl:order-2 md:absolute md:top-10 md:right-5 xl:top-20 xl:right-28">
                        <img class="w-full h-full object-center object-cover bg-no-repeat block" src="{{ storage_url($value['image']) }}" alt="Ship">
                    </div>

                    <div class="text-quaternary flex flex-col text-center gap-0 xl:gap-8 xl:order-1 md:text-start">
                        <div class="hidden md:block">
                            <x-global.sub-title-element class="text-quaternary" text="Our Values" />
                        </div>

                        <div class="flex flex-col gap-3 xl:gap-6">
                            <h3 class="font-semibold leading-tight text-2xl xl:text-4xl">
                                {{ $value['name'] }}
                            </h3>

                            <p class="font-medium text-quaternary leading-normal text-base xl:text-2xl">{{ $value['description'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="flex flex-row gap-6 items-center justify-center md:justify-start pt-5 px-5 xl:pt-8 xl:pe-0 xl:ps-28 xl:pb-20 slider-button__about">
        <button class="bg-transparent border-none cursor-pointer prev disabled"data-type="prev">
            <img src="{{ setting_file('content.about-us_s4_next_icon') }}" alt="Previous" class="rotate-180">
        </button>

        <button class="bg-transparent border-none cursor-pointer next disabled"data-type="next">
            <img src="{{ setting_file('content.about-us_s4_next_icon') }}" alt="Next">
        </button>
    </div>
</section>

