<article class="flex flex-row justify-between mb-3 p-2 hover:shadow-md">
    <div class="infos grow flex flex-row">
        <a href="{{ route('tags.show', $tag->id) }}">
            {{ $tag->name }}
        </a>
    </div>
    <div class="actions">
        <a href="{{ route('tags.show', $tag->id) }}">
            Update
        </a>

        <form method="POST" action="{{ route('tags.destroy', $tag->id) }}" class="">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-sm btn-outline-danger">
                Delete
            </button>
        </form>
    </div>
</article>
