<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $posts = Auth::user()->hasRole('admin') ? Post::latest()->get() : Auth::user()->posts()->latest()->get();
        $users = Auth::user()->hasRole('admin') ? User::all() : collect();
        return view('backend.dashboard', compact('posts', 'users'));
    }
}
