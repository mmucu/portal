@extends('layouts.master')
@section('header')
    @parent

    <script language="javascript">
        var loadFile = function(event){
            var output = document.getElementById('show_image');
            output.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

@endsection

@section('title')
    @include('partials.navigation_home')
@endsection

@section('left-side')
    {!! HTML::image( Image::url('images/'.$profile->image_name,600,400,array('crop')),null, array('width' => '100%','height' => '100%')) !!}
    <h4>Joined {{ Auth::user()->created_at->diffForHumans() }}</h4>

    <h4>Last seen {{ Auth::user()->updated_at->diffForHumans() }}</h4>

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
    <div class="test-border">

    <h3>Welcome <a href="{{ URL::route('profile.show',array('id' => Auth::user()->slug)) }}">{{ ucfirst(trans(Auth::user()->firstname)) }}</a></h3>
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
        {!! HTML::image('#','image', array('id' => 'show_image')) !!}
        {!! Form::file('image',array('id' => 'input_image', 'onchange'=> 'loadFile(event)')) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('create Post', array('class' => 'btn btn-primary')) !!}
    </div>

    {!! Form::close() !!}


        <h3>this is just to test the border image thing</h3>

    </div>
@endsection