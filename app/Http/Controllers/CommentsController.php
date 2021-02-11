<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;
use Session;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index()
    {
        $comment = Comment::orderby('id', 'desc')->get();
        return view('user.comment.index')->with('comments', $comment);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);

        $comment->delete();

        Session::flash('message', 'The comment was just trashed.');

        return redirect()->back();
    }

    public function multipleDelete(Request $request)
    {
        $id = $request->id;

        foreach ($id as $comment)
        {
            Comment::where('id', $comment)->delete();
        }
        Session::flash('message', 'Successfully deleted some comments.');

        return redirect()->back();
    }

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
        Session::flash('message', 'You have succesfully commented on this post.');

        return redirect()->back();
        // dd($comment);
        // $comment->save();

        return back();
    }
    public function replyStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'comment' => 'required',
            'email' => 'required'
        ]);
        $reply = new Comment();

        $reply->comment = $request->comment;
        $reply->name = $request->name;
        $reply->email = $request->email;

        $reply->parent_id = $request->get('comment_id');

        $post = Post::find($request->get('id'));

        $post->comments()->save($reply);
        Session::flash('message', 'You have succesfully replied a comment.');

        return redirect()->back();

    }
}
