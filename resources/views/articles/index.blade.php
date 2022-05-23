<h1>articles list</h1>

@forelse($articles as $article)
    <article>

        @if($article->image)
            <a href="{{ route('articles.detail', $article->id) }}">
                <img src="{{ $article->image }}" alt="{{$article->title}} image">
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
@empty
    <p>No articles found.</p>
@endforelse
