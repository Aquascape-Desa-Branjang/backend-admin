<header class="bg-default-bg px-5 py-5 flex justify-between items-center sticky top-0 z-40 shadow-sm xl:px-28">
    <a class="logo w-40 overflow-hidden" href="{{ route('home') }}">
        <img src="{{ setting_file('site.navbar_logo') }}" alt="Logo" class="w-full h-full object-contain">
    </a>

    {{-- Desktop --}}
    <nav class="justify-center items-center gap-6 hidden xl:flex" id="navbar-desktop">
        <x-section.item-navigation :navigations="setting_arr('site.navbar_navigations')" />
    </nav>

    {{-- Mobile --}}
    <div id="mobile-navbar" class="xl:hidden">
        <button id="mobile-navigation-toggle" class="outline-none border-0 cursor-pointer bg-transparent px-0">
            <img src="{{ setting_file('site.navbar_mobile_hamburger_icon') }}" alt="Hamburger Menu Icon">
        </button>

        <nav class="flex-col px-5 py-5 gap-4 absolute right-0 top-0 w-fit min-h-screen overflow-auto bg-default-bg shadow-md hidden" id="mobile-navigation-item-menu">
            <button id="mobile-navigation-close" class="outline-none border-0 cursor-pointer bg-transparent self-end px-0 mt-2">
                <img src="{{ setting_file('site.navbar_mobile_close_icon') }}" alt="Times Icon">
            </button>

            <div class="flex flex-col items-start justify-center gap-4 pe-12">
                <x-section.item-navigation :navigations="setting_arr('site.navbar_navigations')" />
            </div>
        </nav>
    </div>
</header>
