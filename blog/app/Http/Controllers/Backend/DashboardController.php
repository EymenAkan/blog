<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::where('user_id', Auth::id())->with('tags', 'user')->latest()->paginate(10);
        return view('backend.dashboard', compact('posts'));
    }

    public function postsIndex()
    {
        $posts = Post::where('user_id', Auth::id())->with('tags', 'user')->latest()->paginate(10);
        return view('backend.posts.index', compact('posts'));
    }

    public function tagsIndex()
    {
        $tags = Tag::all();
        return view('backend.tags.index', compact('tags'));
    }
}
