<p class="my-3">
    @if($article->category)
        <span class="rounded bg-blue-200 blue-900 text-xs px-2 py-1">{{ $article->category->name }}</span>
    @else
        <span class="rounded bg-blue-200 blue-900 text-xs px-2 py-1">Uncategorized</span>
    @endif
</p>
