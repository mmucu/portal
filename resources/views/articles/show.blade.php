@extends('layouts.master')

@section('title')
    @include('partials.navigation_auth')
@endsection

@section('content')

    <h1> SHOWING ARTICLE'S DETAILS</h1>

    <h3>{{ $article->title }}</h3>

    <h4>Category</h4>
    <ol>
        @foreach($article->categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ol>

    <h5>article</h5>
    {!! $article->body !!}

    <h5>CREATED AT {{ $article->created_at }}</h5>

    @if($article->getCreator()->id === Auth::user()->id)
        <h5><a href= "{{ URL::route('article.edit', [$article->id]) }}">DO YOU WANT TO EDIT IT</a></h5>
        @endif
    <h4>CREATED BY <a href="{{ URL::route('profile.show',array('id' => $article->getCreator()->profile->id)) }}"> {{ $article->getCreator()->firstname }}</a> </h4>


@endsection