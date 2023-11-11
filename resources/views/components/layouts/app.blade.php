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

<body class="antialiased">
<div class="container mx-auto">
    <header
        class="fi-sidebar-header flex h-16 items-center bg-white ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/5 lg:shadow-sm">
        <div class="p-5 fi-logo text-xl font-bold leading-5 tracking-tight text-gray-950 dark:text-white">
            <a href="{{ route('home') }}">{{ config('app.name', 'BookSeller') }}</a>
        </div>
        <nav>
            <a href="{{ route('books') }}">Books</a>
            <a href="{{ route('sale') }}">Sale</a>
            <a href="{{ route('news') }}">News</a>
        </nav>
    </header>
    <section class="flex container">
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
    <footer class="text-center text-sm">
        <div class="w-full text-gray-950">
            Copyright {{ config('app.name', 'BookSeller') }} {{ date('Y') }} All rights reserved.
        </div>
        <div class="text-gray-500 text-xs">
            Made with <a href="github.com/tray2/bookseller" class="underline">BookSeller</a>
        </div>
    </footer>
</div>

@filamentScripts
@vite('resources/js/app.js')
</body>
</html>
