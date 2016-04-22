@extends('layouts.master')

@section('title')
    @include('partials.navigation_auth')
@endsection

@section('content')

<div class="show-post">

    <h4>{{ $post->title }}</h4>

    @if($post->image)
        {!! HTML::image('images/'.$post->image,null, array('width' => '100%','height' => '100%')) !!}
    @endif
    <hr>

    <h5 style="color: #0044cc">{{ $post->body }}</h5>
    <h5 style="float: right">{{ $post->created_at->diffForHumans() }} by <a href="{{ URL::route('profile.show',array('id' => $post->getUser()->profile->slug)) }}">{{ $post->getUser()->firstname }}</a></h5>
    <hr>
    @if(count($post->comments) > 0)
        <h5 style="color: indianred">comments</h5>
        <hr>
        @foreach($post->comments as $comment)
            <div class="comment">
                @if($comment->getUser()->exists())
                    <p><a href="{{ URL::route('profile.show', array('id' => $comment->getUser()->profile->slug )) }}">{{ $comment->getUser()->firstname }}</a> : {{ $comment->body }}</p>
                @else
                    <p>Anonymous : {{ $comment->body }}</p>
                @endif
                <p class="time">{{ $comment->updated_at->diffForHumans() }}</p>
            </div>
            <hr>
        @endforeach
    @endif

    @if($post->getUser() === Auth::user()->id)
        <h5><a href= "{{ URL::route('post.edit', [$post->id]) }}">DO YOU WANT TO EDIT IT</a></h5>
    @endif

</div>

@endsection