@extends('layouts.master')

@section('title')
    @include('partials.navigation_home')
@endsection

@section('content')
    <h3>MAKE CHANGES TO YOUR PROFILE PAGE</h3>

    <ul>
        @foreach($errors->all() as $error )
            <li> {{ $error }}</li>
        @endforeach
    </ul>

    {!! Form::model($profile, array( 'method' => 'put', 'route' => ['profile.update'], 'class' => 'form', 'files' => true)) !!}

    <div class="form-group">
        {!! Form::label(' Registration Number ') !!}
        {!! Form::text('reg_no', null,
        array( 'class' => 'form-control',
        'placeholder' => $profile->reg_no)) !!}
    </div>

    <div class="form-group">
        {!! Form::label(' Course ') !!}
        {!! Form::text('course', null,
        array( 'class' => 'form-control',
        'placeholder' => 'which course are you taking')) !!}
    </div>

    <div class="form-group">
        {!! Form::label(' Year of Study ') !!}
        {!! Form::text('year', null,
        array( 'class' => 'form-control',
        'placeholder' => 'which year are your in')) !!}
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
        {!! Form::submit('Update Profile', array('class' => 'btn btn-primary')) !!}
    </div>

    {!! Form::close() !!}

    @endsection