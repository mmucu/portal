
@extends('layouts.master')

@section('title')
    @include('partials.navigation_auth')
@endsection

@section('left-side')
    {!! HTML::image('images/'.$profile->image_name,null, array('width' => '100%','height' => '100%')) !!}

    <h4>Joined {{ $user->created_at->diffForHumans() }}</h4>

    <h4>seen {{ $user->updated_at->diffForHumans() }}</h4>

    @if( $user->groups != null)
        <h4>Groups</h4>
        @foreach($user->groups as $group)
            <p>{{ $group->name }}</p>
        @endforeach
    @else
        <h4>You have not joined any group</h4>
    @endif

    @if( $user->following != null)
        <h3>Following</h3>
        @foreach($user->following as $follow)
            <p>{{ $follow->name }}</p>
        @endforeach
    @else
        <h4>{{ ucfirst(trans($user->firstname)) }} is not following anyone</h4>
    @endif

@endsection

@section('content')

    <h1> SHOWING USER'S DETAILS</h1>

    <h4>Name: {{ ucfirst(trans($user->firstname)) }}  {{ ucfirst(trans($user->lastname)) }}</h4>

    <h4>Registration Number : {!! $profile->reg_no !!}</h4>

    <h4>Pursuing : {!! $profile->course !!}</h4>

    <h4>Year : {!! $profile->year !!}</h4>

    <h4>About me : {!! $profile->about !!}</h4>

    <h4>Hobbies : {!! $profile->hobbies !!}</h4>


@endsection