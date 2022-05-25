<article class="flex flex-row mb-20 hover:shadow-md">
    @if($article->image)
        <a href="{{ route('articles.detail', $article->id) }}">
            <img src="{{ $article->image }}" alt="{{$article->title}} image" class="w-48 mr-5">
        </a>
    @endif

    <h2>
        <a href="{{ route('articles.detail', $article->id) }}">
            {{ $article->title }}
        </a>
    </h2>
    <div class="body">
        {{ $article->body }}
    </div>
</article>
