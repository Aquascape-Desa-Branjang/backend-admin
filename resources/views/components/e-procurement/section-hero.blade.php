<section id="section-hero" class="sr-hidden relative">
    <img
        src="{{ setting_file('content.e-procurement_s1_background_image') }}"
        alt="Hero Background"
        class="absolute inset-0 w-full h-full object-cover object-center z-0"
    />

    <div class="gradient-overlay"></div>

    <div class="relative flex flex-col justify-center items-center z-10 gap-4 px-5 py-10 xl:gap-8 xl:py-28">
        <h1 class="text-white font-semibold leading-tight text-5xl text-center xl:text-6xl xl:w-6/12">{{ setting('content.e-procurement_s1_title') }}</h1>
        <h2 class="text-white font-normal leading-normal text-xl text-center xl:text-2xl xl:w-6/12">{{ setting('content.e-procurement_s1_subtitle') }}</h2>
    </div>
</section>
