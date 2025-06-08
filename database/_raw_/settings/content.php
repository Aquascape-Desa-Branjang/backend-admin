<?php

$home = require database_path('_raw_/settings/home.php');
$aboutUs = require database_path('_raw_/settings/about-us.php');

$result = [
    // Our Services
    // Section 1
    'our-services_s1_title' => 'Efficient Maritime Solutions for Every Need',

    'our-services_s1_subtitle' => 'PT. Gurita Lintas Samudera provides safe, timely, and efficient dry bulk shipping with a strong network and 24/7 support to ensure seamless logistics.',

    'our-services_s1_background_image' => 'static/bg-our-services.png',

    'our-services_s1_statistics' => [
        [
            'title' => 'Shipping Routes',
            'subtitle' => 'Delivering cargo safely across various destinations.',
            'value' => '100+',
        ],
        [
            'title' => 'Years of Experience',
            'subtitle' => 'Providing trusted and efficient shipping solutions.',
            'value' => '4+',
        ],
        [
            'title' => 'Fleet & Partners',
            'subtitle' => 'Ensuring smooth and timely cargo transportation.',
            'value' => '50+',
        ],
        [
            'title' => 'Customer Support',
            'subtitle' => 'Always ready to assist your shipping needs.',
            'value' => '24/7',
        ],
    ],

    // Section 2
    'our-services_s2_title' => 'Our Dry Bulk Shipping Services',

    // Section 3
    'our-services_s3_title' => 'Hear from Our Satisfied Clients',

    // E-Procurement
    // Section 1
    'e-procurement_s1_title' => 'Streamlining Procurement. Strengthening Partnerships.',

    'e-procurement_s1_subtitle' => 'Access our transparent and efficient e-procurement system. PT. Gurita Lintas Samudera welcomes trusted vendors to build long-term partnerships and deliver excellence together.',

    'e-procurement_s1_background_image' => 'static/bg-e-procurement.jpg',

    // Section 2
    'e-procurement_s2_filter_text' => 'FILTER BY',

    'e-procurement_s2_filter_announcement_date_placeholder' => 'Tanggal Pengumuman',

    'e-procurement_s2_filter_until_date_placeholder' => 'Sampai',

    'e-procurement_s2_filter_search_placeholder' => 'Masukan Kata Kunci',

    'e-procurement_s2_filter_calender_icon' => 'static/icons/calendar.svg',

    'e-procurement_s2_filter_search_icon' => 'static/icons/search.svg',

    // Career
    // Section 1
    'career_s1_title' => 'Build Your Career in Maritime Excellence',

    'career_s1_subtitle' => 'Join PT. Gurita Lintas Samudera and grow your career in the maritime industry. Explore opportunities and set sail for success with us!',

    'career_s1_background_image' => 'static/bg-career.jpg',

    // Section 2
    'career_s2_filter_text' => 'FILTER BY',

    'career_s2_filter_location_placeholder' => 'Semua Lokasi',

    'career_s2_filter_division_placeholder' => 'Semua Divisi',

    'career_s2_accordion_requirement_text' => 'Requirement',

    'career_s2_accordion_requirement_checked_icon' => 'static/icons/check-rounded.svg',

    'career_s2_accordion_location_icon' => 'static/icons/map-pin.svg',

    'career_s2_accordion_division_icon' => 'static/icons/users-four.svg',

    'career_s2_accordion_button_text' => 'Lamar Sekarang',

    'career_s2_accordion_button_icon' => 'static/arrow-up-right-w.svg',

    // Contact
    // Section 1
    'contact_s1_title' => 'Connect with Our Maritime Experts',

    'contact_s1_subtitle' => 'Have questions about our shipping services or want to discuss a partnership opportunity? Our team is ready to assist you. Whether you need information on cargo logistics, fleet operations, or general inquiries, we are here to help.',

    // Section 2
    'contact_s2_map_link' => 'https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d560.4730435449741!2d106.8020368603002!3d-6.175517734672987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sid!2sid!4v1747629884072!5m2!1sid!2sid',

    'contact_s2_form_title' => 'Get In Touch',

    'contact_s2_button_text' => 'Send Message',

    'contact_s2_button_icon' => 'static/arrow-up-right-w.svg',
];

$result = array_merge($home, $aboutUs, $result);

return $result;
