<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Categories list
        </h2>
        <x-admin.link href="{{ route('categories.create') }}" type="link">Add new category</x-admin.link>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @forelse($categories as $category)
                        <x-admin.list.category-view :category="$category"/>

                        @if($loop->last)
                            {{ $categories->links() }}
                        @endif
                    @empty
                        <p>No categories found.</p>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
