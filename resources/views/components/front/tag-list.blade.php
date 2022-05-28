@foreach($article->tags as $tag)
    <span class="rounded bg-gray-200 gray-900 text-xs px-2 py-1">{{ $tag->name }}</span>
@endforeach
