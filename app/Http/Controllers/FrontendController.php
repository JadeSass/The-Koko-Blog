<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Comment;
use App\Advert;
use Carbon\Carbon;

class FrontendController extends Controller
{
    public function __construct()
    {
        $date = date('F j, Y');
        $finish = Advert::where('ends_at', $date);
        $ads = $finish;
        $ads->delete();
    }

    public function index(){
        // dd($id);
        $sponsored = Advert::where('ads_type', 'Sponsored Post')->inRandomOrder()->limit(5)->get();
        $sideadvert = Advert::where('ads_type', 'Sidebar Random')->inRandomOrder()->limit(5)->get();
        $post = Post::orderBy('created_at', 'desc')->take(1)->get();
        $postSingle = Post::inRandomOrder()->take(1)->get();
        return view('index')->with('categories', Category::all())
                                                ->with('category_1', Category::find('YHEQKb8MYjGYxcfT7euq'))
                                                ->with('allPost', $post)
                                                ->with('singlePost', $postSingle)
                                                ->with('sponsored', $sponsored)
                                                ->with('sidevert', $sideadvert)
                                                ->with('adverts', Advert::where('ads_type', 'Advertisement')->inRandomOrder()->limit(5)->get());
    }
    public function single($slug){
        $post = Post::where('slug', $slug)->first();
        $next_id = Post::where('id', '>', $post->id)->min('id');
        $prev_id = Post::where('id', '<', $post->id)->max('id');
        $post->incrementReadCount();
        $postSingle = Post::inRandomOrder()->take(1)->get();

        $comment = Comment::where('commentable_id', $post->id)->get();
        $sideadvert = Advert::where('ads_type', 'Sidebar Random')->inRandomOrder()->limit(5)->get();

        $sponsored = Advert::where('ads_type', 'Sponsored Post')->inRandomOrder()->limit(5)->get();
        $adverts = Advert::where('ads_type', 'Advertisement')->inRandomOrder()->limit(5)->get();

        return view('dynamic.single')->with('post', $post)
                                    ->with('categories', Category::all())
                                    ->with('comments', $comment)
                                    ->with('next', Post::find($next_id))
                                    ->with('prev', Post::find($prev_id))
                                    ->with('sidevert', $sideadvert)
                                    ->with('sponsored', $sponsored)
                                    ->with('singlePost', $postSingle)
                                    ->with('adverts', $adverts);
    }
    public function search(){
        $posts = \App\Post::where('title','like',  '%' . request('query') . '%')->get();
        $sponsored = Advert::where('ads_type', 'Sponsored Post')->inRandomOrder()->limit(5)->get();
        $adverts = Advert::where('ads_type', 'Advertisement')->inRandomOrder()->limit(5)->get();
        $postSingle = Post::inRandomOrder()->take(1)->get();
        return view('dynamic.search')->with('posts', $posts)
                ->with('title', 'Search results : ' . request('query'))
                ->with('categories', \App\Category::all())
                ->with('query', request('query'))
                ->with('singlePost', $postSingle)
                ->with('sponsored', $sponsored)
                ->with('adverts', $adverts);
    }

    public function category($id)
    {
        $sideadvert = Advert::where('ads_type', 'Sidebar Random')->inRandomOrder()->limit(5)->get();
        $sponsored = Advert::where('ads_type', 'Sponsored Post')->inRandomOrder()->limit(5)->get();
        $adverts = Advert::where('ads_type', 'Advertisement')->inRandomOrder()->limit(5)->get();
        $category = Category::find($id);
        $postSingle = Post::inRandomOrder()->take(1)->get();
        return view('dynamic.category')->with('categories', Category::all())
                                    ->with('category', $category)
                                    ->with('posts', $category->posts()->paginate(14))
                                    ->with('title', $category->name)
                                    ->with('singlePost', $postSingle)
                                    ->with('sidevert', $sideadvert)
                                    ->with('sponsored', $sponsored)
                                    ->with('adverts', $adverts);
    }
}
