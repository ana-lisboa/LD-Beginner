<x-app-layout>
    <x-slot name="header">
        <x-page-title>
            @if(isset($article))
                Update Article
            @else
                New Article
            @endif
        </x-page-title>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-error-list></x-error-list>

                    @if(isset($article))
                        <form method="POST" action="{{ route('articles.update', $article->id) }}"
                              enctype="multipart/form-data">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id" value="{{ $article->id }}">
                            @else
                                <form method="POST" action="{{ route('articles.store') }}"
                                      enctype="multipart/form-data">
                                    @endif

                                    <form method="POST" action="{{ route('articles.store') }}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="-mx-3 mb-6">
                                            <x-form-input-row>
                                                <x-label>Title</x-label>
                                                <input
                                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                    id="grid-first-name" type="text" name="title"
                                                    value="{{ old('title') ?? ($article->title ?? null) }}" required>
                                            </x-form-input-row>

                                            <x-form-input-row>
                                                <x-label>Body</x-label>
                                                <textarea
                                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                    id="grid-last-name" name="full_text" required>
                                    {{ old('full_text') ?? ($article->full_text ?? '') }}
                                </textarea>
                                            </x-form-input-row>

                                            <x-form-input-row>
                                                <x-label>Image</x-label>
                                                @if(isset($article->image))
                                                    <img src="{{ Storage::url($article->image) }}" alt="">
                                                @endif

                                                <input
                                                    class="file:appearance-none file:block file:w-full file:bg-gray-200 file:text-gray-700 file:border file:border-gray-200 file:rounded file:py-3 file:px-4 file:leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                    id="grid-last-name" type="file" name="image"
                                                    value="{{ old('image') }}">
                                            </x-form-input-row>
                                        </div>
                                        {{--
                                        <div class="-mx-3 md:flex mb-6">
                                            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                                       for="grid-first-name">
                                                    Category
                                                </label>
                                                <select
                                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                                    id="grid-first-name" type="text" name="category" value="{{ old('category') }}"
                                                    required>
                                                    <option value="">Select Category</option>
                                                    @foreach($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach

                                            </div>
                                        </div>
                                        --}}
                                        <x-button type="submit">{{ isset($article->image) ? 'Update' : 'Create'}}
                                            article
                                        </x-button>
                                    </form>
                </div>
            </div>
</x-app-layout>
