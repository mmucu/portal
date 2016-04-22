
@extends('layouts.master')

@section('title')
    @include('partials.navigation_auth')
@endsection

@section('content')
    <h2>MINISTRIES</h2>


    @foreach($groups as $group)
        <div class="show-post">
            <h4>{{ $group->name }}</h4>
            <p>{{ $group->description }}</p>
            <h5><a href="{{ URL::route('ministries.show',[$group->id]) }}">view ministry</a> </h5>
            <a class="btn btn-default" href="{{ url('groups/join',[$group->id]) }}">JOIN</a>
        </div>
        <hr>

            @endforeach


    <a class="btn btn-primary" href="{{ URL::route('ministries.create') }}">Create a new Ministry</a>

@endsection