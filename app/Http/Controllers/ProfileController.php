<?php

namespace churchapp\Http\Controllers;

use churchapp\Profile;
use churchapp\Post;
use churchapp\Image;
use Illuminate\Http\Request;

use churchapp\Http\Requests;
use churchapp\Http\Requests\ProfileFormRequest;
use churchapp\Http\Controllers\Controller;
use Auth;

class ProfileController extends Controller
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
        if(Auth::user()->profile()->exists()){
            $profile = Auth::user()->profile;
            $userPosts = Post::where('postable_id','=',''.Auth::user()->id.'')->get();
            return view('profile.index')->with('profile',$profile)->with('userPosts',$userPosts);
        }
        else{
            return \Redirect::route('profile.create')->with('message', 'You have not yet created your profile');
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->profile()->exists()){
            return \Redirect::route('profile.index')->with('message', 'You have already created your profile');
        }
        else{
            return view('profile.create');
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProfileFormRequest $request)
    {
        $prof_pic_name = null;
        if($request->file('image') !== null){
            $prof_pic_name = ProfileController::createProfilePicture($request);
        }
        $profile = new Profile(array('reg_no' => $request->get('reg_no'),
            'course' => $request->get('course'),
            'year' => $request->get('year'),
            'about' => $request->get('about'),
            'alias' => $request->get('alias'),
            'hobbies' => $request->get('hobbies'),
            'image_name' => $prof_pic_name
        ));
        $user = Auth::user(); // get the current user
        $user->profile()->save($profile);
        $image = new Image(array('image' => $prof_pic_name));
        $profile->images()->save($image);

        return \Redirect::route('profile.index')->with('message','Your profile has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::findBySlugOrId($id);
        $user = $profile->getUser();
         if($profile->exists()){
             return view('profile.show')->with('profile', $profile)->with('user',$user);
         }// check if this method works, if yes replace the rest
        else{
            return \Redirect::next()->with('message', 'The user is not known');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $profile = Auth::user()->profile;
        return view('profile.edit')->with('profile', $profile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProfileFormRequest $request)
    {
        $prof_pic_name = null;
        if($request->file('image') !== null){
            $prof_pic_name = ProfileController::updateProfilePicture($request);
        }

        $profile = Auth::user()->profile;
        $profile->update(array('reg_no' => $request->get('reg_no'),
            'course' => $request->get('course'),
            'year' => $request->get('year'),
            'about' => $request->get('about'),
            'alias' => $request->get('alias'),
            'hobbies' => $request->get('hobbies'),
            'image_name' => $prof_pic_name
        ));

        $image = new Image(array('image' => $prof_pic_name));
        $profile->images()->save($image);

        return \Redirect::route('profile.index', array($profile->id))->with('message', 'the profile has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $profile = Auth::user()->profile();
        $profile->delete();
    }

    public function createProfilePicture(ProfileFormRequest $request){
        $prof_pic = $request->file('image');
        $extension = $prof_pic->getClientOriginalExtension();
        $prof_pic_name = rand('111111','999999').'.'.$extension;
        $prof_pic->move('images',$prof_pic_name);
        return $prof_pic_name;

    }

    public function updateProfilePicture(ProfileFormRequest $request){
        $prof_pic = $request->file('image');
        $extension = $prof_pic->getClientOriginalExtension();
        $prof_pic_name = rand('111111','999999').'.'.$extension;
        $prof_pic->move('images',$prof_pic_name);
        return $prof_pic_name;
    }
}


//id rather take the Auth::user->profile() approach