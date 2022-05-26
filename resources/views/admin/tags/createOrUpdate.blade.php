<x-app-layout>
    <x-slot name="header">
        <x-page-title>
            @if(isset($tag))
                Update Tag
            @else
                New Tag
            @endif
        </x-page-title>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-error-list></x-error-list>

                    @if(isset($tag))
                        <form method="POST" action="{{ route('tags.update', $tag->id) }}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id" value="{{ $tag->id }}">
                            @else
                                <form method="POST" action="{{ route('tags.store') }}">
                                    @endif

                                    @csrf
                                    <div class="-mx-3 mb-6">
                                        <x-form-input-row>
                                            <x-label>Name</x-label>
                                            <input
                                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="grid-first-name" type="text" name="name"
                                                value="{{ old('name') ?? ($tag->name ?? null) }}" required>
                                        </x-form-input-row>

                                        <x-button type="submit">{{ isset($tag) ? 'Update' : 'Create'}}
                                            tag
                                        </x-button>
                                    </div>
                                </form>
                </div>
            </div>
</x-app-layout>
