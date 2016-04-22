<?php

namespace churchapp\Http\Controllers;

use Illuminate\Http\Request;
use churchapp\Category;
use churchapp\Article;
use churchapp\Update;
use churchapp\Http\Requests;
use churchapp\Http\Requests\ArticleFormRequest;
use churchapp\Http\Controllers\Controller;
use Auth;
class ArticleController extends Controller
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
        $categories = Category::orderBy('name','desc')->paginate(10);
        $articles = Article::orderBy('created_at','desc')->paginate(10);
        return view('articles.index')->withCategories($categories)->withArticles($articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::lists('name','id');
        return view('articles.create')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArticleFormRequest $request)
    {
        $article = new Article(array('title' => $request->get('title'),
            'body' => $request->get('body'),
            'created_by' => $request->get('creator_id')));
        $article->save();
        $update = new Update(['creator_id' => Auth::user()->id ]);
        $article->updates()->save($update);
        if(count($request->get('categories')) > 0){
            $article->categories()->attach($request->get('categories'));
        }

        return \Redirect::route('article.show', $article)->with('message','Thank you for creating an article');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show')->withArticle($article);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::lists('name','id');
        $article = Article::findOrFail($id);
        if(Auth::user()->id !== $article->getCreator()->id){
            return view('articles.show')->withArticle($article)->with('message','access denied, owners only');
        }
        return view('articles.edit')->withArticle($article)->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleFormRequest $request, $id)
    {
        $article = Article::findOrFail($id);

        if($article->getCreator()->id === Auth::user()->id ){
            $article->update(array('title' => $request->get('title'),
                'body' => $request->get('body'),
            ));
            if(count($request->get('categories')) > 0){
                $article->categories()->sync($request->get('categories'));
            }

            return \Redirect::route('article.show', array('id' => $article->id))->with('message', 'You have updated the article');
        }
        else{
            return \Redirect::route('article.show', array('id' => $article->id))->with('message', 'You cannot update the article');
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
        //
    }
}
