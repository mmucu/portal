@extends('layouts.master')

@section('header')

    @parent
    <style>
        .content{
        }
        .left-side{
            border-right: outset;
            border-color: #0077aa;
        }
        .article{
            border-color: #2e6da4;
            border-width: medium;
            border-style: outset;
            border-radius: 2.5%;
            padding: 2%;
            margin: 2%;
        }
        h4{
        }



    </style>

@endsection

@section('title')
    @include('partials.navigation_auth')
    <h3 style="text-align: center">ARTICLES</h3>
@endsection

@section('left-side')
    <div class="left-side">
        <h4>CATEGORIES</h4>
        @foreach($categories as $category)
            <h4><a href="{{ URL::route('category.show', ['category' => $category->id]) }}"> {{ $category->name }}</a></h4>
        @endforeach
    </div>
@endsection

@section('content')
    <div class="content">
        <p><a href="{{ URL::route('article.create') }}">Do you want to create a new article?</a></p>
        <hr>
        @foreach($articles as $article)
            <div class="article">
                <h4>{{ $article->title }}</h4>
                <div class="article-body">
                    {{  str_limit($article->body,500,'...') }}<a href="{{ URL::route('article.show',array('id' => $article->id)) }}">view article</a>
                </div>
                <hr>
                <p>by <a href="{{ URL::route('profile.show', [$article->getCreator()->profile->id]) }}">{{ $article->getCreator()->firstname }}</a> on {{ $article->created_at }} </p>
            </div>
        @endforeach

        {!! $articles->render() !!}
    </div>

@endsection