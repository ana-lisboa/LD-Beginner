<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrUpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{

    public function index(): View|Factory|Application
    {
        return view('admin.categories.index', ['categories' => Category::paginate(10)]);
    }

    public function create(): Factory|View|Application
    {
        return view('admin.categories.createOrUpdate');
    }


    public function store(StoreOrUpdateCategoryRequest $request): RedirectResponse
    {
        $category = Category::create($request->only(['name']));

        session()->flash('success', 'Category created successfully');

        return redirect()->route('categories.show', ['category' => $category->id]);
    }

    public function show($id): RedirectResponse
    {
        return redirect()->route('categories.edit', ['category' => $id]);
    }


    public function edit($id): Factory|View|Application
    {
        return view('admin.categories.createOrUpdate', ['category' => Category::findOrFail($id)]);
    }

    public function update(StoreOrUpdateCategoryRequest $request, Category $category): RedirectResponse
    {
        $category->update($request->only(['name']));

        session()->flash('success', 'Category created successfully');

        return redirect()->route('categories.edit', ['category' => $category->id]);
    }

    public function destroy(Category $category)
    {
        $category->delete();

        session()->flash('success', 'Category deleted successfully');

        return redirect()->route('admin.categories.index');
    }

}
