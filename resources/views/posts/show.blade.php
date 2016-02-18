@extends('layouts.master')

@section('title')
    @include('partials.navigation_auth')
@endsection

@section('content')

    <h4> SHOWING POST'S DETAILS</h4>
    <h4>CREATED BY : <a href="{{ URL::route('profile.show',array('id' => $post->getUser()->profile->slug)) }}">{{ $post->getUser()->firstname }}</a> </h4>

    <h4>TITLE : {{ $post->title }}</h4>

    <p>BODY : {{ $post->body }}</p>

    <h55>CREATED AT {{ $post->created_at }}</h55>
    <h4>COMMENTS</h4>
    @if(count($post->comments) > 0)
        @foreach($post->comments as $comment)
            <div class="comment">
                @if($comment->getUser()->exists())
                    <p><a href="{{ URL::route('profile.show', array('id' => $comment->getUser()->profile->slug )) }}">{{ $comment->getUser()->firstname }}</a> : {{ $comment->body }}</p>
                @else
                    <p>Anonymous : {{ $comment->body }}</p>
                @endif
                <p class="time">{{ $comment->updated_at }}</p>
            </div>
            @endforeach
        @endif

    @if($post->getUser() === Auth::user()->id)
    <h5><a href= "{{ URL::route('post.edit', [$post->id]) }}">DO YOU WANT TO EDIT IT</a></h5>
    @endif

@endsection