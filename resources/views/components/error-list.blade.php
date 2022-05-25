@forelse($errors->all() as $error)
    @if($loop->first)
        <div class="alert alert-danger mb-20">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                 role="alert">
                <strong class="font-bold">Whoops!</strong>
                <ul class="list-disc ml-5">
                    @endif
                    <li>{{ $error }}</li>
                    @if($loop->last)
                </ul>
            </div>
    @endif
@empty
@endforelse
