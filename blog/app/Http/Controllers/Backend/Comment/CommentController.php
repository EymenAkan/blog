<?php

namespace App\Http\Controllers\Backend\Comment;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CommentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $roles = $user->roles()->pluck('name')->toArray();

        if (in_array('admin', $roles) || in_array('editor', $roles)) {
            $comments = Comment::with('comments')->latest()->paginate(10);
        } else {
            $comments = Comment::with('comments')->where('user_id', $user->id)->latest()->paginate(10);
        }

        return view('backend.comments.index', compact('comments'));
    }

    public function edit(Comment $comment)
    {
        $user = auth()->user();

        return view('backend.comment.edit', compact('comment'));
    }

    public function destroy(Comment $comment)
    {
        $user = auth()->user();
        if (!($user->hasRole('admin') || $user->id === $comment->user_id)) {
            abort(403);
        }

        $comment->delete();
        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully.');
    }
}
