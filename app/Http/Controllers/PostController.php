<?php

namespace churchapp\Http\Controllers;

use Illuminate\Http\Request;
use churchapp\imaging\ImageProcessorContract;
use Input;
use Validator;
use Redirect;

use churchapp\Http\Requests;
use churchapp\Http\Controllers\Controller;
use churchapp\Http\Controllers\ProfileController;
use churchapp\Http\Requests\ProfileFormRequest;
use churchapp\Post;
use churchapp\Update;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(ImageProcessorContract $contract)
    {
        $this->imageProcessor = $contract;
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
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileFormRequest $request)
    {
        if(Auth::user()->profile)
        {
            $withImage = false;
            if ($request->file('image') !== null)
            {
                //$image_name = app('churchapp\Http\Controllers\ProfileController')->updateProfilePicture($request);

                $return_value = PostController::uploadAndStore($request, $this->imageProcessor);
                if($return_value['error'])
                {
                    return back()->with('errors', $return_value['error'])->with('message', 'post not updated');
                }
                $image_name = $return_value['image'];
                if(!$image_name)
                {
                    return back()->with('errors', "something went wrong, try again");
                }
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

            $update = new Update(['creator_id' => Auth::user()->id ]);
            $post->updates()->save($update);

            return back()->with('message','thank you for sharing with us, be blessed');
        }
        else
        {
            $withImage = false;
            if ($request->file('image') !== null)
            {
                //$image_name = app('churchapp\Http\Controllers\Image')->updateProfilePicture($request);
                $image_name = PostController::uploadAndStore($request, $this->imageProcessor);
                $withImage = true;
                dd($image_name);
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

            $update = new Update(['creator_id' => Auth::user()->id ]);
            dd($update);
            $post->updates()->save($update);

            return back()->with('message','thanks for sharing with us, be blessed, please remember to create you profile');
        }
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

    public function uploadAndStore(Request $request, ImageProcessorContract $contract){
        $file = array('image' => Input::file('image'));
        $rules = array('image' => 'required|image',);

        $messages = ['image' => 'the file selected is not a valid image format'];

        $validator = Validator::make($file,$rules, $messages);

        if($validator->fails()){
            $return_value['error'] = $validator->errors()->first();
            return $return_value;
        }

        $return_value = $contract->uploadAndStore($request);
        return $return_value;


    }
}
