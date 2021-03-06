@extends('layouts.master')
@section('header')
    @parent

    <script language="javascript">
        var loadFile = function(event){
            var output = document.getElementById('show_image');
            var output1 = document.getElementById('show_image1');
            output.src = URL.createObjectURL(event.target.files[0]);
            output1.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

    @endsection
@section('title')
    @include('partials.navigation_home')

 @endsection

@section('left-side')
    {!! HTML::image('#','profile image', array('id' => 'show_image1', 'width' => "100%", 'height' => '100%' )) !!}
@endsection
@section('content')

    <h3>Hi {{ Auth::user()->firstname }}</h3>
    <h3>CREATE YOUR PROFILE PAGE</h3>

    {!! Form::open( array( 'route' => 'profile.store', 'class' => 'form', 'files' => true)) !!}

    <div class="form-group">
        {!! Form::label(' Registration Number ') !!}
        {!! Form::text('reg_no', null,
        array( 'class' => 'form-control',
        'placeholder' => 'Your registration number')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Pursing') !!}
        <select name="course">
            @foreach($faculties as $faculty)
                <optgroup label="{{ $faculty->name }}">
                    @foreach($faculty->departments as $department)
                        <option>{{ $department->name }}</option>
                    @endforeach
                </optgroup>
            @endforeach
        </select>

    </div>

    <div class="form-group">
        {!! Form::label('in which year') !!}
        {!! Form::select('year',$years ,null,array()) !!}
    </div>

    <div class="form-group">
        {!! Form::label(' Alias ') !!}
        {!! Form::text('alias', null,
        array( 'class' => 'form-control',
        'placeholder' => 'what they call you')) !!}
    </div>

    <div class="form-group">
        {!! Form::label(' Mobile Number ') !!}
        {!! Form::text('mobile_number', null,
        array( 'class' => 'form-control',
        'placeholder' => '07..')) !!}
    </div>

    <div class="form-group">
        {!! HTML::image('#','profile image', array('id' => 'show_image')) !!}
        {!! Form::file('image',array('id' => 'input_image', 'onchange'=> 'loadFile(event)')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('about you') !!}
        {!! Form::textarea('about', null,
        array('class' => 'form-control',
        'placeholder' => 'I love to Sing and Dance to the Lord')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('what do you like to do?') !!}
        {!! Form::textarea('hobbies', null,
        array('class' => 'form-control',
        'placeholder' => 'I love to Sing and Dance to the Lord')) !!}
    </div>

    <div class="form-group">
        {!! Form::label('you favorite bible verse') !!}
        {!! Form::textarea('favorite_verse', null,
        array('class' => 'form-control')) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('create Profile', array('class' => 'btn btn-primary')) !!}
    </div>

    {!! Form::close() !!}


@endsection