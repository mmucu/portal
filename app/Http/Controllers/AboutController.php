<?php

namespace churchapp\Http\Controllers;

use Illuminate\Http\Request;

use churchapp\Http\Requests;
use churchapp\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use churchapp\Image;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * find the various teams and groups that form the great mmucu community
     */

    public function index()
    {
        $images = Image::take(10)->get();
        return view('about.index')->with('images', $images);
    }

    public function executive()
    {
        return view('about.executive');
    }

    public function praiseAndWorship()
    {
        return view('about.praiseAndWorship');
    }

    public function media()
    {
        return view('about.media');
    }

    public function intercession()
    {
        return view('about.intercession');
    }

    public function sundaySchool()
    {
        return view('about.sundaySchool');
    }

    public function ushers()
    {
        return view('about.ushers');
    }

    public function inspire(){
        $inspire = \churchapp\inspirations\inspiring::quote();
         return view('home.inspire')->withInspire($inspire);
    }

    public function getVerse(){
        $random_verse_array = ['Acts.8.1','Rom.10.17'];
        $random_verse = Collection::make($random_verse_array)->random();
        $token = 'VDr5yWwhSIr5vMGGe4r1Hc7omfgf4b57Gzlqgsgt';
        $url = "https://bibles.org/v2/verses/eng-GNTD:$random_verse.js";

        //set up curl
        $ch = curl_init();
        //set up url
        curl_setopt($ch,CURLOPT_URL, $url);
        //dont verify ssl certificate
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        //return contents of the reponse as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        //Follow redirects
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        //set up authentication
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, "$token:X");

        //Do the request
        $response = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($response);
        //lets do some xml parsing then
        //$xml = simplexml_load_string($response);
        //dd($xml->verses->verse->children());
        //veiw('home.inspire')->withInspire($response);
        $verse = $json->response->verses[0]->reference;
        $text = strip_tags($json->response->verses[0]->text);

        return view('home.verse')->withText($text)->withVerse($verse);

    }
}
