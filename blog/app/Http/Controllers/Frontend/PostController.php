<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function index()
    {
        $postshow = Post::paginate(10);
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('frontend.posts.index', compact('posts', 'postshow'));
    }

    public function filterByTag(Tag $tag)
    {
        $posts = Post::whereHas('tags', function ($query) use ($tag) {
            $query->where('tags.id', $tag->id);
        })->with('tags')->latest()->get();

        return view('frontend.posts.index', compact('posts', 'tag'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        return view('frontend.posts.show', compact('post'));
    }

    public function CommentStore(Request $request)
    {
        request()->validate([
            'comment' => 'required|string|max:255',
        ]);

        $input = $request->all();
        $input['user_id'] = auth()->id();

        Comment::create($input);

        return back()->with('success', 'Comment added successfully.');
    }

}
