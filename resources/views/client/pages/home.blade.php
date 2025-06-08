<x-layouts.app>
    <x-home.section-hero />
    <x-about-us.section-about
        :imageTitle="setting_file('content.home_s2_image_title')"
        :imageDescription="setting_file('content.home_s2_image_description')"
        :title="setting('content.home_s2_title')"
        :subtitle="setting('content.home_s2_subtitle')"
        :description="setting('content.home_s2_description')"
        :button="true"
        :buttonText="setting('content.home_s2_button_text')"
        :buttonUrl="setting('content.home_s2_button_url')"
        :buttonIcon="setting_file('content.home_s2_button_icon')"
    />
    <x-home.section-our-services/>
    <x-home.section-operations/>
    <x-home.section-milestone/>
    <x-home.section-video/>
    <x-home.section-our-career/>
    <x-about-us.section-contact-us
        :backgroundImage="setting_file('content.home_s8_background_image')"
        :title="setting('content.home_s8_title')"
        :buttonText="setting('content.home_s8_button_text')"
        :buttonIcon="setting_file('content.home_s8_button_icon')"
    />

</x-layouts.app>
