
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
        background-color: #FF4E49;
    }
</style>
    <h1>Edit Your Article</h1>

    <ul>
        @foreach($errors->all() as $error )
            <li> {{ $error }}</li>
        @endforeach
    </ul>

    {!! Form::model($article, array( 'method' => 'put', 'route' => ['article.update', $article->id], 'class' => 'form')) !!}

    <div class="form-group">
        {!! Form::label('Title') !!}
        {!! Form::text('title', null,
        array('required', 'class' => 'form-control',
        'placeholder' => $article->title)) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Categories') !!}
        {!! Form::select('categories', $categories, null,
        array('multiple' => 'multiple', 'name' => 'categories[]', 'class' => 'selectbox')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Body') !!}
        {!! Form::textarea('body', null,
        array('required', 'class' => 'form-control',
        'placeholder' => $article->body)) !!}
    </div>

    <div class="form-group">
        {!! Form::hidden('creator_id', Auth::user()->id)  !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Edit Article', array('class' => 'btn btn-primary')) !!}
    </div>

    {!! Form::close() !!}

@endsection