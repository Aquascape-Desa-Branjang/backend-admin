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
            'title' => 'Freight Forwarding',
            'description' => 'Our freight forwarding services ensure seamless transportation of goods across international borders.',
            'year' => 2025,
            'image' => 'static/services-slider3.jpg',
            'imageBackground' => 'static/services-slide3.png',
        ],
        [
            'title' => 'Marine Consultancy',
            'description' => 'We offer expert marine consultancy services to optimize your shipping operations and logistics.',
            'year' => 2025,
            'image' => 'static/services-slider4.jpg',
            'imageBackground' => 'static/services-slide4.png',
        ],
    ];
@endphp

<section id="section-our-services" class="sr-hidden flex flex-col gap-8 py-10 px-5 xl:gap-16 xl:py-20 xl:px-28">
    <div class="flex flex-col gap-2 text-center mx-auto w-11/12 xl:w-5/12 xl:gap-3">
        <x-global.title-element :text="setting('content.home_s3_title')" />
        <x-global.sub-title-element :text="setting('content.home_s3_subtitle')" />
    </div>

    <div class="services bg-white rounded-[2.5rem] items-center overflow-hidden gap-8 flex flex-col md:grid md:grid-cols-12 xl:gap-16">
        <div class="services-slider-preview place-items-end flex-col hidden md:pe-5 xl:pe-10 xl:py-0 xl:gap-4 md:col-span-3 md:order-2 md:flex">
            <x-global.slider-services :total="count($services)" :nextIcon="setting_file('content.home_s3_next_icon')"/>
        </div>

        <div class="services-slider-track col-span-9 md:order-1">
            @foreach ($services as $keyService => $service)
                <div class="services-content flex flex-col items-center gap-4 md:grid md:grid-cols-12 {{ $keyService == 0 ? 'active' : '' }}" data-slide="{{ $keyService + 1 }}" data-preview="{{ storage_url($service['image']) }}">
                    <div class="services-text col-span-7 flex flex-col px-6 pt-10 gap-6 xl:gap-14 md:p-0 md:order-2">
                        <h3 class="services-title text-primary font-bold leading-tight text-2xl xl:text-6xl">{{ $service['title'] }}</h3>

                        <div class="services-slider-preview flex flex-col gap-4 md:hidden">
                            <x-global.slider-services :total="count($services)" :nextIcon="setting_file('content.home_s3_next_icon')" />
                        </div>

                        <div class="services-text-content flex flex-col gap-8">
                            <p class="services-description text-secondary font-normal leading-normal text-base xl:text-2xl">
                                {{ $service['description'] }}
                            </p>

                            <div class="services-footer">
                                <span class="font-sora services-year text-misc-1 text-sm xl:text-base">{{ $service['year'] }} - {{ setting('app.name') }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="services-image-left overflow-hidden w-full h-auto col-span-5 md:order-1">
                        <img src="{{ storage_url($service['imageBackground']) }}" alt="Slide Image" class="block w-full h-full object-cover object-center bg-no-repeat" />
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
