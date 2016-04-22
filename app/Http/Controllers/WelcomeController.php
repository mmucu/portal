<?php

namespace churchapp\Http\Controllers;

use Illuminate\Http\Request;

use churchapp\Http\Requests;
use churchapp\Http\Controllers\Controller;
use churchapp\Post;
use churchapp\Article;
use churchapp\Event;
use churchapp\Update;

class WelcomeController extends Controller
{
    function index1()
    {
        $groups = \churchapp\Group::all();
        $users = \churchapp\User::select('id','firstname','lastname')->get();
        //$inspire = \churchapp\inspirations\inspiring::quote();
        $posts = Post::orderBy('created_at','DESC')->paginate(10);
        $articles = Article::orderBy('created_at','DESC')->paginate(10);
        $events = Event::all();
        return view('home.index')->with('groups',$groups)->with('posts',$posts)->withArticles($articles)->withUsers($users)->withEvents($events);
    }

    function index()
    {
        $updates = Update::orderBy('created_at','DESC')->paginate(10);
        return view('home.update')->with('updates', $updates);
    }

    function test()
    {
        return view('test.test')->with('message', "for testing only");
    }
    function test2()
    {
        return view('test.test2')->with('message', "for testing only");
    }


}
