<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use App\User;
use App\Advert;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $comment = Comment::orderby('id', 'desc')->take(10)->get();
        $posts = Post::orderby('id', 'desc')->take(10)->get();
        return view('user.dashboard')
                                    ->with('post_count', Post::all())
                                    ->with('comment_count', Comment::all())
                                    ->with('advert_count', Advert::all())
                                    ->with('user_count', User::all())
                                    ->with('posts', $posts)
                                    ->with('category_count', Category::all())
                                    ->with('comments', $comment)
                                    ->with('trash_count', Post::onlyTrashed()->get());
    }
}
