<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Http\Requests\StoreOrUpdateTagRequest;

class TagController extends Controller
{

    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.tags.index', ['tags' => Tag::paginate(10)]);
    }

    public function create()
    {
        return view('admin.tags.createOrUpdate');
    }

    public function store(StoreOrUpdateTagRequest $request)
    {
        $tag = Tag::create($request->only(['name']));

        session()->flash('success', 'Tag created successfully');
        return redirect()->route('tags.show', ['tag' => $tag->id]);
    }

    public function show(Tag $tag)
    {
        return redirect()->route('tags.edit', ['tag' => $tag->id]);
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.createOrUpdate', ['tag' => Tag::findOrFail($tag->id)]);
    }

    public function update(StoreOrUpdateTagRequest $request, Tag $tag)
    {
        $tag->update($request->only(['name']));

        session()->flash('success', 'Tag created successfully');
        return view('admin.tags.createOrUpdate', ['tag' => $tag]);
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        session()->flash('success', 'Tag deleted successfully');
        return redirect()->route('tags.index');
    }
}
