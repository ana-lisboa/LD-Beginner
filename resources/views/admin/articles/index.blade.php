<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Articles list
        </h2>
        <x-link href="{{ route('articles.create') }}" type="link">Add new article</x-link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @forelse($articles as $article)
                        <x-admin.list.article-view :article="$article"/>

                        @if($loop->last)
                            {{ $articles->links() }}
                        @endif
                    @empty
                        <p>No articles found.</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
