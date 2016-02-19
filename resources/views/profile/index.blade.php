@extends('layouts.master')

@section('title')
    @include('partials.navigation_home')
    @endsection

@section('left-side')
    {!! HTML::image('images/'.$profile->image_name,null, array('width' => '100%','height' => '100%')) !!}

    <h4>Date Joined: {{ Auth::user()->created_at }}</h4>

    <h4>Last updated at: {{ Auth::user()->updated_at }}</h4>

    @if( Auth::user()->groups != null)
    <h4>Groups</h4>
    @foreach(Auth::user()->groups as $group)
        <p>{{ $group->name }}</p>
    @endforeach
    @else
        <h4>You have not joined any group</h4>
        @endif

    @if( Auth::user()->following != null)
        <h3>Following</h3>
        @foreach(Auth::user()->following as $follow)
            <p>{{ $follow->name }}</p>
        @endforeach
    @else
        <h4>You are not following anyone</h4>
    @endif

    @endsection

@section('content')
    <h3>WELCOME <a href="{{ URL::route('profile.show',array('id' => Auth::user()->slug)) }}">{{ Auth::user()->firstname }}</a></h3>
    <h5><a href= "{{ URL::route('profile.edit') }}">EDIT YOUR PROFILE</a></h5>

    <h5>Do you want to create a post</h5>

    {!! Form::open( array( 'route' => 'post.store', 'class' => 'form', 'files' => true)) !!}

    <div class="form-group">
        {!! Form::label('Title') !!}
        {!! Form::text('title', null,
        array('required', 'class' => 'form-control',
        'placeholder' => 'Hello brothers and sisters')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Body') !!}
        {!! Form::textarea('body', null,
        array('required', 'class' => 'form-control',
        'placeholder' => 'It is another joyful day in the Lord')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Insert Image') !!}
        {!! Form::file('image', null) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('create Post', array('class' => 'btn btn-primary')) !!}
    </div>

    {!! Form::close() !!}

    <h3>YOUR PREVIOUS POSTS</h3>

    @foreach($userPosts as $post)
        <hr>
        <h5>{{ $post->title }}</h5>
        <p>{{ $post->body }}</p>
        @if($post->image)
            {!! HTML::image('images/'.$post->image,null, array('width' => '25%','height' => '25%')) !!}
            @endif
        <p><a href="{{ URL::route('post.edit',array('id' => $post->id)) }}">edit</a></p>
        <p class="date"> {{ $post->updated_at }}</p>
        @endforeach
    @endsection