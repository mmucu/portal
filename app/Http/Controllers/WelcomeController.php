<?php

namespace churchapp\Http\Controllers;

use Illuminate\Http\Request;

use churchapp\Http\Requests;
use churchapp\Http\Controllers\Controller;
use churchapp\Post;
use churchapp\Article;

class WelcomeController extends Controller
{
    function index()
    {
        $groups = \churchapp\Group::all();
        $inspire = \churchapp\inspirations\inspiring::quote();
        $posts = Post::orderBy('created_at','DESC')->paginate(10);
        $articles = Article::orderBy('created_at','DESC')->paginate(10);
        return view('home.welcome')->with('inspire',$inspire)->with('groups',$groups)->with('posts',$posts)->withArticles($articles);
    }
}
