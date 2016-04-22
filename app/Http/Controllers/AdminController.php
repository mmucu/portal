<?php

namespace churchapp\Http\Controllers;

use Illuminate\Http\Request;

use churchapp\Http\Requests;
use churchapp\Http\Controllers\Controller;
use Auth;
use churchapp\Post;
use Artisan;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth'); //check if user is authentic
    }

    public function index()
    {
        $profile = Auth::user()->profile;
        $userPosts = Post::where('postable_id','=',''.Auth::user()->id.'')->orderBy('created_at','DESC')->get();
        return view('admin.index')->withProfile($profile)->with('userPosts',$userPosts);
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
        //
    }

    public function maintainDown()
    {

    }

    public function maintainUp()
    {

    }

    public function deleteUser()
    {

    }
     public function artisan( $command)
    {
        Artisan::call($command);
    }
}
