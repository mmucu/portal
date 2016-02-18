
@extends('layouts.master')

@section('title')
    @include('partials.navigation_auth')
@endsection

@section('content')
    <script type="text/javascript" src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector:'textarea',
            plugins : ['advlist autolink lists link image  charmap print preview anchor', 'searchreplace visualblocks code fullscreen','insertdatetime media table contextmenu paste'],
            toolbar : 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
        });
    </script>
    <style>
        .selectbox{
            background-color: #22223E;
        }
    </style>

    <h1>Create a new Article</h1>

    <ul>
        @foreach($errors->all() as $error )
            <li> {{ $error }}</li>
        @endforeach
    </ul>

    {!! Form::open(array( 'route' => 'article.store', 'class' => 'form')) !!}

    <div class="form-group">
    {!! Form::hidden('creator_id', Auth::user()->id)  !!}
    </div>

    <div class="form-group">
        {!! Form::label('Title') !!}
        {!! Form::text('title', null,
        array('required','class' => 'form-control',
        'placeholder' => 'what do you call it')) !!}
    </div>


    <h5>CATEGORIES</h5>
    <div class="form-group">
        {!! Form::select('categories', $categories,null,array('class' => 'selectbox')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Body') !!}
        {!! Form::textarea('body', null,
        array('required', 'class' => 'form-control',
        'placeholder' => 'say something good')) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create Article', array('class' => 'btn btn-primary')) !!}
        {!! Form::label('If it doesnt post, please refresh page') !!}}}
    </div>

    {!! Form::close() !!}

@endsection