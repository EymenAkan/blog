<?php

namespace App\Http\Controllers\Backend\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('name')->get();
        return view('backend.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('backend.tags.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:tags,name',
            'theme_color' => 'required|string|regex:/^#[0-9A-Fa-f]{6}$/',
        ]);

        $tag = new Tag();
        $tag->name = $validated['name'];
        $tag->slug = Str::slug($validated['name']);
        $tag->theme_color = $validated['theme_color'];
        $tag->save();

        return redirect()->route('backend.tags.index')->with('success', 'Tag created successfully!');
    }

    public function edit(Tag $tag)
    {
        return view('backend.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:tags,name,' . $tag->id,
            'theme_color' => 'required|string|regex:/^#[0-9A-Fa-f]{6}$/',
        ]);

        $tag->name = $validated['name'];
        $tag->slug = Str::slug($validated['name']);
        $tag->theme_color = $validated['theme_color'];
        $tag->save();

        return redirect()->route('backend.tags.index')->with('success', 'Tag updated successfully!');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('backend.tags.index')->with('success', 'Tag deleted successfully!');
    }
}
