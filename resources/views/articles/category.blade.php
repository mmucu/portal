@extends('layouts.master')

@section('title')
    @include('partials.navigation_auth')
@endsection

@section('content')

    <h3> {{ $category->name }}</h3>
    <hr>

    @if(count($category->articles) > 0)
        @foreach($category->articles as $article)
                <h4>{{ $article->title }}</h4>
                <p>{!! $article->body !!}</p>
                <p>CREATED AT {{ $article->created_at }} by
                    <a href="{{ URL::route('profile.show',array('id' => $article->getCreator()->profile->id)) }}"> {{ $article->getCreator()->firstname }}</a>
                    </p>
                @if($article->getCreator()->id === Auth::user()->id)
                    <h5><a href= "{{ URL::route('article.edit', [$article->id]) }}">DO YOU WANT TO EDIT IT</a></h5>
                @endif

                <hr>
        @endforeach
     @else
        <h4>ITS LONELY OUT HERE, CREATE SOMETHING NEW</h4>
        @endif
    <p><a class="btn btn-primary" href="{{ URL::route('article.create') }}">Do you want to create a new article?</a></p>

@endsection