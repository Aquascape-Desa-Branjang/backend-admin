<section id="section-contact-us" class="sr-hidden relative">
    <img
        src="{{ $backgroundImage }}"
        alt="Contact Us Background"
        class="absolute inset-0 w-full h-full object-cover object-center z-0"
    />

    <div class="relative px-5 py-10 z-10 flex flex-col items-center justify-center xl:items-start xl:justify-center gap-8 xl:gap-0 xl:ps-28 xl:py-28">
        <x-global.form-contact
            :title="$title"
            :buttonText="$buttonText"
            :buttonIcon="$buttonIcon"
        />
    </div>
</section>
