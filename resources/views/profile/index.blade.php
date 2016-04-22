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
    <h4>Ministries</h4>
    @foreach(Auth::user()->groups as $group)
        <p>{{ $group->name }}</p>
    @endforeach
    @else
        <h4>You have not joined any ministry</h4>
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
    <div class="clearfix"></div>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
            <li data-target="#myCarousel" data-slide-to="3"></li>
            <li data-target="#myCarousel" data-slide-to="4"></li>
            <li data-target="#myCarousel" data-slide-to="5"></li>
            <li data-target="#myCarousel" data-slide-to="6"></li>
            <li data-target="#myCarousel" data-slide-to="7"></li>
            <li data-target="#myCarousel" data-slide-to="8"></li>
            <li data-target="#myCarousel" data-slide-to="9"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

            @foreach($userImages as $image)
                <div class="item">
                    {!! HTML::image('images/'.$image->image_name,null, array('width' => '100%','height' => '100%')) !!}
                </div>
                @endforeach

        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="clearfix"></div>
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
        array('class' => 'form-control',
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

    <h3>YOUR PREVIOUS POSTS</h3>

    @foreach($userPosts as $post)
        <hr>
        <h5>{{ $post->title }}</h5>
        <p>{{ $post->body }}</p>
        @if($post->image)
            {!! HTML::image('images/'.$post->image,null, array('width' => '25%','height' => '25%')) !!}
            @endif
        <p><a href="{{ URL::route('post.edit',array('id' => $post->id)) }}">edit</a></p>
        <p class="date"> {{ $post->updated_at->diffForHumans() }}</p>
        @endforeach
    @endsection

@section('right-side')
    @foreach($userImages as $image)
        {!! HTML::image('images/'.$image->image_name,null, array('width' => '25%','height' => '25%')) !!}
    @endforeach
@endsection