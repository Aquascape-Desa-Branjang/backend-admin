@php
    $positions = [
        [
            'top' => '58%',
            'left' => '18%',
        ],
        [
            'top' => '48%',
            'left' => '46%',
        ],
        [
            'top' => '42%',
            'left' => '67%',
        ],
        [
            'top' => '49%',
            'left' => '85%',
        ],
    ]
@endphp

<section id="section-operations" class="sr-hidden relative">
    <img
        src="{{ setting_file('content.home_s4_background_image') }}"
        alt="Operation Background"
        class="absolute inset-0 w-full h-full object-cover object-center z-0"
    />

    <div class="relative px-5 py-10 z-10 flex flex-col items-center justify-between gap-8 xl:gap-0 md:px-20 xl:px-0 xl:py-16">
        <div class="flex flex-col gap-1 xl:gap-2 text-center text-white">

            <x-global.title-element :text="setting('content.home_s4_title')" class="text-white" />
            <x-global.sub-title-element :text="setting('content.home_s4_subtitle')" class="text-white" />
        </div>

        {{-- Desktop --}}
            <div class="flex-col h-96 relative w-full hidden xl:flex">
                @foreach (setting_arr('content.home_s4_operations') as $key =>  $operation)
                    <div class="group absolute top-[{{ $positions[$key]['top'] }}] left-[{{ $positions[$key]['left'] }}]">
                        <img src="{{ storage_url('static/marker.svg') }}" alt="" class="marker-operations cursor-pointer absolute w-8 h-8" data-operation-tooltip="{{ $key }}">

                        <x-global.operations-tooltip :buttonText="setting('content.home_s4_button_text')" :buttonIcon="setting_file('content.home_s4_button_icon')" :key="$key" :operation="$operation" :class="'desktop-operations-tooltip w-[31.25rem] absolute bottom-2 -left-60 group-first:-left-48 group-last:-left-96'" />
                    </div>
                @endforeach
            </div>

        {{-- Mobile --}}
            <div class="h-96 w-full flex xl:hidden">
                @foreach (setting_arr('content.home_s4_operations') as $key => $operation)
                    <x-global.operations-tooltip :buttonText="setting('content.home_s4_button_text')" :buttonIcon="setting_file('content.home_s4_button_icon')" :key="$key" :class="'mobile-operations-tooltip w-full'" :status="$key == 0 ? 'grid' : 'hidden'" :operation="$operation" />
                @endforeach
            </div>

        <div class="grid grid-cols-2 gap-3 xl:gap-6 md:flex md:flex-row">
            @foreach (setting_arr('content.home_s4_operations') as $key => $operation)
                <a href="#" class="btn btn--secondary mx-auto button-operations-tooltip text-xs xl:text-xl" data-operation-tooltip="{{ $key }}">
                    {{ $operation['title'] }}
                </a>
            @endforeach
        </div>
    </div>
</section>
