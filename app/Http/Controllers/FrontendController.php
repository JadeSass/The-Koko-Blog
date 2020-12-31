<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Comment;
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function index(){
        $posts = Post::orderBy('created_at', 'desc')->paginate(25);
        return view('index', ['posts'=> $posts])->with('categories', Category::all());
    }
    public function single($slug,$id){
        $post = Post::where('slug', $slug)->first();
        $comment = Comment::where('commentable_id', $post->id)->get();
        return view('dynamic.single')->with('post', $post)
                                    ->with('categories', Category::all())
                                    ->with('comments', $comment);
    }
}
