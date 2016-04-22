
@extends('layouts.master')

@section('title')
    @include('partials.navigation_auth')
@endsection

@section('content')

    <h4>{{ $group->name }}</h4>

    <h5>{{ $group->description }}</h5>
    <hr>
    <a class="btn btn-default" href="{{ url('groups/join',[$group->id]) }}">JOIN</a>
    @if($group->users->count() > 0)
        <h5>{{ $group->users->count() }} MEMBERS</h5>
        <div class="group-users">
            @foreach($group->users as $member)
                <p><a href="{{ URL::route('profile.show', array($member->profile->id)) }}">{{ $member->firstname }} {{ $member->lastname }}</a></p>
                @endforeach
        </div>
        @endif

    <p>CREATED {{ $group->created_at->diffForHumans() }}</p>
    <p>created by <a href="{{ URL::route('profile.show',array('id' => $group->getCreator()->profile->id)) }}">{{ $group->getCreator()->firstname }}</a> </p>
    @if(Auth::user()->id === $group->getCreator()->id)
        <h5><a href= "{{ URL::route('ministries.edit', [$group->id]) }}">DO YOU WANT TO EDIT IT</a></h5>
    @endif


@endsection