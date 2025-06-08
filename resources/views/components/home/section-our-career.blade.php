<section id="section-our-career" class="sr-hidden px-5 py-10 xl:px-28 xl:py-16">
    <div class="flex flex-col gap-2 text-center mx-auto w-10/12 xl:w-6/12 xl:gap-3">
        <x-global.title-element :text="setting('content.home_s7_title')" />
        <x-global.sub-title-element :text="setting('content.home_s7_subtitle')" />

        <a href="{{ setting('content.home_s7_button_url') }}" class="btn btn--primary mx-auto mt-1 relative z-10" type="submit">
            {{ setting('content.home_s7_button_text') }}

            <img src="{{ setting_file('content.home_s7_button_icon') }}" alt="arrow-up">
        </a>
    </div>

    @php
        $images = setting_arr('content.home_s7_images')
    @endphp

    <div class="grid grid-cols-5 gap-4 mt-0 md:-mt-10 xl:-mt-20">
        <div class="max-h-64 md:max-h-[29.75rem] grid grid-rows-4 gap-4">
            <div class="overflow-hidden w-full h-auto rounded-xl row-span-3">
                <img src="{{ storage_url($images[0]['path']) }}" alt="Career Image" class="block w-full h-full object-cover object-center bg-no-repeat" />
            </div>

            <div class="overflow-hidden w-full h-auto rounded-xl row-span-1">
                <img src="{{  storage_url($images[1]['path']) }}" alt="Career Image" class="block w-full h-full object-cover object-center bg-no-repeat" />
            </div>
        </div>

        <div class=" max-h-64 md:max-h-[29.75rem] grid grid-rows-4 gap-4">
            <div class="overflow-hidden w-full h-auto rounded-xl row-start-2 row-span-3">
                <img src="{{  storage_url($images[2]['path']) }}" alt="Career Image" class="block w-full h-full object-cover object-center bg-no-repeat" />
            </div>
        </div>

        <div class=" max-h-64 md:max-h-[29.75rem] grid grid-rows-4 gap-4">
            <div class="overflow-hidden w-full h-auto rounded-xl row-start-3 row-span-2">
                <img src="{{  storage_url($images[3]['path']) }}" alt="Career Image" class="block w-full h-full object-cover object-center bg-no-repeat" />
            </div>
        </div>

        <div class="max-h-64 md:max-h-[29.75rem] col-span-2 grid grid-rows-4 gap-4">
            <div class="col-span-2 grid grid-cols-2 gap-4 row-span-3 grid-rows-3">
                <div class="overflow-hidden w-full h-auto rounded-xl row-start-2 row-span-2">
                    <img src="{{  storage_url($images[4]['path']) }}" alt="Career Image" class="block w-full h-full object-cover object-center bg-no-repeat" />
                </div>

                <div class="overflow-hidden w-full h-auto rounded-xl row-start-1 row-span-3">
                    <img src="{{  storage_url($images[6]['path']) }}" alt="Career Image" class="block w-full h-full object-cover object-center bg-no-repeat" />
                </div>
            </div>

            <div class="overflow-hidden w-full h-auto rounded-xl col-span-2 row-start-4 row-span-1">
                <img src="{{  storage_url($images[5]['path']) }}" alt="Career Image" class="block w-full h-full object-cover object-center bg-no-repeat" />
            </div>
        </div>
    </div>
</section>
