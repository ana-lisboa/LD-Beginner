@if($article->image)
    <img src="{{ Storage::has($article->image) ? Storage::url($article->image) : $article->image }}"
         alt="{{$article->title}} image" class="w-48 mr-5">
@endif
