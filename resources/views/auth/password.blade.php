
@extends('layouts.master')

@section('content')

    <div class="col-md-6">
        {!! Form::open(array('url' => '/auth/login', 'class' => 'form')) !!}

        <h1>Recover your password</h1>
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                There were some problems recovering your password
                <br>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>
            </div>
        @endif

        <div class="form-group">
            {!! Form::label('Your Email Address') !!}
            {!! Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email address')) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Email password reset link?', array('class' => 'btn btn-primary')) !!}
        </div>

        {!! Form::close() !!}

    </div>

@endsection