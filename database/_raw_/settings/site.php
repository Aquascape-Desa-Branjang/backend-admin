<?php

return [
    // Navbar
    'navbar_logo' => 'static/logo.png',

    'navbar_mobile_hamburger_icon' => 'static/hamburger-menu.svg',

    'navbar_mobile_close_icon' => 'static/times.svg',

    'navbar_navigations' => [
        [
            'title' => 'Home',
            'url' => route('home'),
        ],
        [
            'title' => 'About Us',
            'url' => route('about-us'),
        ],
        [
            'title' => 'Our Services',
            'url' => route('our-services'),
        ],
        [
            'title' => 'E-Procurement',
            'url' => route('e-procurement.index'),
        ],
        [
            'title' => 'Career',
            'url' => route('career.index'),
        ],
        [
            'title' => 'Contact',
            'url' => route('contact.index'),
        ],
    ],

    // Footer
    'footer_logo' => 'static/logo.png',

    'footer_logo_content' => trim_space('Your Trusted Partner in Shipbuilding and Marine Services'),

    'footer_copyright_text' => 'Copyright notice (© [yearNow] [PTName]. All Rights Reserved.)',

    'footer_phone_title' => 'Phone',

    'footer_phone_value' => '+6221 568 6369',

    'footer_address_title' => 'Address',

    'footer_address_value' => 'Jl. Tomang Raya No. 47 E, Jakarta 11440, Indonesia',

    'footer_email_title' => 'Email',

    'footer_email_value' => 'ops@glsship.com',

    'footer_social_title' => 'Social Media',

    'footer_social_values' => [
        [
            'title' => 'Instagram',
            'icon' => 'static/logo-ig.svg',
            'url' => 'https://www.instagram.com/lifeatgls',
        ],
        [
            'title' => 'Youtube',
            'icon' => 'static/logo-yt.svg',
            'url' => 'https://www.youtube.com/@glsship.official',
        ],
        [
            'title' => 'Linkedin',
            'icon' => 'static/logo-li.svg',
            'url' => 'https://www.linkedin.com/company/gurita-lintas-samudera',
        ],
    ],

    'footer_navigation_title' => 'Navigation',

    'footer_navigation_values' => [
        [
            'title' => 'Home',
            'url' => route('home'),
        ],
        [
            'title' => 'About Us',
            'url' => route('about-us'),
        ],
        [
            'title' => 'Our Services',
            'url' => route('our-services'),
        ],
        [
            'title' => 'E-Procurement',
            'url' => route('e-procurement.index'),
        ],
        [
            'title' => 'Career',
            'url' => route('career.index'),
        ],
        [
            'title' => 'Contact',
            'url' => route('contact.index'),
        ],
    ],

    'footer_legal_navigations' => [
        [
            'title' => 'Privacy Policy',
            'url' => route('legal', ['type' => 'privacy-policy']),
        ],
        [
            'title' => 'Terms of Use',
            'url' => route('legal', ['type' => 'terms-of-use']),
        ],
    ],

    // Background & Images

    // 'bg_loading_screen' => 'static/loading-screen.gif',

    // 'bg_authentication' => 'static/bg-auth.jpg',

    // 'bg_notfound_page' => 'static/cover-404.jpg',

    // Search Engine Optimization

    'seo_default_cover_path' => 'static/logo.png',

    'seo_default_author' => config('app.name'),

    'seo_default_keywords' => implode(', ', [
        config('app.short_name'), config('app.name'),
    ]),

    'seo_default_description' => trim_space('
        PT. GURITA LINTAS SAMUDERA (GLS) is an Indonesian-owned shipping company specializing in dry bulk cargo services from agricultural and mining commodities, especially coal and others. We are providing around-the-clock services to meet customers needs, exploring new markets and sales leads exchanges, and establishing long-lasting relationships by delivering courteous services with a personal touch with our customers.
    '),

    // Others

    // 'other_default_avatar_path' => 'static/ava-dummy.png',

    // 'other_google_analytics_code' => 'XX-XXXXXXXXX-X',

];
