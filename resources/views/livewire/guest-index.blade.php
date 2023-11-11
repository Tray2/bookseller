<div>
    <header class="fi-sidebar-header flex h-16 items-center bg-white ring-1 ring-gray-950/5 dark:bg-gray-900 dark:ring-white/5 lg:shadow-sm">
        <div class="fi-logo text-xl font-bold leading-5 tracking-tight text-gray-950 dark:text-white">
            {{ config('app.name', 'Laravel') }}
        </div>
        <nav>
            Books
        </nav>
    </header>
    <section class="flex">
        <aside class="w-full">
            <article>
                <livewire:guest-opening-hours></livewire:guest-opening-hours>
                <livewire:guest-deviating-opening-hours></livewire:guest-deviating-opening-hours>
            </article>
            <article>
                <livewire:guest-contact></livewire:guest-contact>
            </article>
        </aside>
        <main>
            {{ $this->table }}
        </main>
        <aside>Aside 2</aside>
    </section>
    <footer></footer>
</div>
