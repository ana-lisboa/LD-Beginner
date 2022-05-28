<article class="flex flex-row mb-20 hover:shadow-md">
    @if($article->image)
        <a href="{{ route('articles.detail', $article->id) }}">
            <x-front.article-image :article="$article"/>
        </a>
    @endif

    <div class="content">
        <h2 class="text-2xl">
            <a href="{{ route('articles.detail', $article->id) }}">
                {{ $article->title }}
            </a>
        </h2>
        <div class="body">
            {{ $article->full_text }}
        </div>

        <x-front.article-category :article="$article"/>

        <x-front.tag-list :article="$article"/>

    </div>

</article>
