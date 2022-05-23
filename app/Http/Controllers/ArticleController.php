<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Prophecy\Argument\Token\ArrayCountToken;

class ArticleController extends Controller
{

    public function list()
    {
        return view('articles.index', ['articles' => Article::all()]);
    }

    public function detail(int $id)
    {
        return view('articles.show', ['article' => Article::findOrFail($id)]);
    }

    public function index()
    {
        return view('admin.articles.index', ['articles' => Article::all()]);
    }

    public function show(Article $article)
    {
        return view('admin.articles.show', ['article' => $article]);
    }

}
