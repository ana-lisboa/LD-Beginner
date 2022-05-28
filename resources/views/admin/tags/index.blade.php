<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tags list
        </h2>
        <x-admin.link href="{{ route('tags.create') }}" type="link">Add new tag</x-admin.link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @forelse($tags as $tag)
                        <x-admin.list.tag-view :tag="$tag"/>

                        @if($loop->last)
                            {{ $tags->links() }}
                        @endif
                    @empty
                        <p>No tags found.</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
