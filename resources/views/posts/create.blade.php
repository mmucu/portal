@extends('layouts.master')
@section('header')
    @parent

    <script language="javascript">
        var loadFile = function(event){
            var output = document.getElementById('show_image');
            output.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

@endsection
@section('title')
    @include('partials.navigation_home')

@endsection

@section('content')

    <h3>Hi {{ Auth::user()->firstname }}</h3>
    <h3>CREATING A NEW POST</h3>

    <ul>
        @foreach($errors->all() as $error )
            <li> {{ $error }}</li>
        @endforeach
    </ul>

    {!! Form::open( array( 'route' => 'post.store', 'class' => 'form', 'files' => true)) !!}

    <div class="form-group">
        {!! Form::label('Title') !!}
        {!! Form::text('title', null,
        array('required', 'class' => 'form-control',
        'placeholder' => 'Hello brothers and sisters')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Body') !!}
        {!! Form::textarea('body', null,
        array('required', 'class' => 'form-control',
        'placeholder' => 'It is another joyful day in the Lord')) !!}
    </div>

    <div class="form-group">
        {!! HTML::image('#','image', array('id' => 'show_image')) !!}
        {!! Form::file('image',array('id' => 'input_image', 'onchange'=> 'loadFile(event)')) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('create Post', array('class' => 'btn btn-primary')) !!}
    </div>

    {!! Form::close() !!}

@endsection