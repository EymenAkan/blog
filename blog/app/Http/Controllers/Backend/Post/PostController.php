<?php

namespace App\Http\Controllers\Backend\Post;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $roles = $user->roles()->pluck('name')->toArray();

        if (in_array('admin', $roles) || in_array('editor', $roles)) {
            $posts = Post::with('tags')->latest()->paginate(10);
        } else {
            $posts = Post::with('tags')->where('user_id', $user->id)->latest()->paginate(10);
        }

        return view('backend.posts.index', compact('posts'));
    }

    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('backend.posts.create', compact('tags', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $fileName = time() . '.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('frontend/assets/img'), $fileName);

        $post = new Post();
        $post->title = $validated['title'];
        $post->slug = Str::slug($validated['title']);
        $post->content = $validated['content'];
        $post->image = $fileName;
        $post->user_id = auth()->id();
        $post->save();

        $post->tags()->sync($validated['tags'] ?? []);
        $post->categories()->sync($validated['categories']);

        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function edit(Post $post)
    {
        $user = auth()->user();
        $tags = Tag::all();
        $categories = Category::all();

        return view('backend.posts.edit', compact('post', 'tags', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $user = auth()->user();
        if (!($user->hasRole('admin') || $user->hasRole('editor') || $user->id === $post->user_id)) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);

        $post->title = $validated['title'];
        $post->slug = Str::slug($validated['title']);
        $post->content = $validated['content'];

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('frontend/assets/img'), $fileName);
            $post->image = $fileName;
        }

        $post->save();
        $post->tags()->sync($validated['tags'] ?? []);
        $post->categories()->sync($validated['categories']);

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $user = auth()->user();
        if (!($user->hasRole('admin') || $user->id === $post->user_id)) {
            abort(403);
        }

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }


}
