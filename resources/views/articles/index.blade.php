<h1>articles list</h1>

@forelse($articles as $article)
    <article>
        <h2>
            <a href="{{ route('articles.show', $article->id) }}">
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
