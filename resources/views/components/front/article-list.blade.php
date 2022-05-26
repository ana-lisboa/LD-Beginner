<article class="flex flex-row mb-20 hover:shadow-md">
    @if($article->image)
        <a href="{{ route('articles.detail', $article->id) }}">
            <img src="{{ Storage::has($article->image) ? Storage::url($article->image) : $article->image }}"
                 alt="{{$article->title}} image" class="w-48 mr-5">
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

        @foreach($article->tags as $tag)
            <x-front.tag-list :tag="$tag"/>
        @endforeach
    </div>

</article>
