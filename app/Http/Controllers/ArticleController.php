<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{

    public function index()
    {
        return view('articles.index', ['articles' => Article::all()]);
    }

    public function show($id)
    {
        return view('articles.show', ['id' => $id]);
    }

}
