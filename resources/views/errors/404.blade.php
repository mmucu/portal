@extends('layouts.master')

@section('header')
    @parent
@endsection

@section('title')
@endsection

@section('left-side')
    <div class="image" style="padding-top: 10%">
        {!! HTML::image('images/'.'mmucu_logo.png',null, array('width' => '100%','height' => '100%')) !!}
    </div>

@endsection

@section('content')

    @include('partials.navigation_home')

    <div class='alert alert-info fade in'>
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <h4>We are sorry!! That page is not available</h4>
    </div>


    <div class="content">
        <div class="jumbotron" style="background-color: #ffaa6b">
            <h3>ERROR 404 PAGE NOT FOUND</h3>
        </div>
        <div class='jumbotron'><h3>MMUCU, Reaching the world with the word</h3></div>
    </div>

@endsection

@section('right-side')

@endsection