<main class="w-full m-5 h-screen">
    @foreach($posts as $post)
        <section
            class="mb-5 divide-y divide-gray-200 overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-950/5 dark:divide-white/10 dark:bg-gray-900 dark:ring-white/10">
            <header class="p-2.5 flex justify-between bg-gray-50">
                <h2 class="text-xl font-semibold text-gray-950">{{ $post->title }}</h2>
                <h4 class="text-gray-500 text-xs">{{ $post->published }}</h4>
            </header>
            <article class="p-5 text-sm text-gray-950 prose">
                {!! $post->content !!}
            </article>
        </section>
    @endforeach
    <footer>
        {{ $posts->links() }}
    </footer>
</main>




