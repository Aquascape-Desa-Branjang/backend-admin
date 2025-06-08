@php
    $milestones = [
        [
            'year' => '2005',
            'title' => 'The Beginning',
            'description' => 'Established PT Gurita Lintas Samudera with a bold vision to revolutionize shipbuilding and marine services through cutting-edge technology, sustainability, and industry expertise to enhance efficiency, safety, and environmental responsibility.',
            'img' => 'static/milestone-1.jpg'
        ],
        [
            'year' => '2010',
            'title' => 'First Major Ship Launch',
            'description' => 'Successfully launched our first large-scale vessel, marking a significant milestone in our growth and demonstrating our commitment to excellence, innovation, and the advancement of marine engineering.',
            'img' => 'static/milestone-2.jpg'
        ],
        [
            'year' => '2015',
            'title' => 'Expansion to International Markets',
            'description' => 'Expanded operations beyond domestic waters, successfully delivering vessels to international clients and establishing a strong presence in the global maritime industry.',
            'img' => 'static/milestone-3.jpg'
        ],
        [
            'year' => '2018',
            'title' => 'Award-Wining Shipbuilding Technology',
            'description' => 'Expanded operations beyond domestic waters, successfully delivering vessels to international clients and establishing a strong presence in the global maritime industry.',
            'img' => 'static/milestone-4.jpg'
        ],
    ]
@endphp

<section id="section-milestone" class="sr-hidden relative">
    <div class="px-5 py-10 xl:px-28 xl:py-16">
        <div class="flex flex-col gap-[8px]">
            <x-global.title-element :text="setting('content.home_s5_title')" />
            <x-global.sub-title-element :text="setting('content.home_s5_subtitle')" />
        </div>

        <div class="flex flex-col gap-8 mt-8 xl:mt-[64px] lg:gap-0">
            @foreach ($milestones as $milestone)
                <div class="flex flex-1 flex-col group">
                    <div class="flex flex-2 flex-col gap-4 lg:gap-8 lg:group-odd:flex-row lg:group-even:flex-row-reverse">
                        <div class="flex-1">
                            <img
                                src="{{ storage_url($milestone['img']) }}"
                                class="w-full h-[300px] rounded-[16px]"
                            >
                        </div>

                        <div class="flex flex-1 flex-col gap-3 lg:gap-8">
                            <div class="flex flex-col">
                                <h6 class="text-primary text-start lg:group-even:text-right font-bold text-3xl xl:text-5xl">{{ $milestone['year'] }}</h6>
                                <h6 class="text-primary text-start lg:group-even:text-right font-bold text-2xl xl:text-4xl">{{ $milestone['title'] }}</h6>
                            </div>

                            <div class="">
                                <p class="lg:group-even:text-right font-normal text-start text-secondary leading-normal text-base xl:text-2xl lg:text-start">{{ $milestone['description'] }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="lg:group-even:scale-x-[-1] group-last:hidden px-[292px] -my-[15px] z-[-1] hidden lg:flex lg:flex-1">
                        <img
                            src="{{ setting_file('content.home_s5_flow_image') }}"
                            class="w-full h-auto rounded-[16px]"
                        >
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
