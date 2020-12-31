<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;
use Session;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'comment' => 'required',
            'email' => 'required'
        ]);

        $comment = new Comment;

        $comment->comment = $request->comment;
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->user_id = Session::getId();

        $post = Post::find($request->get('id'));
        $post->comments()->save($comment);
        Session::flash('message', 'You have succesfully commented');

        return redirect()->back();
        // dd($comment);
        // $comment->save();

        return back();
    }
    public function replyStore(Request $request)
    {
        $reply = new Comment();

        $reply->comment = $request->get('comment');
        $reply->name = $request->get('name');
        $reply->email = $request->get('email');

        $reply->parent_id = $request->get('comment_id');

        $post = Post::find($request->get('id'));

        $post->comments()->save($reply);

        return back();

    }
}
