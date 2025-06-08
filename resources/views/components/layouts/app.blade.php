@php
    $seo_title = setting('app.name').' '.@$subtitle;
    $seo_cover = @$cover_path ?: setting('site.seo_default_cover_path') ?: '';
    $seo_authr = @$author ?: setting('site.seo_default_author') ?: '';
    $seo_descr = @$description ?: setting('site.seo_default_description') ?: '';
    $seo_keywr = @$keywords ?: setting('site.seo_default_keywords') ?: '';
    $seo_type = @$type ?: 'website';

    $seo_descr =  mb_strimwidth($seo_descr, 0, 156, "...", "UTF-8");
    $seo_keywr = is_array($seo_keywr) ? implode(', ', $seo_keywr) : $seo_keywr;
    $seo_cover = Str::startsWith($seo_cover, 'http') ? $seo_cover : storage_url($seo_cover);
@endphp

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $seo_title }}</title>
    <link rel="shortcut icon" href="{{ asset('favicox.ico') }}" />

    <meta name="robots" content="index, follow">
    <meta name="author" content="{{ $seo_authr }}">
    <meta name="title" content="{{ $seo_title }}">
    <meta name="description" content="{{ $seo_descr }}">
    <meta name="keywords" content="{{ $seo_keywr }}">

    <meta property="og:author" content="{{ $seo_authr }}">
    <meta property="og:title" content="{{ $seo_title }}">
    <meta property="og:description" content="{{ $seo_descr }}">
    <meta property="og:url" content="{{ \URL::current() }}">
    <meta property="og:image" content="{{ $seo_cover }}">
    <meta property="og:type" content="{{ $seo_type }}" />

    <meta name="twitter:author" content="{{ $seo_authr }}">
    <meta name="twitter:title" content="{{ $seo_title }}">
    <meta name="twitter:description" content="{{ $seo_descr }}">
    <meta name="twitter:image" content="{{ $seo_cover }}">
    <meta name="twitter:card" content="summary">

    <meta name="developer" content="Decodes Media">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100..800&display=swap" rel="stylesheet">

    <!-- CSS Vendors -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous"> --}}

    <!-- --Put any global css here -->
    @vite(['resources/sass/app.scss'])
    @stack('pageStyles')
    @livewireStyles
</head>

<body class="flex flex-col font-sans bg-default-bg min-h-screen m-0">
    <div id="app">
        @unless(@$noheader)
            <x-section.navbar />
        @endunless

        <main>
            {{ $slot }}
        </main>

        @unless(@$nofooter)
            <x-section.footer />
        @endunless

    </div>

    <!-- JS Vendors -->

    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>

    <!-- --Put any global js here -->
    @if (setting('app.lenna_is_active'))
        <script>
            var lennawebchat = document.createElement('script'); lennawebchat.src = "{{ setting('app.lenna_web_chat_url') }}";var app = document.createElement('script');app.src = "{{ setting('app.lenna_app_url') }}";document.head.prepend(lennawebchat);document.head.prepend(app);lennawebchat.onload = function () {LennaWebchatInit("{{ setting('app.lenna_app_id') }}", "{{ setting('app.lenna_integration_id') }}", (("{{ setting('app.lenna_user_id') ?? 'null' }}" == "null") ? null : "{{ setting('app.lenna_user_id') }}"))};
        </script>
    @endif

    @vite('resources/js/app.js')
    @stack('pageScripts')
    @livewireScripts
</body>

</html>
