<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\User;
use App\Profile;

class AuthorsController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.author.index')->with('users', $users);
    }

    public function multipleDelete(Request $request)
    {
        $id = $request->id;

        foreach ($id as $user)
        {
            User::where('id', $user)->delete();
        }
        Session::flash('message', 'Successfully deleted some users.');

        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt('kokobloguser123'),
            'session_id' => str_random(20)
        ]);

        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatar/default-avatar.jpg'
        ]);

        Session::flash('message', 'User added successfully.');

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->profile->delete();

        $user->delete();

        Session::flash('message', 'User deleted.');

        return redirect()->back();
    }

    public function admin($id) {

        $user = User::find($id);

        $user->admin = 1;
        $user->save();

        Session::flash('message', 'Successfully changed user permissions.');

        return redirect()->back();
    }

    public function not_admin($id) {

        $user = User::find($id);

        $user->admin = 0;
        $user->save();

        Session::flash('message', 'Successfully changed user permissions.');

        return redirect()->back();

    }
}
