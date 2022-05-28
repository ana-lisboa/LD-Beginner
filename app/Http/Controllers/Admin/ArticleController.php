<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Http\Requests\StoreOrUpdateArticleRequest;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{

    public function index(): View|Factory|Application
    {
        return view('admin.articles.index', ['articles' => Article::paginate(10)]);
    }

    public function create(): Factory|View|Application
    {
        return view('admin.articles.createOrUpdate', [
            'tags' => Tag::all()->pluck('name', 'id'),
            'categories' => Category::all()->pluck('name', 'id')
        ]);
    }


    public function store(StoreOrUpdateArticleRequest $request): RedirectResponse
    {
        $article = Article::create($request->only(['title', 'full_text', 'category_id']));

        if ($request->hasFile('image')) {
            $this->saveImage($request->file('image'), $article);
        }

        //attach tags
        $article->tags()->attach($request->input('tags'));

        session()->flash('success', 'Article created successfully');

        return redirect()->route('articles.show', ['article' => $article->id]);
    }

    public function show($id)
    {
        return redirect()->route('articles.edit', ['article' => $id]);
    }


    public function edit($id): Factory|View|Application
    {
        $article = Article::with('tags')->findOrFail($id);

        return view('admin.articles.createOrUpdate', [
            'article' => $article,
            'tags' => Tag::all()->pluck('name', 'id'),
            'categories' => Category::all()->pluck('name', 'id')
        ]);
    }

    public function update(StoreOrUpdateArticleRequest $request, Article $article): RedirectResponse
    {
        $article->update($request->only(['title', 'full_text', 'category_id']));

        $this->updateImage($article, $request->file('image'));

        $article->tags()->sync($request->input('tags'));

        session()->flash('success', 'Article created successfully');

        return redirect()->route('articles.edit', ['article' => $article->id]);
    }

    public function destroy(Article $article)
    {
        Storage::delete($article->image);
        $article->delete();

        session()->flash('success', 'Article deleted successfully');
        return redirect()->route('admin.articles.index');
    }

    private function saveImage(array|UploadedFile|null $file, $article)
    {
        $fileName = Str::random(20) . '.' . Str::slug($article->title) . '.' . $file->getClientOriginalExtension();

        Storage::disk('public')->putFileAs('/', $file, $fileName);
        $article->update(['image' => $fileName]);
    }

    private function updateImage(Article $article, array|UploadedFile|null $file)
    {
        if ($file) {

            if ($article->image) {
                Storage::disk('public')->delete('/' . $article->image);
            }

            $this->saveImage($file, $article);
        }
    }
}
