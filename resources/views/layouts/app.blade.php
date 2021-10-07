<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        @livewireStyles

        <style>
            /*!
            * Load Awesome v1.1.0 (http://github.danielcardoso.net/load-awesome/)
            * Copyright 2015 Daniel Cardoso <@DanielCardoso>
            * Licensed under MIT
            */
            .la-line-scale-pulse-out,
            .la-line-scale-pulse-out > div {
                position: relative;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                        box-sizing: border-box;
            }
            .la-line-scale-pulse-out {
                display: block;
                font-size: 0;
                color: #fff;
            }
            .la-line-scale-pulse-out.la-dark {
                color: #333;
            }
            .la-line-scale-pulse-out > div {
                display: inline-block;
                float: none;
                background-color: currentColor;
                border: 0 solid currentColor;
            }
            .la-line-scale-pulse-out {
                width: 40px;
                height: 32px;
            }
            .la-line-scale-pulse-out > div {
                width: 4px;
                height: 32px;
                margin: 2px;
                margin-top: 0;
                margin-bottom: 0;
                border-radius: 0;
                -webkit-animation: line-scale-pulse-out .9s infinite cubic-bezier(.85, .25, .37, .85);
                -moz-animation: line-scale-pulse-out .9s infinite cubic-bezier(.85, .25, .37, .85);
                    -o-animation: line-scale-pulse-out .9s infinite cubic-bezier(.85, .25, .37, .85);
                        animation: line-scale-pulse-out .9s infinite cubic-bezier(.85, .25, .37, .85);
            }
            .la-line-scale-pulse-out > div:nth-child(3) {
                -webkit-animation-delay: -.9s;
                -moz-animation-delay: -.9s;
                    -o-animation-delay: -.9s;
                        animation-delay: -.9s;
            }
            .la-line-scale-pulse-out > div:nth-child(2),
            .la-line-scale-pulse-out > div:nth-child(4) {
                -webkit-animation-delay: -.7s;
                -moz-animation-delay: -.7s;
                    -o-animation-delay: -.7s;
                        animation-delay: -.7s;
            }
            .la-line-scale-pulse-out > div:nth-child(1),
            .la-line-scale-pulse-out > div:nth-child(5) {
                -webkit-animation-delay: -.5s;
                -moz-animation-delay: -.5s;
                    -o-animation-delay: -.5s;
                        animation-delay: -.5s;
            }
            .la-line-scale-pulse-out.la-sm {
                width: 20px;
                height: 16px;
            }
            .la-line-scale-pulse-out.la-sm > div {
                width: 2px;
                height: 16px;
                margin: 1px;
                margin-top: 0;
                margin-bottom: 0;
            }
            .la-line-scale-pulse-out.la-2x {
                width: 80px;
                height: 64px;
            }
            .la-line-scale-pulse-out.la-2x > div {
                width: 8px;
                height: 64px;
                margin: 4px;
                margin-top: 0;
                margin-bottom: 0;
            }
            .la-line-scale-pulse-out.la-3x {
                width: 120px;
                height: 96px;
            }
            .la-line-scale-pulse-out.la-3x > div {
                width: 12px;
                height: 96px;
                margin: 6px;
                margin-top: 0;
                margin-bottom: 0;
            }
            /*
            * Animation
            */
            @-webkit-keyframes line-scale-pulse-out {
                0% {
                    -webkit-transform: scaley(1);
                            transform: scaley(1);
                }
                50% {
                    -webkit-transform: scaley(.3);
                            transform: scaley(.3);
                }
                100% {
                    -webkit-transform: scaley(1);
                            transform: scaley(1);
                }
            }
            @-moz-keyframes line-scale-pulse-out {
                0% {
                    -moz-transform: scaley(1);
                        transform: scaley(1);
                }
                50% {
                    -moz-transform: scaley(.3);
                        transform: scaley(.3);
                }
                100% {
                    -moz-transform: scaley(1);
                        transform: scaley(1);
                }
            }
            @-o-keyframes line-scale-pulse-out {
                0% {
                    -o-transform: scaley(1);
                    transform: scaley(1);
                }
                50% {
                    -o-transform: scaley(.3);
                    transform: scaley(.3);
                }
                100% {
                    -o-transform: scaley(1);
                    transform: scaley(1);
                }
            }
            @keyframes line-scale-pulse-out {
                0% {
                    -webkit-transform: scaley(1);
                    -moz-transform: scaley(1);
                        -o-transform: scaley(1);
                            transform: scaley(1);
                }
                50% {
                    -webkit-transform: scaley(.3);
                    -moz-transform: scaley(.3);
                        -o-transform: scaley(.3);
                            transform: scaley(.3);
                }
                100% {
                    -webkit-transform: scaley(1);
                    -moz-transform: scaley(1);
                        -o-transform: scaley(1);
                            transform: scaley(1);
                }
            }
        </style>
       
    </head>
    <body class="font-sans antialiased bg-light">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="d-flex py-3 bg-white shadow-sm border-bottom">
            <div class="container">
                {{ $header }}
            </div>
        </header>

        <!-- Page Content -->
        <main class="container my-5">
            {{ $slot }}
        </main>

        <!-- modals --->
        @yield('modals')

        @livewireScripts

        <!-- scripts --->
        @yield('scripts')
    </body>
</html>
