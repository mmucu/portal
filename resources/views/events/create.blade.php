@extends('layouts.master')
@section('header')
    @parent
    <meta name="description" content="A lightweight, customizable jQuery timepicker plugin inspired by Google Calendar. Add a user-friendly javascript timepicker dropdown to your app in minutes." />
    {!! HTML::script('vendor/jonthornton-jquery-timepicker/jquery.timepicker.js') !!}
    {!! HTML::style('vendor/jonthornton-jquery-timepicker/jquery.timepicker.css') !!}
    {!! HTML::script('vendor/jonthornton-jquery-timepicker/lib/bootstrap-datepicker.js') !!}
    {!! HTML::style('vendor/jonthornton-jquery-timepicker/lib/bootstrap-datepicker.css') !!}
    {!! HTML::script('vendor/jonthornton-jquery-timepicker/lib/site.js') !!}
    {!! HTML::style('vendor/jonthornton-jquery-timepicker/lib/site.css') !!}

@endsection

@section('title')
    @include('partials.navigation_auth')
@endsection

@section('content')



    <h1>Create a new Event</h1>

    {!! Form::open(array( 'route' => 'events.store', 'class' => 'form')) !!}

    <div class="form-group">
        {!! Form::hidden('creator_id', Auth::user()->id)  !!}
    </div>

    <div class="form-group">
        {!! Form::label('Name') !!}
        {!! Form::text('name', null,
        array('required','class' => 'form-control',
        'placeholder' => 'what do you call it')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Description') !!}
        {!! Form::textarea('description', null,
        array('required', 'class' => 'form-control',
        'placeholder' => 'say something good')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Venue') !!}
        {!! Form::text('venue', null,
        array('required', 'class' => 'form-control',
        'placeholder' => 'where will it take place')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Host') !!}
        {!! Form::text('host', null,
        array('required', 'class' => 'form-control',
        'placeholder' => 'who organised the event?')) !!}
    </div>

    <div id="form-group">
        <label id="datepairExample">
            FROM
            <input name="start_date" type="text" class="date start" />
            <input name="start_time" type="text" class="time start" />
            TO
            <input name="stop_time" type="text" class="time end" />
            <input name="stop_date" type="text" class="date end" />
        </label>
    </div>

    <div class="form-group">
        {!! Form::label('Audience') !!}
        {!! Form::text('audience', null,
        array('required', 'class' => 'form-control',
        'placeholder' => 'who does the event address')) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create Event', array('class' => 'btn btn-primary')) !!}
    </div>

    {!! Form::close() !!}

    <script type="text/javascript" src="datepair.js"></script>
    <script type="text/javascript" src="jquery.datepair.js"></script>
    <script>
        // initialize input widgets first
        $('#datepairExample .time').timepicker({
            'showDuration': true,
            'timeFormat': 'g:ia'
        });

        $('#datepairExample .date').datepicker({
            'format': 'yyyy-m-d',
            'autoclose': true
        });

        // initialize datepair
        $('#datepairExample').datepair();
    </script>

@endsection