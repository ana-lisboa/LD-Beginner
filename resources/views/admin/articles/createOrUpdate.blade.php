<x-app-layout>
    <x-slot name="header">
        <x-admin.page-title>
            @if(isset($article))
                Update Article
            @else
                New Article
            @endif
        </x-admin.page-title>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-admin.error-list></x-admin.error-list>

                    @if(isset($article))
                        <form method="POST" action="{{ route('articles.update', $article->id) }}"
                              enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id" value="{{ $article->id }}">
                            @else
                                <form method="POST" action="{{ route('articles.store') }}"
                                      enctype="multipart/form-data">
                                    @endif

                                    @csrf
                                    <div class="-mx-3 mb-6">
                                        <x-admin.form-input-row>
                                            <x-admin.label>Title</x-admin.label>
                                            <input
                                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="grid-first-name" type="text" name="title"
                                                value="{{ old('title') ?? ($article->title ?? null) }}" required>
                                        </x-admin.form-input-row>

                                        <x-admin.form-input-row>
                                            <x-admin.label>Body</x-admin.label>
                                            <textarea
                                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="grid-last-name" name="full_text" required>
                                        {{ old('full_text') ?? ($article->full_text ?? '') }}
                                    </textarea>
                                        </x-admin.form-input-row>

                                        <x-admin.form-input-row>
                                            <x-admin.label>Image</x-admin.label>
                                            @if(isset($article->image))
                                                <img src="{{ Storage::url($article->image) }}" alt="">
                                            @endif

                                            <input
                                                class="file:appearance-none file:block file:w-full file:bg-gray-200 file:text-gray-700 file:border file:border-gray-200 file:rounded file:py-3 file:px-4 file:leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="grid-last-name" type="file" name="image"
                                                value="{{ old('image') }}">
                                        </x-admin.form-input-row>

                                        <x-admin.form-input-row>
                                            <x-admin.label>Article tags</x-admin.label>
                                            <select name="tags[]" multiple="multiple" title="Tags"
                                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                                @foreach($tags as $id => $tagName)
                                                    <option
                                                        value="{{ $id }}" {{ isset($article) && $article->tags->where('id', $id)->isNotEmpty() ? 'selected="selected"' : '' }}>{{ $tagName }}</option>
                                                @endforeach
                                            </select>
                                        </x-admin.form-input-row>

                                        <x-admin.form-input-row>
                                            <x-admin.label>Article Category</x-admin.label>
                                            <select
                                                class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                id="grid-first-name" type="text" name="category_id">
                                                <option value="">Select Category</option>
                                                @foreach($categories as $id => $categoryName)
                                                    <option
                                                        value="{{ $id }}" {{ isset($article) && $article->category ? 'selected="selected"' : '' }}>{{ $categoryName }}</option>
                                                @endforeach
                                            </select>
                                        </x-admin.form-input-row>
                                    </div>
                                    <x-admin.button type="submit">{{ isset($article) ? 'Update' : 'Create'}}
                                        article
                                    </x-admin.button>
                                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
