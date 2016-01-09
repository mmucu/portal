
@extends('layouts.master')

@section('title')
    @include('partials.navigation_auth')
@endsection

@section('content')
    <h2>YOUR ARE WELCOMED TO JOIN ANY OF OUR GROUPS</h2>

    <table>
        <tr>
            <td>NAME</td>
            <td>DESCRIPTION</td>
            <td>SHOW CASE</td>
            <td>JOIN</td>
        </tr>

        @foreach($groups as $group)
        <tr>
                <td>{{ $group->name }}</td>
                <td>{{ $group->description }}</td>
                <td><a href="{{ URL::route('groups.show',[$group->id]) }}">DETAILS</a> </td>
            <td><a href="{{ url('groups/join',[$group->id]) }}">JOIN</a> </td>
        </tr>
            @endforeach
    </table>

    <a class="btn btn-primary" href="{{ URL::route('groups.create') }}">Create new Group</a>

@endsection