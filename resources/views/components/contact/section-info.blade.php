<section id="section-info" class="sr-hidden contact-map-section">
    <div class="contact-info relative bg-primary px-6 py-8 gap-6 flex flex-col justify-between lg:gap-0 lg:flex-row xl:px-28 lg:pt-16 lg:pb-20">
        <div class="contact-info-content flex flex-col items-start justify-center gap-6">
            <h3 class="font-semibold text-2xl leading-normal tracking-normal align-middle text-quaternary lg:text-3xl">{{ setting('app.pt_name') }}</h3>

            <div class="contact-details grid grid-cols-2 max-w-[29.375rem] gap-0">
                <div class="contact-item">
                    <label class="label">{{ setting('site.footer_phone_title') }}</label>
                    <p class="value">{{ setting('site.footer_phone_value') }}</p>
                </div>

                <div class="contact-item">
                    <label class="label">{{ setting('site.footer_address_title') }}</label>
                    <p class="value">{{ setting('site.footer_address_value') }}</p>
                </div>

                <div class="contact-item">
                    <label class="label">{{ setting('site.footer_email_title') }}</label>
                    <a href="mailto:{{ setting('site.footer_email_value') }}" class="value">{{ setting('site.footer_email_value') }}</a>
                </div>
            </div>
        </div>

        <div class="contact-form-wrapper lg:absolute lg:right-6 xl:right-28">
            <x-global.form-contact
                :title="setting('content.contact_s2_form_title')"
                :buttonText="setting('content.contact_s2_button_text')"
                :buttonIcon="setting_file('content.contact_s2_button_icon')"
                :class="'!w-full'"
            />
        </div>
    </div>

    <div class="map-container h-[26rem] w-full overflow-hidden">
        <iframe src="{{ setting('content.contact_s2_map_link') }}" class="w-full h-full" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    </div>
</section>
