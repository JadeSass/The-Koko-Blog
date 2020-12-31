<?php

namespace App\Http\Controllers;
use Session;
use App\Post;
use App\Profile;
use Auth;
use App\Category;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        if($categories->count() == 0)
        {
            Session::flash('message', 'You must have some categories before attempting to create a post.');

            return redirect()->back();
        }

        return view('user.posts.index')->with('categories', $categories)->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = Auth::user();

        $this->validate($request, [
            'title' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $image = $request->image;

        $image_new_name = time().$image->getClientOriginalName();

        $image->move('uploads/posts', $image_new_name);

        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => 'uploads/posts/' . $image_new_name,
            'category_id' => $request->category_id,
            'slug' => str_slug($request->title),
            'user_id' => $user->id
        ]);

        Session::flash('message', 'Post created succesfully.');


        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('user.posts.edit')->with('post', $post)
                                      ->with('categories', Category::all())->with('posts', Post::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'

        ]);

        $post = Post::find($id);

        if($request->hasFile('image'))
        {
            $image = $request->image;

            $image_new_name = time() . $image->getClientOriginalName();

            $image->move('uploads/posts', $image_new_name);

            $post->image = 'uploads/posts/'.$image_new_name;

        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;

        $post->save();

        Session::flash('message', 'Post updated successfully.');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->delete();

        Session::flash('message', 'The post was just trashed.');

        return redirect()->back();
    }

    public function trashed() {
        $posts = Post::onlyTrashed()->get();

        return view('user.posts.trash')->with('posts', $posts);
    }

    public function kill($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->forceDelete();

        Session::flash('message', 'Post deleted permanently.');

        return redirect()->back();
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id', $id)->first();

        $post->restore();

        Session::flash('message', 'Post restored successfully.');

        return redirect()->back();
    }
}
