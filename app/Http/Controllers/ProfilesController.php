<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('user.author.profile')->with('user', Auth::user());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email',
            'facebook' => 'required|url',
            'number' => 'required'

        ]);

        $user = Auth::user();

        if($request->hasFile('avatar'))
        {
            $avatar = $request->avatar;

            $avatar_new_name = time() . $avatar->getClientOriginalName();

            $avatar->move('uploads/avatar', $avatar_new_name);

            $user->profile->avatar = 'uploads/avatar/' . $avatar_new_name ;

            $user->profile->save();
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile->facebook = $request->facebook;
        $user->profile->number = $request->number;

        $user->save();
        $user->profile->save();

        if($request->has('password'))
        {
            $user->password = bcrypt($request->password);

            $user->save();
        }

        Session::flash('message', 'Account profile updated.');

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
        //
    }
}


/**
 *
 * @author Oladuti Pelumi Ezekiel
 *
 * @description Laravel Crud System and a Content Management System...
 *
 *
 */
