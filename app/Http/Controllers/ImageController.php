<?php

namespace churchapp\Http\Controllers;

use Illuminate\Http\Request;

use churchapp\Http\Requests;
use churchapp\Http\Controllers\Controller;
use Input;
use Redirect;
use Validator;
use Session;
use churchapp\Image;

class ImageController extends Controller
{
    public function getUpload()
    {
        return view('images.upload');
    }

    public function postUpload(Request $request)
    {
        $file = array('image' => Input::file('image'));
        $rules = array('image' => 'required',);

        $validator = Validator::make($file,$rules);

        if($validator->fails()){
            return Redirect::to('upload')->withInput()->withErrors($validator);
        }
        else {
            if(Input::file('image')->isValid()) {
                $image = new Image(array('image' => $request->get('image')));
                $image->store();
                $user = Auth::user();
                $user->profile->images()->save($image);
                Session::flash('success', 'Image Uploaded');
                return Redirect::to('upload');
            }
        }

    }
}
