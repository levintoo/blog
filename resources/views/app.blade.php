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

        <meta name="theme-color" content="#ffffff">
        <meta name="color-scheme" content="light">

        @inertiaHead

        <!-- Scripts -->
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])

        <title>Levin</title>
    </head>
    <body class="poppins-regular">
        @inertia
    </body>
</html>
