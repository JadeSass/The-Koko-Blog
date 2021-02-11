<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use App\Advert;
use App\User;
use Image;
use App\Profile;
use App\Post;

use Illuminate\Http\Request;

class AdvertsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $adverts = Advert::orderBy('created_at', 'desc')->get();
        return view('user.adverts.index')->with('adverts', $adverts);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::all();

        if($posts->count() == 0)
        {
            Session::flash('message', 'You must have some posts before attempting to create an advert.');

            return redirect()->back();
        }

        return view('user.adverts.create');
    }
    public function advertStop(Request $request)
    {
        $id = $request->id;

        foreach ($id as $adverts)
        {
            Advert::where('id', $adverts)->delete();
        }
        Session::flash('message', 'Successfully deleted some adverts.');

        return redirect()->back();
    }

    public function store(Request $request)
    {

        $user = Auth::user();

        $this->validate($request, [
            'name' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
            'link' => 'required',
            'ads_type' => 'required',
            'ends_at' => 'required',
            'description' => 'required'
        ]);

        $image = $request->image;

        $image_new_name = "kokoblogads". str_random(5) .time() . $image->getClientOriginalName();

        $img = Image::make($image->path());

        $img->save('uploads/ads/' . $image_new_name);


        // $image->move('uploads/posts', $image_new_name);

        $advert = Advert::create([
            'name' => $request->name,
            'link' => $request->link,
            'image' => 'uploads/ads/' . $image_new_name,
            'ads_type' => $request->ads_type,
            'ends_at' => $request->ends_at,
            'description' => $request->description,
            'user_id' => $user->id
        ]);

        Session::flash('message', 'Advert created succesfully.');

        return redirect()->back();
    }

    public function trashed() {
        $adverts = Advert::onlyTrashed()->get();

        return view('user.adverts.trash')->with('adverts', $adverts);
    }

    public function advertTrash(Request $request)
    {
        $id = $request->id;

        foreach ($id as $adverts)
        {
            Advert::where('id', $adverts)->forceDelete();
        }
        Session::flash('message', 'Permanently deleted some adverts.');

        return redirect()->back();
    }

    public function restore($id)
    {
        $advert = Advert::withTrashed()->where('id', $id)->first();

        $advert->restore();

        Session::flash('message', 'Advert restored successfully.');

        return redirect()->back();
    }
}
