
@extends('layouts.master')
@section('title')
    @include('partials.navigation_auth')
    @endsection
@section('content')


    <h1>Create a new Group</h1>

    <ul>
        @foreach($errors->all() as $error )
            <li> {{ $error }}</li>
        @endforeach
    </ul>

    {!! Form::open( array( 'route' => 'groups.store', 'class' => 'form')) !!}

    <div class="form-group">
        {!! Form::label('Group name') !!}
        {!! Form::text('name', null,
        array('required', 'class' => 'form-control',
        'placeholder' => 'Praise and Worship')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Group Description') !!}
        {!! Form::textarea('description', null,
        array('required', 'class' => 'form-control',
        'placeholder' => 'Sing and Dance to the Lord')) !!}
    </div>

    <div class="form-group">
        {!! Form::hidden('creator_id', Auth::user()->id)  !!}
    </div>

    <div class="form-group">
        {!! Form::submit('create Group', array('class' => 'btn btn-primary')) !!}
    </div>

    {!! Form::close() !!}

@endsection