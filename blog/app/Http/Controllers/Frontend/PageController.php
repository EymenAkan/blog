<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        // Get recent posts for project showcase
        $recentPosts = Post::with('tags')
            ->latest()
            ->take(6)
            ->get();

        // Get popular tags
        $popularTags = Tag::withCount('posts')
            ->orderBy('posts_count', 'desc')
            ->take(8)
            ->get();

        // Project statistics
        $stats = [
            'total_posts' => Post::count(),
            'total_tags' => Tag::count(),
            'total_words' => Post::selectRaw("CHAR_LENGTH(content) - CHAR_LENGTH(REPLACE(content, ?, ?)) + 1", [' ', ''])
                ->sum(\DB::raw("CHAR_LENGTH(content) - CHAR_LENGTH(REPLACE(content, ' ', '')) + 1")), 'project_duration' => 'Learning Project',
            'technologies_used' => 8
        ];

        return view('frontend.index', compact('recentPosts', 'popularTags', 'stats'));
    }

    public function about()
    {
        return view('frontend.about');
    }
}
