@extends('layouts.master')

@section('title')
    @include('partials.navigation_home')

 @endsection

@section('content')

    <h3>Hi {{ Auth::user()->firstname }}</h3>
    <h3>CREATE YOUR PROFILE PAGE</h3>

    <ul>
        @foreach($errors->all() as $error )
            <li> {{ $error }}</li>
        @endforeach
    </ul>

    {!! Form::open( array( 'route' => 'profile.store', 'class' => 'form', 'files' => true)) !!}

    <div class="form-group">
        {!! Form::label(' Registration Number ') !!}
        {!! Form::text('reg_no', null,
        array( 'class' => 'form-control',
        'placeholder' => 'Your registration number')) !!}
    </div>

    <div class="form-group">
        {!! Form::label(' Course ') !!}
        {!! Form::text('course', null,
        array( 'class' => 'form-control',
        'placeholder' => 'which course are you taking')) !!}
    </div>

    <h5>Year of study</h5>
    <div class="form-group">
        {!! Form::select('year',$years ,null,array('class' => 'selectbox')) !!}
    </div>

    <div class="form-group">
        {!! Form::label(' Alias ') !!}
        {!! Form::text('alias', null,
        array( 'class' => 'form-control',
        'placeholder' => 'what they call you')) !!}
    </div>

    <div class="form-group">
        {!! Form::label(' Profile Image ') !!}
        {!! Form::file('image', null) !!}
    </div>

    <div class="form-group">
        {!! Form::label('about you') !!}
        {!! Form::textarea('about', null,
        array('required', 'class' => 'form-control',
        'placeholder' => 'I love to Sing and Dance to the Lord')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('what do you like to do?') !!}
        {!! Form::textarea('hobbies', null,
        array('required', 'class' => 'form-control',
        'placeholder' => 'I love to Sing and Dance to the Lord')) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('create Profile', array('class' => 'btn btn-primary')) !!}
    </div>

    {!! Form::close() !!}

    @endsection