@php
    $services = [
        [
            'title' => 'Ship Agency',
            'description' => 'PT GLS acts as a shipping agency, handling administrative and operational requirements for vessels docking at ports. We ensure smooth processes, from permits to coordination with relevant authorities.',
            'year' => 2025,
            'image' => 'static/services-slider1.jpg',
            'imageBackground' => 'static/services-slide1.png',
        ],
        [
            'title' => 'Ship Management',
            'description' => 'Our ship management services cover maintenance, crew management, inspections, and regulatory compliance. With an experienced team of professionals, we ensure vessels remain in optimal condition for safe.',
            'year' => 2025,
            'image' => 'static/services-slider2.jpg',
            'imageBackground' => 'static/services-slide2.png',
        ],
        [
            'title' => 'Coal Logistic & Stevedoring',
            'description' => 'We provide coal logistics services, including sea transportation and stevedoring at ports. With an integrated supply chain management system, we ensure efficiency in cargo handling and coal distribution.',
            'year' => 2025,
            'image' => 'static/services-slider3.jpg',
            'imageBackground' => 'static/services-slide3.png',
        ],
        [
            'title' => 'Ship Owner & Operator',
            'description' => 'PT GLS owns and operates a diverse fleet of vessels to meet various maritime logistics needs. With well-maintained ships and high operational standards, we ensure safe, efficient, and timely cargo transportation.',
            'year' => 2025,
            'image' => 'static/services-slider4.jpg',
            'imageBackground' => 'static/services-slide4.png',
        ],
    ];
@endphp

<section id="section-service-detail" class="sr-hidden relative">
    <div class="flex flex-col  px-5 py-10 gap-8 xl:gap-16 xl:px-28 xl:py-20">
        <div class="flex flex-col gap-[8px] text-center w-11/12 mx-auto xl:w-5/12">
            <x-global.sub-title-element :text="setting('content.our-services_s2_title')" />
        </div>

        <div class="flex flex-col gap-8 xl:gap-16">
            @foreach ($services as $service)
                <div class="flex flex-1 flex-col group">
                    <div class="flex flex-2 flex-col gap-4 xl:gap-8 xl:group-odd:flex-row xl:group-even:flex-row-reverse">
                        <div class="overflow-hidden h-auto rounded-2xl xl:w-7/12">
                            <img
                                src="{{ storage_url($service['image']) }}"
                                class="w-full h-full object-cover object-center block bg-no-repeat"
                            >
                        </div>

                        <div class="flex flex-1 flex-col justify-center gap-3 xl:w-5/12 xl:gap-8">
                            <div class="flex flex-col">
                                <h6 class="text-primary text-start font-bold text-2xl xl:group-even:text-right xl:text-5xl">{{ $service['title'] }}</h6>
                            </div>

                            <p class="font-normal text-start text-secondary leading-normal text-base xl:group-even:text-right xl:text-2xl xl:text-start">{{ $service['description'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
