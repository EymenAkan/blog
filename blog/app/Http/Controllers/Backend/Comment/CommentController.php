<?php

namespace App\Http\Controllers\Backend\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $roles = $user->roles()->pluck('name')->toArray();

        if (in_array('admin', $roles) || in_array('editor', $roles)) {
            $comments = Comment::with(['user', 'post'])->latest()->paginate(10);
        } else {
            $comments = Comment::with(['user', 'post'])->where('user_id', $user->id)->latest()->paginate(10);
        }

        return view('backend.comments.index', compact('comments'));
    }

    public function create()
    {
        return redirect()->route('blog.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'comment' => 'required|string|max:255',
            'post_id' => 'required|exists:posts,id',
        ]);

        $comment = new Comment();
        $comment->comment = $validated['comment'];
        $comment->post_id = $validated['post_id'];
        $comment->user_id = Auth::id();
        $comment->save();

        return redirect()->back()->with('success', 'Comment added successfully.');
    }

    public function edit(Comment $comment)
    {
        $user = Auth::user();
        if (!in_array('admin', $roles = $user->roles()->pluck('name')->toArray()) && !in_array('editor', $roles) && $user->id !== $comment->user_id) {
            abort(404);
        }

        return view('backend.comments.edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $user = Auth::user();
        if (!in_array('admin', $roles = $user->roles()->pluck('name')->toArray()) && !in_array('editor', $roles) && $user->id !== $comment->user_id) {
            abort(404);
        }

        $validated = $request->validate([
            'comment' => 'required|string|max:255',
        ]);

        $comment->comment = $validated['comment'];
        $comment->save();

        return redirect()->route('comments.index')->with('success', 'Comment updated successfully.');
    }

    public function destroy(Comment $comment)
    {
        $user = Auth::user();
        if (!in_array('admin', $roles = $user->roles()->pluck('name')->toArray()) && !in_array('editor', $roles) && $user->id !== $comment->user_id) {
            abort(404);
        }

        $comment->delete();
        return redirect()->route('comments.index')->with('success', 'Comment deleted successfully.');
    }
}
