<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ArticleController extends Controller
{
    public function index(): Factory|View|Application
    {
        return view('front.articles.index', [
            'articles' => Article::with('tags', 'category')
                ->orderByDesc('created_at')
                ->paginate(5)
        ]);
    }

    public function show(Article $article): Factory|View|Application
    {
        return view('front.articles.show', ['article' => $article]);
    }
}
