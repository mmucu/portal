<?php
/**
 * Created by PhpStorm.
 * User: MMUST CU
 * Date: 4/11/2016
 * Time: 1:02 AM
 */

namespace churchapp\imaging;

use Carbon\Carbon;
use File;
use Illuminate\Http\Request;
use Storage;
use churchapp\Image;
use churchapp\Update;
use churchapp\Profile;
use Whoops\Exception\ErrorException;
use Input;
use Auth;

class ImageMaker implements ImageProcessorContract
{

    public function checkIfProfileHasImage(){
        $profiles = Profile::all();
        $no_image_profiles = [];
        foreach($profiles as $profile){
            $image = $profile->image_name;
            if(Storage::exists('/images/'.$image)){

            }
            else{
                array_push($no_image_profiles, $profile->getUser()->firstname." ".$profile->getUser()->lastname);
            }
        }
        dd(Carbon::now()->format('Ymdhis'));
        dd($no_image_profiles);
    }

    public function listImageFiles(){
        $files = Storage::allFiles('/images/');
        $outfiles = [];

        foreach($files as $file){
            $name = explode("/", $file);
            if(File::mimeType($file) === null)
            {
                Storage::delete('images/'.$file);
            }else{

                try{
                    if( Profile::where('image_name', '=', $name[1])->exists())
                    {
                        $profile = Profile::where('image_name', '=', $name[1])->first();
                        $fullname = $profile->getUser()->firstname." ".$profile->getUser()->lastname;
                        $statement = "Image ".$name[1]." belongs to ".$fullname;
                        array_push($outfiles, $statement);

                    }

                }catch(ErrorException $e){
                    dd("fatal");
                }

            }

        }
        $state = (string)count($outfiles)."images and ".(string)count(Profile::all())."profiles";
        array_push($outfiles, $state);
        return $outfiles;
    }

    public function uploadAndStore(Request $request){

        $return_value = [];

        try {

            Input::hasFile('image');
            $new_name = 'mmucu_'.date('Ymdhis').".".$request->file('image')->getClientOriginalExtension();
            $counter = 0;
            while (File::exists(public_path().'/images/'.$new_name)) {
                $new_name = 'mmucu_'.date('Ymdhis')."_".$counter.".". $request->file('image')->getClientOriginalExtension();
                $counter ++;
            }
            $image = Image::create(['image_name' => $new_name, "description" => Input::get('description')]);
            $user = Auth::user();
            $user->images()->save($image);

            $request->file('image')->move('images', $new_name);

            if($request->is('upload/*'))
            {
                dd("yes yes");
                
            }
            $return_value['name'] =  $new_name;
        }
        catch(\Exception $e){
            $return_value['error'] = $e->getMessage();
        }
        finally{
            return $return_value;
        }
    }

    public function multipleUploadAndStore($file){

        $return_value = [];

        try {

            Input::hasFile('image');
            $new_name = 'mmucu_'.date('Ymdhis').".".$file->getClientOriginalExtension();
            $counter = 0;
            while (File::exists(public_path().'/images/'.$new_name)) {
                $new_name = 'mmucu_'.date('Ymdhis')."_".$counter.".". $file->getClientOriginalExtension();
                $counter ++;
            }
            $image = Image::create(['image_name' => $new_name, "description" => Input::get('description')]);
            $user = Auth::user();
            $user->images()->save($image);

            $file->move('images', $new_name);

            $return_value['name'] =  $new_name;
        }
        catch(\Exception $e){
            $return_value['error'] = $e->getMessage();
        }
        finally{
            return $return_value;
        }
    }

}