
@extends('layouts.master')

@section('title')
    @include('partials.navigation_auth')
@endsection

@section('content')

    <h3> SHOWING GROUP'S DETAILS</h3>

    <h4>NAME : {{ $group->name }}</h4>

    <h5>DESCRIPTION : {{ $group->description }}</h5>

    @if($group->users->count() > 0)
        <h4>{{ $group->users->count() }} MEMBERS</h4>
        <div class="group-users">
            <h5>group members:</h5>
            @foreach($group->users as $member)
                <p><a href="{{ URL::route('profile.show', array($member->profile->id)) }}">{{ $member->firstname }} {{ $member->lastname }}</a></p>
                @endforeach
        </div>
        @endif

    <h3>CREATED AT {{ $group->created_at }}</h3>



    <h4>CREATED BY: <a href="{{ URL::route('profile.show',array('id' => $group->getCreator()->profile->id)) }}">{{ $group->getCreator()->firstname }}</a> </h4>
    @if(Auth::user()->id === $group->getCreator()->id)
        <h5><a href= "{{ URL::route('groups.edit', [$group->id]) }}">DO YOU WANT TO EDIT IT</a></h5>
    @endif


@endsection