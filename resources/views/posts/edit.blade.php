
@extends('layouts.master')

@section('title')
    @include('partials.navigation_auth')
@endsection

@section('content')
<script type="text/javascript" src="{{ asset('/js/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript">
    tinymce.init({
        selector:'textarea',
        plugins : ['advlist autolink lists link image  charmap print preview anchor', 'searchreplace visualblocks code fullscreen','insertdatetime media table contextmenu paste'],
        toolbar : 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image'
    });
</script>
    <h1>Edit Your Post</h1>

    <ul>
        @foreach($errors->all() as $error )
            <li> {{ $error }}</li>
        @endforeach
    </ul>

    {!! Form::model($post, array( 'method' => 'put', 'route' => ['post.update', $post->id], 'class' => 'form')) !!}

    <div class="form-group">
        {!! Form::label('Title') !!}
        {!! Form::text('title', null,
        array('required', 'class' => 'form-control',
        'placeholder' => $post->title)) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Body') !!}
        {!! Form::textarea('body', null,
        array('required', 'class' => 'form-control',
        'placeholder' => $post->description)) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Edit Post', array('class' => 'btn btn-primary')) !!}
    </div>

    {!! Form::close() !!}

@endsection