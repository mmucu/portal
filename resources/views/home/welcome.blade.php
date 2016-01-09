@extends('layouts.master')

@section('header')
    @parent

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: left;
                display: table-cell;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 48px;
                color: #35DAFA;
            }
            .navbar {
                background-color: transparent;
                background: transparent;
                border-color: transparent;
            }

            .navbar li { color: #000000
            }
            .post{
                border-color: #2e6da4;
                border-width: medium;
                border-style: outset;
                border-radius: 2.5%;
                padding: 2%;
                margin: 2%;
            }
            .comment{
                border-color: #35DAFA;
                border-width: medium;
                border-style: outset;
                border-radius: 1.25%;
                padding: 0.5%;
                margin: 0.5%;
            }
            h2, h4{
                color: #35DAFA;
            }
            .left-side{
                border-style: solid;
                border-left-style: none ;
                border-radius: 2.5%;
                padding: 2%;
                margin: 2%;
                border-color: #2e6da4 ;
            }

            .time{
                float: right;
                font-size: x-small;
            }

            .post-title{
                color: #449d44;
            }
            .header{
                color: #35DAFA;
            }


        </style>
@endsection

@section("title")
    @include('partials.navigation_home')
    @endsection

@section('left-side')
    <div class="left-side">
    <a href="{{ url('groups') }}"> <h2>Groups</h2> </a>
    @if($groups->count() > 0)
        <ul>
            @foreach($groups as $group)
                <li> {{ $group->name }}</li>
            @endforeach
        </ul>
    @else
        <h3> No groups found !!</h3>
    @endif
    </div>

    <div class="left-side">
        <a href="{{ url('article') }}"> <h2>Articles</h2> </a>
        @if($articles->count() > 0)
            <ul>
                @foreach($articles as $article)
                    <li><a href="{{ URL::route('article.show', array('id' => $article->id)) }}">{{ $article->title }}</a> </li>
                @endforeach
                    <a href="{{ url('article') }}"> <h5>More Articles</h5> </a>
            </ul>
        @else
            <h3> No articles present !!</h3>
        @endif
    </div>

    @endsection



@section('content')

    @if(Auth::check())
        <h2>Hello <a href="{{URL::route('profile.index')}}"> {{ Auth::user()->firstname }}</a></h2>
        @endif
                <div class="title">THE MMUCU CHURCH</div>
    <hr>
                <h3>{{ $inspire }}</h3>
    <h3 class="header"><b>POSTS BY OTHERS</b></h3>
    @foreach($posts as $post)
        <div class="post">
            <h5 class="post-user"><a href="{{ URL::route('profile.show',array('id' => $post->getUser()->profile->slug)) }}">{{ $post->getUser()->firstname }} {{ $post->getUser()->lastname }}</a> said:</h5>
            <h5 class="post-title">{{  $post->title }}</h5>
            <p class="post-body">{{  str_limit($post->body,200,'...') }}<a href="{{ URL::route('post.show',array('id' => $post->id)) }}">view post</a> </p>
            <p class="time"> on {{ $post->updated_at }}</p>

            @if(Auth::check())
                {!! Form::open( array( 'route' => 'comment.store', 'class' => 'form post-form')) !!}

                    <div class="form-group">
                        {!! Form::label(' Comment ') !!}
                        {!! Form::text('body', null,
                        array( 'class' => 'form-control',
                        'placeholder' => 'Write a comment')) !!}
                    </div>

                    <div class="form-group">
                        <input type="hidden" value="{{ $post->id }}" name="post_id">
                        <input type="hidden" value="{{ Auth::user()->id }}" name="creator_id">
                    </div>

                    <div class="form-group">
                        {!! Form::submit('comment', array('class' => 'btn btn-primary')) !!}
                    </div>

                {!! Form::close() !!}
            @else
                <p>You need to login to comment</p>
            @endif

            <p>comments</p>

            @if(count($post->comments) > 3)
                @for($i = 0; $i<3; $i++)
                    {{-- */$comment = $post->comments[$i]/* --}}

                    <div class="comment">
                        @if($comment->getUser()->exists())
                            <p><a href="{{ URL::route('profile.show', array('id' => $comment->getUser()->profile->slug )) }}">{{ $comment->getUser()->firstname }}</a> : {{ $comment->body }}</p>
                        @else
                            <p>Anonymous : {{ $comment->body }}</p>
                        @endif
                        <p class="time">{{ $comment->updated_at }}</p>
                    </div>
                        @endfor
                    <p><a href="{{ URL::route('post.show',array('id' => $post->id)) }}">view more comments</a> </p>
            @elseif(count($post->comments) > 0)
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
        </div>
            @endforeach
            {!! $posts->render() !!}
        @endsection