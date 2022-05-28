<x-guest-layout>
    <h1 class="text-2xl font-extrabold mb-20">{{ $article->title }}</h1>

    <p>{{ $article->fullText }}</p>

    <x-front.article-image :article="$article"/>

    <x-front.article-category :article="$article"/>

    <x-front.tag-list :article="$article"/>

    <p class="mt-8">
        <a href="/" class="underline text-blue-500">Back to home</a>
    </p>
</x-guest-layout>
