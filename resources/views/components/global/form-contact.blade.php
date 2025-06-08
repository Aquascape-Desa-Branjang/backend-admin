<form id="contact-form" class="contact-form bg-white rounded-3xl p-6 md:p-12 flex flex-col gap-0 lg:gap-12 lg:w-7/12 xl:w-[44%] {{ @$class ?? '' }}">
    @csrf

    <h2 class="font-semibold text-4xl lg:text-5xl leading-tight tracking-normal text-primary mb-8 lg:mb-0">{{ $title }}</h2>

    <div class="grid grid-cols-2 gap-3 lg:gap-6">
        <div class="relative z-0 w-full mb-5 form-group">
            <input type="text" name="name" id="name" class="peer" placeholder="" required />

            <label for="name" class="peer-focus:font-medium peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8">Your Name</label>
        </div>

        <div class="relative z-0 w-full mb-5 form-group">
            <input type="email" name="email" id="email" class="peer" placeholder="" required />

            <label for="email" class="peer-focus:font-medium peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8">Your Email</label>
        </div>

        <div class="relative z-0 w-full mb-5 form-group">
            <input type="text" name="phone_number" id="phone_number" class="peer" placeholder="" required />

            <label for="phone_number" class="peer-focus:font-medium peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8">Your Phone</label>
        </div>

        <div class="relative z-0 w-full mb-5 form-group">
            <input type="text" name="subject" id="subject" class="peer" placeholder="" required />

            <label for="subject" class="peer-focus:font-medium peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-8">Your Subject</label>
        </div>

        <div class="relative z-0 w-full mb-5 form-group col-span-2">
            <textarea rows="1" type="text" name="message" id="message" class="peer" placeholder="" required ></textarea>

            <label for="message" class="
            label-text-area peer-focus:font-medium peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-10">Write Your Message</label>
        </div>
    </div>

    <button class="btn btn--primary mt-4 lg:mt-0" id="submit-contact-form" type="submit">
        {{ $buttonText }}

        <x-global.loader :class="'hidden'" />
        <img src="{{ $buttonIcon }}" alt="arrow-up">
    </button>
</form>
