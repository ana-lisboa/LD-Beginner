<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Requests\StoreOrUpdateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function list(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('articles.index', ['articles' => Article::paginate(5)]);
    }

    public function detail(Article $article): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('articles.show', ['article' => $article]);
    }


    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.articles.index', ['articles' => Article::paginate(10)]);
    }

    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.articles.createOrUpdate');
    }


    public function store(StoreOrUpdateArticleRequest $request): \Illuminate\Http\RedirectResponse
    {
        $article = Article::create($request->only(['title', 'full_text']));

        if ($request->hasFile('image')) {
            $this->saveImage($request->file('image'), $article);
        }

        session()->flash('success', 'Article created successfully');
        return redirect()->route('articles.show', ['article' => $article->id]);
    }

    public function show($id)
    {
        return redirect()->route('articles.edit', ['article' => $id]);
    }


    public function edit($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.articles.createOrUpdate', ['article' => Article::findOrFail($id)]);
    }

    public function update(StoreOrUpdateArticleRequest $request, Article $article): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {

        $article->update($request->only(['title', 'full_text']));

        $this->updateImage($article, $request->file('image'));

        session()->flash('success', 'Article created successfully');
        return view('admin.articles.createOrUpdate', ['article' => $article]);
    }

    public function destroy(Article $article)
    {
        Storage::delete($article->image);
        $article->delete();
        session()->flash('success', 'Article deleted successfully');
        return redirect()->route('articles.index');
    }

    private function saveImage(array|\Illuminate\Http\UploadedFile|null $file, $article)
    {
        $fileName = Str::random(20) . '.' . Str::slug($article->title) . '.' . $file->getClientOriginalExtension();

        Storage::disk('public')->putFileAs('/', $file, $fileName);
        $article->update(['image' => $fileName]);
    }

    private function updateImage(Article $article, array|\Illuminate\Http\UploadedFile|null $file)
    {
        if ($file) {

            if ($article->image) {
                Storage::disk('public')->delete('/' . $article->image);
            }

            $this->saveImage($file, $article);
        }
    }
}
