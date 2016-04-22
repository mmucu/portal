<?php

namespace churchapp\Http\Controllers;
use churchapp\imaging\ImageProcessorContract;

use churchapp\Profile;
use churchapp\Post;
use churchapp\Image;
use churchapp\YearOfStudy as Year;
use churchapp\YearOfStudy;
use Illuminate\Http\Request;
use churchapp\Faculty;
use App;
use Input;
use Validator;

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

    protected $imageProcessor;

    public function __construct(ImageProcessorContract $contract)
    {
        $this->imageProcessor = $contract;
        $this->middleware('auth'); //check if user is authentic
    }

    public function index()
    {
        if(Auth::user()->profile()->exists()){
            $profile = Auth::user()->profile;
            $userImages = Image::where('imageable_id','=',''.Auth::user()->id.'')->orderBy('created_at','DESC')->take(10)->get();
            $userPosts = Post::where('postable_id','=',''.Auth::user()->id.'')->orderBy('created_at','DESC')->take(10)->get();
            return view('profile.index')->with('profile',$profile)->with('userPosts',$userPosts)->with("userImages", $userImages);
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
            $years = Year::lists('year','id');
            $faculties = Faculty::all();
            return view('profile.create')->with('faculties',$faculties)->withYears($years);
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
            $prof_pic_name = ProfileController::updateProfilePicture($request);
            $image = Image::where(['image_name' => $prof_pic_name])->first();
        }
        $profile = new Profile(array('reg_no' => $request->get('reg_no'),
            'course' => $request->get('course'),
            'about' => $request->get('about'),
            'alias' => $request->get('alias'),
            'hobbies' => $request->get('hobbies'),
            'image_name' => $prof_pic_name,
            'favorite_verse' => $request->get('favorite_verse'),
            'mobile_number' => $request->get('mobile_number')
        ));
        $user = Auth::user(); // get the current user
        $user->profile()->save($profile);

        $year_of_study = YearOfStudy::find($request->get('year'));
        $year_of_study->members()->save($profile);

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
         if($profile){
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
        $years = Year::lists('year','id');
        $faculties = Faculty::all();
        return view('profile.edit')->with('profile', $profile)->with('years', $years)->with('faculties', $faculties);
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
        $profile = Auth::user()->profile;

        if($request->file('image') !== null){
            $prof_pic_name = ProfileController::updateProfilePicture($request);
        }
        elseif($profile->image_name){
            $prof_pic_name = Auth::user()->profile->image_name;
            $image = Image::where(['image_name' => $prof_pic_name])->first();
            $profile->images()->save($image);

        }

        $profile->update(array('reg_no' => $request->get('reg_no'),
            'course' => $request->get('course'),
            'year' => $request->get('year'),
            'about' => $request->get('about'),
            'alias' => $request->get('alias'),
            'hobbies' => $request->get('hobbies'),
            'image_name' => $prof_pic_name,
            'favorite_verse' => $request->get('favorite_verse'),
            'mobile_number' => $request->get('mobile_number')
        ));

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

    /*
    public function createProfilePicture(ProfileFormRequest $request){
        $prof_pic = $request->file('image');
        $extension = $prof_pic->getClientOriginalExtension();
        $prof_pic_name = rand('111111','999999').'.'.$extension;
        $prof_pic->move('images',$prof_pic_name);
        return $prof_pic_name;

    }

    */

    public function updateProfilePicture(ProfileFormRequest $request){
        $return_value = ProfileController::uploadAndStore($request, $this->imageProcessor );
        return $return_value;
    }

    public function uploadAndStore(Request $request, ImageProcessorContract $contract){
        $file = array('image' => Input::file('image'));
        $rules = array('image' => 'required|image',);

        $messages = ['image' => 'the file selected is not a valid image format'];

        $validator = Validator::make($file,$rules, $messages);

        if($validator->fails()){
            return \Redirect::to('upload')->withInput()->withErrors($validator);
        }


        $this->validate($request, ['image' => 'image']);
        $return_value = $contract->uploadAndStore($request);
        if($return_value['name'])
        {
            return $return_value['name'];
        }
        elseif($return_value['error'])
        {
            return back()->with('error',$return_value['error']);
        }
        else
        {
            return back()->with('error',"something awefull happened, try again");
        }


    }




}


//id rather take the Auth::user->profile() approach