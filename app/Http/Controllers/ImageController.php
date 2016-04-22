<?php

namespace churchapp\Http\Controllers;

use Carbon\Carbon;
use churchapp\imaging\ImageProcessorContract;
use Illuminate\Http\Request;

use churchapp\Http\Requests;
use churchapp\Http\Controllers\Controller;
use Input;
use Redirect;
use Validator;
use Session;
use churchapp\Image;
use churchapp\Update;
use Auth;
use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use Orchestra\Imagine\Facade as Imagine;
use Storage;
use churchapp\Profile;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //check if user is authentic
    }

    public function index(){
        $images = Image::orderBy('created_at','DESC')->paginate(20);
        return view('images.index')->with('images', $images);
    }

    public function create(){
        return view('images.create');
    }

    public function show($id)
    {
        $image = Image::find($id);
        if($image){
            return view('images.show')->with('image',$image);
        }// check if this method works, if yes replace the rest
        else{
            return \Redirect::back()->with('error', 'error occurred');
        }
    }
/**Dead
    public function store(Request $request)
    {
        $file = array('image' => Input::file('image'));
        $rules = array('image' => 'required|image',);

        $messages = ['image' => 'the file selected is not a valid image format'];

        $validator = Validator::make($file,$rules, $messages);

        if($validator->fails()){
            return Redirect::to('image')->withInput()->withErrors($validator->errors()->all());
        }
        else {
            if(Input::file('image')->isValid()) {
                $image = new Image(array('image' => $request->get('image')));
                $image->store();
                $user = Auth::user();
                $user->profile->images()->save($image);
                Session::flash('success', 'Image Uploaded');
                return Redirect::to('image');
            }
        }

    }

**/

    public function carouselImagePack(){

    }

    public function testImaging(ImageProcessorContract $contract){
        $boom = $contract->listImageFiles();
        $tuff = $contract->checkIfProfileHasImage();
        return view('test.test')->with('boom', $boom);
    }

    public function store(Request $request, ImageProcessorContract $contract){
        $file = array('image' => Input::file('image'));
        $rules = array('image' => 'required|image',);

        $messages = ['image' => 'the file selected is not a valid image format'];

        $validator = Validator::make($file,$rules, $messages);

        if($validator->fails()){
            $return_value['error'] = $validator->errors()->first();
            return back()->with('errors',$return_value);
        }

        $return_value = $contract->uploadAndStore($request);
        if($return_value['name'])
        {
            $image = Image::where(['image_name' => $return_value])->first();
            $update = new Update(['creator_id' => Auth::user()->id ]);
            $image->updates()->save($update);
            return \Redirect::route('image.show', array($image->id))->with('message', 'image uploaded');
        }
        elseif($return_value['error'])
        {
            return back()->with('errors',$return_value);
        }
        else
        {
            return back()->with('errors',["something awefull happened, try again"]);
        }


    }

    public function getMultiple(){
        return view('images.create-multiple');
    }

    public function postMultiple(Request $request, ImageProcessorContract $contract){
        $files = Input::file('images');
        $file_count = count($files);
        $upload_count = 0;

        foreach($files as $file){
            $file1 = array('image' => $file);
            $rules = array('image' => 'required|image',);

            $messages = ['image' => 'the file selected is not a valid image format'];

            $validator = Validator::make($file1,$rules, $messages);

            if($validator->fails()){
                $return_value['error'] = $validator->errors()->first();
                return back()->with('errors',$return_value);
            }

            $return_value = $contract->multipleUploadAndStore($file);
            if($return_value['name'])
            {
                $image = Image::where(['image_name' => $return_value])->first();
                //$update = new Update(['creator_id' => Auth::user()->id ]);
                //$image->updates()->save($update);

            }
            elseif($return_value['error'])
            {
                return back()->with('errors',$return_value);
            }
            else
            {
                return back()->with('errors',["something awefull happened uploading ".$file->getClientOriginalName().", try again"]);
            }
            $upload_count ++;
        }

        return \Redirect::route('image.index')->with('message', $upload_count.'images uploaded');
    }
}
