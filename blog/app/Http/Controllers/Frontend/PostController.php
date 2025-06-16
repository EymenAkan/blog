<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('frontend.posts.index', compact('posts'));
    }

    public function filterByTag(Tag $tag)
    {
        $posts = Post::whereHas('tags', function ($query) use ($tag) {
            $query->where('tags.id', $tag->id);
        })->with('tags')->latest()->get();

        return view('frontend.posts.index', compact('posts', 'tag'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('frontend.posts.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ]);

        $file_name = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('frontend/assets/img'), $file_name);

        $post = new Post();
        $post->title = $validated['title'];
        $post->slug = Str::slug($validated['title']);
        $post->description = $validated['description'];
        $post->image = $file_name;
        $post->save();
        if (isset($validated['tags'])) {
            $post->tags()->sync($validated['tags']);
        }


        return redirect()->route('posts.index')->with('success', 'Post Created');
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('frontend.posts.show', compact('post'));
    }

    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $tags = Tag::all();
        return view('frontend.posts.edit', compact('post', 'tags'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ]);

        $post->title = $validated['title'];
        $post->description = $validated['description'];

        if ($request->hasFile('image')) {
            $file_name = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('frontend/assets/img'), $file_name);
            $post->image = $file_name;
        }

        $post->tags()->sync($validated['tags'] ?? []);
        $post->save();


        return redirect()->route('frontend.posts.index')->with('success', 'Post Updated');
    }
}
