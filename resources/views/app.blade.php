<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="/img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
        <link rel="manifest" href="/img/site.webmanifest">
        <link rel="mask-icon" href="/img/safari-pinned-tab.svg" color="#fe5a35">
        <link rel="shortcut icon" href="/favicon.ico">

        <meta property="og:type" content="website">

        <meta property="twitter:card" content="summary_large_image">
        <meta name="twitter:creator" content="@levintoo" />

        <meta name="theme-color" content="#ffffff">
        <meta name="color-scheme" content="light">

        <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.ga4.measurementId') }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', '{{ config('services.ga4.measurementId') }}');
        </script>
        <script async src="https://beamanalytics.b-cdn.net/beam.min.js" data-token="f2e6a6bf-3f3f-4cac-9977-927d8c6eb569"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <style>
            .poppins-regular {
                font-family: "Poppins", sans-serif;
                font-weight: 400;
                font-style: normal;
            }
        </style>

        @inertiaHead

        <!-- Scripts -->
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
    </head>
    <body class="poppins-regular">
        @inertia
    </body>
</html>
