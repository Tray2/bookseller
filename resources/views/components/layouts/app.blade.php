<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>

    <meta name="application-name" content="{{ config('app.name') }}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <title>{{ config('app.name') }}</title>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="antialiased bg-stone-200">
<div class="container mx-auto h-screen">
    <header
        class="fi-sidebar-header flex h-16 justify-between pr-5 items-center bg-violet-950 ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/5 lg:shadow-sm">
        <div class="p-5 fi-logo text-xl font-bold leading-5 tracking-tight text-stone-200 dark:text-white">
            <a href="{{ route('home') }}">{{ config('app.name', 'BookSeller') }}</a>
        </div>
        <nav class="flex w-full">
            <a href="{{ route('books') }}"
               class="text-stone-200
                      hover:text-stone-500
                      hover:underline
                      mr-3
                      "
            >Books</a>
            <a href="{{ route('sale') }}"
               class="text-stone-200
                      hover:text-stone-500
                      hover:underline
                      mr-3
                      ">Sale</a>
            <a href="{{ route('news') }}"
               class="text-stone-200
                      hover:text-stone-500
                      hover:underline
                      ">News</a>
        </nav>
        <div>
            <a href="{{ route('login') }}" class="text-stone-200">Login</a>
        </div>
    </header>
    <section class="flex container h-full">
        <aside class="w-1/4">
            <article>
                <livewire:guest-opening-hours></livewire:guest-opening-hours>
                <livewire:guest-deviating-opening-hours></livewire:guest-deviating-opening-hours>
            </article>
            <article>
                <livewire:guest-contact></livewire:guest-contact>
            </article>
        </aside>
            {{ $slot }}
        <aside class="w-1/4">
            <article>
                <livewire:guest-book-counter></livewire:guest-book-counter>
            </article>
        </aside>
    </section>
    <footer class="text-center text-sm sticky bottom-0 bg-gray-900 py-2">
        <div class="w-full text-gray-200">
            Copyright {{ config('app.name', 'BookSeller') }} {{ date('Y') }} All rights reserved.
        </div>
        <div class="text-gray-200 text-xs">
            Made with <a href="github.com/tray2/bookseller" class="underline text-gray-100">BookSeller</a>
        </div>
    </footer>
</div>

@filamentScripts
@vite('resources/js/app.js')
</body>
</html>
