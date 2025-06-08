<footer class="w-full flex">
    <div class="w-full mx-auto px-5 py-5 gap-6 flex flex-col xl:gap-20 xl:px-28 xl:py-20">
        <div class="flex flex-col justify-between gap-6 xl:items-center xl:flex-row">
            <div class="w-60 h-auto overflow-hidden xl:w-80">
                <img src="{{ setting_file('site.footer_logo') }}" alt="Logo" class="w-full h-full object-cover object-center" />
            </div>

            <h2 class="text-primary text-xl font-semibold leading-tight xl:text-4xl xl:w-[42%]">
                {{ setting('site.footer_logo_content') }}
            </h2>
        </div>

        <div class="grid grid-cols-12 items-start gap-6 xl:gap-0">
            <div class="grid gap-6 grid-cols-2 col-span-12 xl:col-span-10 xl:gap-12 xl:grid-cols-3">
                <div class="flex flex-col gap-2">
                    <p class="text-secondary text-sm xl:text-base">{{ setting('site.footer_phone_title') }}</p>

                    <h4 class="text-primary font-semibold text-base xl:text-xl">{{ setting('site.footer_phone_value') }}</h4>
                </div>

                <div class="flex flex-col gap-2">
                    <p class="text-secondary text-sm xl:text-base">{{ setting('site.footer_address_title') }}</p>

                    <h4 class="text-primary font-semibold text-base xl:text-xl">
                        {{ setting('site.footer_address_value') }}
                    </h4>
                </div>

                <div class="flex flex-col gap-2">
                    <p class="text-secondary text-sm xl:text-base">{{ setting('site.footer_email_title') }}</p>

                    <a href="mailto:{{ setting('site.footer_email_value') }}" class="text-primary font-semibold  text-base xl:text-xl underline">
                        {{ setting('site.footer_email_value') }}
                    </a>
                </div>

                <div class="flex flex-col gap-1 xl:gap-2">
                    <p class="text-secondary font-normal leading-normal text-sm xl:text-base">{{ setting('site.footer_social_title') }}</p>

                    <div class="flex gap-4 xl:gap-5">
                        @foreach (setting_arr('site.footer_social_values') as $social)
                            <a href="{{ $social['url'] }}" class="w-8 h-8 flex items-center justify-center xl:w-9 xl:h-9">
                                <img src="{{ storage_url($social['icon']) }}" alt="{{ $social['title'] }}" />
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="w-fit flex flex-col gap-1 col-span-6 xl:col-span-2 xl:gap-2">
                <p class="text-secondary text-sm xl:text-base">{{ setting('site.footer_navigation_title') }}</p>

                <div class="flex flex-col gap-2 xl:gap-3">
                    @foreach (setting_arr('site.footer_navigation_values') as $navigation)
                        <a href="{{ $navigation['url'] }}" class="text-primary text-base xl:text-xl font-semibold no-underline">{{ $navigation['title'] }}</a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="flex flex-col justify-between items-start gap-3 text-sm xl:gap-6 xl:flex-row xl:items-center">
            <div class="flex gap-6 xl:order-2">
                @foreach (setting_arr('site.footer_legal_navigations') as $navigation)
                    <a href="{{ $navigation['url'] }}" class="text-primary font-semibold no-underline">{{ $navigation['title'] }}</a>
                @endforeach
            </div>

            @php
                $copyright = str_replace(
                    ['[yearNow]', '[PTName]'],
                    [date('Y'), setting('app.pt_name')],
                    setting('site.footer_copyright_text')
                );
            @endphp

            <p class="text-secondary leading-normal xl:order-1">{{$copyright }}</p>
        </div>
    </div>
</footer>
