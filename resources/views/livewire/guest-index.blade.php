<div class="container">
    <header class="fi-sidebar-header flex h-16 items-center bg-white ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/5 lg:shadow-sm">
        <div class="p-5 fi-logo text-xl font-bold leading-5 tracking-tight text-gray-950 dark:text-white">
            <a href="/">{{ config('app.name', 'Laravel') }}</a>
        </div>
        <nav>
            <a href="books">Books</a>
            <a href="onsale">Sale</a>
            <a href="news">News</a>
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
        <main class=" w-full m-5">
            <livewire:guest-index-post></livewire:guest-index-post>
            {{ $this->table }}
        </main>
        <aside class="w-1/4">
            <article>
                <livewire:guest-book-counter></livewire:guest-book-counter>
            </article>
        </aside>
    </section>
    <footer></footer>
</div>
