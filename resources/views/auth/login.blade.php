
@extends('layouts.master')
@include('partials.navigation_auth')
@section('content')

    <div class="col-md-6">
        {!! Form::open(array('url' => '/auth/login', 'class' => 'form')) !!}

        <h1>Sign into a CHURCH APP account</h1>
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                There were some problems login into your account
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
            {!! Form::label('Your Password') !!}
            {!! Form::password('password', null, array('class' => 'form-control', 'placeholder' => 'Password')) !!}
        </div>

        <div class="form-group">
            <label>
                {!! Form::checkbox('remember', 'remember') !!}  Remember me
            </label>
        </div>

        <div class="form-group">
            {!! Form::submit('Login', array('class' => 'btn btn-primary')) !!}
        </div>

        <a href="/password/email">Forgot your password?</a>
        {!! Form::close() !!}
    </div>

@endsection