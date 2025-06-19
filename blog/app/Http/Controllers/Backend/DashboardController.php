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
        $user = Auth::user();

        $recentPosts = Post::where('user_id', $user->id)
            ->with('tags')
            ->latest()
            ->take(5)
            ->get();

        $userTags = Tag::whereHas('posts', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })
            ->withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->take(5)
            ->get();

        $stats = [
            'total_posts' => Post::where('user_id', $user->id)->count(),
            'total_tags' => $userTags->count(),
            'total_words' => Post::where('user_id', $user->id)
                ->sum(\DB::raw("CHAR_LENGTH(description) - CHAR_LENGTH(REPLACE(description, ' ', '')) + 1")),
        ];

        return view('backend.dashboard', compact('user', 'recentPosts', 'userTags', 'stats'));
    }
}
