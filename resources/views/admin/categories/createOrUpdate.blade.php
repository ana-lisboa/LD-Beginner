<x-app-layout>
    <x-slot name="header">
        <x-admin.page-title>
            @if(isset($category))
                Update Category
            @else
                New Category
            @endif
        </x-admin.page-title>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-admin.error-list></x-admin.error-list>

                    @if(isset($category))
                        <form method="POST" action="{{ route('categories.update', $category->id) }}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id" value="{{ $category->id }}">
                            @else
                                <form method="POST" action="{{ route('categories.store') }}">
                                    @endif

                                    @csrf
                                    <div class="-mx-3 mb-6">
                                        <x-admin.form-input-row>
                                            <x-admin.label>Name</x-admin.label>
                                            <input
                                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="grid-first-name" type="text" name="name"
                                                value="{{ old('name') ?? ($category->name ?? null) }}" required>
                                        </x-admin.form-input-row>

                                        <x-admin.button type="submit">{{ isset($category) ? 'Update' : 'Create'}}
                                            category
                                        </x-admin.button>
                                    </div>
                                </form>
                </div>
            </div>
</x-app-layout>
