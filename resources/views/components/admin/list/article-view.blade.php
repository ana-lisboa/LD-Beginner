<article class="flex flex-row justify-between mb-3 p-2 hover:shadow-md">
    <div class="infos grow flex flex-row">
        @if($article->image)
            <a href="{{ route('articles.show', $article->id) }}">
                <img class="w-20 mr-3"
                     src="{{ Storage::has($article->image) ? Storage::url($article->image) : $article->image }}"
                     alt="{{$article->title}} image">
            </a>
        @endif
        <a href="{{ route('articles.show', $article->id) }}">
            {{ $article->title }}
        </a>
    </div>
    <div class="actions">
        <a href="{{ route('articles.show', $article->id) }}">
            Update
        </a>

        <form method="POST" action="{{ route('articles.destroy', $article->id) }}" class="">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-sm btn-outline-danger">
                Delete
            </button>
        </form>
    </div>
</article>
