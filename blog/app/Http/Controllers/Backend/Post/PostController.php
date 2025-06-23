<?php

namespace App\Http\Controllers\Backend\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $postshow = Post::paginate(10);
        $posts = Post::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        $tagshow = Tag::paginate(10);
        $tags = Tag::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        return view('backend.posts.index', compact('posts', 'postshow', 'tags', 'tagshow'));
    }

    public function create()
    {
        $tags = Tag::all();
        return view('backend.posts.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ]);

        $file_name = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('frontend/assets/img'), $file_name);

        $post = new Post();
        $post->title = $validated['title'];
        $post->slug = Str::slug($validated['title']);
        $post->content = $validated['content'];
        $post->image = $file_name;
        $post->save();
        if (isset($validated['tags'])) {
            $post->tags()->sync($validated['tags']);
        }


        return redirect()->route('backend.posts.index')->with('success', 'Post Created');
    }

    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $tags = Tag::all();
        return view('backend.posts.edit', compact('post', 'tags'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tags' => 'array',
            'tags.*' => 'exists:tags,id',
        ]);

        $post->title = $validated['title'];
        $post->content = $validated['content'];

        if ($request->hasFile('image')) {
            $file_name = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('frontend/assets/img'), $file_name);
            $post->image = $file_name;
        }

        $post->tags()->sync($validated['tags'] ?? []);
        $post->save();


        return redirect()->route('backend.posts.index')->with('success', 'Post Updated');
    }
}
