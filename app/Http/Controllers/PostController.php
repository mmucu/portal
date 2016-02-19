<?php

namespace churchapp\Http\Controllers;

use Illuminate\Http\Request;

use churchapp\Http\Requests;
use churchapp\Http\Controllers\Controller;
use churchapp\Http\Controllers\ProfileController;
use churchapp\Http\Requests\ProfileFormRequest;
use churchapp\Post;
use Auth;

class PostController extends Controller
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
    public function store(ProfileFormRequest $request)
    {
        $withImage = false;
        if ($request->file('image') !== null)
        {
            $image_name = app('churchapp\Http\Controllers\ProfileController')->createProfilePicture($request);
            $withImage = true;
        }

        if($withImage){
            $post = new Post(array('title' => $request->get('title'),
                'body' => $request->get('body'),
                'image' => $image_name
            ));
        }
        else{
            $post = new Post(array('title' => $request->get('title'),
                'body' => $request->get('body')
            ));
        }

        $user = Auth::user();
        $user->posts()->save($post);

        return back()->with('message','new post has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show')->with('post',$post);
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
        return view('posts.edit')->with('post',$post);
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
        $post = Post::findOrFail($id);

        if($post->getUser()->id === Auth::user()->id ){
            $post->update(array('title' => $request->get('title'),
                'body' => $request->get('body'),
            ));

            return \Redirect::route('post.show', array('id' => $post->id))->with('message', 'You have updated the post');
        }
        else{
            return \Redirect::route('post.show', array('id' => $post->id))->with('message', 'You cannot update the post');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
