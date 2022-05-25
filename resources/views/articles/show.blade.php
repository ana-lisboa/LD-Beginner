<h1>{{ $article->title }}</h1>

<p>{{ $article->fullText }}</p>

@if($article->image)
    <img src="{{ $article->image }}" alt="{{$article->title}} image">
@endif
