@extends('layouts.master')

@section('header')
    @parent

    <script language="javascript">

        function auto_load(){
            $.ajax({
                url: '/inspire',
                cache: false,
                success: function(data){
                    animate();
                    $("#inspire").html(data);
                    animate();
                }
            });
        }

        function animate(){
            $('#inspire').animate({
                width: 'toggle',
                height:'toggle',
                opacity: 'toggle',
                background: '#FFAF55'
            }, 'slow');
        }

        function restore(){
            $('#inspire').animate({
                width: 'toggle',
                height: 'toggle',
                opacity: '1.0'
            });
        }

        $(document).ready(function(){
            $("#carousel1").tiksluscarousel({width:640,height:480,nav:'thumbnails',current:1,type:'zoom'}); //this is for the carousel
            auto_load(); // function for the inspire
        });
        setInterval(auto_load,50000);
    </script>

    @endsection

@section('title')
    @include('partials.navigation_home')
    @endsection

@section('left-side')

    <div class="left-side-content content-1 hidden-xs">
        {!! HTML::image('images/mmucu_logo.png',null, array('width' => '100%','height' => '100%')) !!}
    </div>

    <div class="left-side-content hidden-xs">
        <a style="text-decoration: none" href="{{ URL::route('article.index') }}" ><h3>ARTICLES</h3></a>
        </div>
    <div class="left-side-content hidden-xs">
        <a style="text-decoration: none" href="{{ url('ministries') }}" ><h3>MINISTRIES</h3></a>
        </div>
    <div class="left-side-content content-2 hidden-xs">
        <a style="text-decoration: none" href="{{ url('members') }}" ><h3>MEMBERS</h3></a>
    </div>
    @endsection

@section('content')

    <div id="carousel1">

        <div id="inspire">
        </div>

        <ul>
            <li>{!! HTML::image('images/mela/mela (1).jpg',null, array('width' => '100%','height' => '100%')) !!}</li>
            <li>{!! HTML::image('images/mela/mela (2).jpg',null, array('width' => '100%','height' => '100%')) !!}</li>
            <li>{!! HTML::image('images/mela/mela (3).jpg',null, array('width' => '100%','height' => '100%')) !!}</li>
            <li>{!! HTML::image('images/mela/mela (4).jpg',null, array('width' => '100%','height' => '100%')) !!}</li>
            <li>{!! HTML::image('images/mela/mela (5).jpg',null, array('width' => '100%','height' => '100%')) !!}</li>
            <li>{!! HTML::image('images/mela/mela (6).jpg',null, array('width' => '100%','height' => '100%')) !!}</li>
            <li>{!! HTML::image('images/mela/mela (7).jpg',null, array('width' => '100%','height' => '100%')) !!}</li>
            <li>{!! HTML::image('images/mela/mela (8).jpg',null, array('width' => '100%','height' => '100%')) !!}</li>
            <li>{!! HTML::image('images/mela/mela (9).jpg',null, array('width' => '100%')) !!}</li>
        </ul>
    </div>

    <hr>

    <div class="updates">

        <div class="btn-group new-post">
            <a data-target="#new-post" data-toggle="collapse" class="btn btn-primary">CREATE A NEW POST</a>
        </div>
        <div id="new-post" class="collapse">
            @include('posts.new-partial')
        </div>

        <div class="post">
            <div class="post-profile">
                @foreach($posts as $post)
                    @include('posts.show-partial')
                @endforeach
            </div>
        </div>


    </div>
        {!! $posts->render() !!}
@endsection

@section('right-side')
    <div class="top-right-deco">
    </div>
    <div class="right-side-content">
    <h3>EVENTS</h3>
    </div>
    @foreach($events as $event)
        @include('events.show-partial')
    @endforeach

    @endsection