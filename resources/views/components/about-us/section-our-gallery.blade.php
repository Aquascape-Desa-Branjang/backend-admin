@php
    $galleries = [
        storage_url('static/about-component/gallery-1.jpg'),
        storage_url('static/about-component/gallery-2.jpg'),
        storage_url('static/about-component/gallery-3.jpg'),
        storage_url('static/about-component/gallery-4.jpg'),
    ]
@endphp

<section id="section-our-gallery" class="sr-hidden flex flex-col py-10 px-5 gap-8 xl:gap-16 xl:px-28 xl:pt-16 xl:pb-20">
    <div class="flex flex-col text-center gap-2 xl:gap-3">
        <x-global.title-element :text="setting('content.about-us_s5_title')" />
        <x-global.sub-title-element :text="setting('content.about-us_s5_subtitle')" />
    </div>

    <div class="desktop-cards hidden grid-cols-3 grid-rows-2 gap-4 xl:gap-5 md:max-h-[38.75rem] md:grid">
        <div class="gallery-card relative cursor-pointer row-span-2 cols-span-1 overflow-hidden w-full h-auto rounded-3xl">
            <x-global.image-gallery
                :buttonText="setting('content.about-us_s5_button_text')"
                :buttonIcon="setting_file('content.about-us_s5_button_icon')"
                :image="storage_url(setting_arr('content.about-us_s5_galleries')[0]['path'])"
                />
        </div>

        <div class="col-span-2 row-span-2 grid grid-rows-2 gap-5">
            <div class="col-span-2 grid grid-cols-2 gap-5">
                <div class="gallery-card relative cursor-pointer overflow-hidden w-full h-auto rounded-3xl">
                    <x-global.image-gallery :buttonText="setting('content.about-us_s5_button_text')" :buttonIcon="setting_file('content.about-us_s5_button_icon')" :image="storage_url(setting_arr('content.about-us_s5_galleries')[1]['path'])" />
                </div>

                <div class="gallery-card relative cursor-pointer overflow-hidden w-full h-auto rounded-3xl">
                    <x-global.image-gallery :buttonText="setting('content.about-us_s5_button_text')" :buttonIcon="setting_file('content.about-us_s5_button_icon')" :image="storage_url(setting_arr('content.about-us_s5_galleries')[3]['path'])" />
                </div>
            </div>

            <div class="gallery-card relative cursor-pointer col-span-2 overflow-hidden w-full h-auto rounded-3xl">
                <x-global.image-gallery :buttonText="setting('content.about-us_s5_button_text')" :buttonIcon="setting_file('content.about-us_s5_button_icon')" :image="storage_url(setting_arr('content.about-us_s5_galleries')[2]['path'])" />
            </div>
        </div>
    </div>

    <div class="mobile-cards grid grid-cols-2 gap-4 md:hidden">
        @foreach (setting_arr('content.about-us_s5_galleries') as $keyGallery => $gallery)
            <div class="gallery-card relative cursor-pointer overflow-hidden w-full h-48 rounded-3xl">
                <x-global.image-gallery :buttonText="setting('content.about-us_s5_button_text')" :buttonIcon="setting_file('content.about-us_s5_button_icon')" :image="storage_url($gallery['path'])" />
            </div>
        @endforeach
    </div>

    <div id="modal-gallery" class="fixed flex-col items-center justify-center overflow-y-auto hidden inset-0 bg-black bg-opacity-50 z-20 px-5 gap-4 xl:gap-8 xl:px-28">
        <div class="w-full flex flex-col gap-4 items-center justify-center">
            <div class="overflow-hidden max-w-[50rem] h-auto rounded-3xl relative">
                <button class="absolute right-2 top-2 bg-opacity-80 btn--primary__reverse rounded-full border-none cursor-pointer close p-2 w-8 h-8">
                    <img src="{{ setting_file('content.about-us_s5_button_close_icon') }}" alt="Close" class="w-4 h-4">
                </button>

                <img src="" alt="Gallery View Image" id="modal-gallery-image" class="block w-full h-full object-cover object-center bg-no-repeat" />
            </div>
        </div>

        <div class="absolute w-10/12 md:w-11/12 xl:w-3/4 flex flex-row gap-6 items-center justify-between slider-button__about">
            <button class="btn btn--primary__reverse bg-opacity-80 border-none cursor-pointer prev rounded-full p-0 w-12 h-12" data-type="prev">
                <img src="{{ setting_file('content.about-us_s5_button_next_icon') }}" alt="Previous" class="rotate-180">
            </button>

            <button class="btn btn--primary__reverse bg-opacity-80 border-none cursor-pointer next rounded-full p-0 w-12 h-12" data-type="next">
                <img src="{{ setting_file('content.about-us_s5_button_next_icon') }}" alt="Next">
            </button>
        </div>
    </div>
</section>



