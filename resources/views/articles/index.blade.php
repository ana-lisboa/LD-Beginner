<x-guest-layout>
    <h1 class="text-2xl font-extrabold mb-20">articles list</h1>

    @forelse($articles as $article)
        <x-article-view :article="$article"/>

        @if($loop->last)
            {{ $articles->links() }}
        @endif
    @empty
        <p>No articles found.</p>
    @endforelse
</x-guest-layout>
