
@extends('layouts.master')
@include('partials.navigation_auth')

@section('left-side')
    <div class="logo" style="padding-top: 25%; ">
        <div class="logo-inner" style="border: solid; border-color: #ffffff; border-radius: 10%">
            {!! HTML::image('images/mmucu_logo.png',null, array('width' => '100%')) !!}
        </div>

    </div>

@endsection

@section('content')

    <div class="">
        {!! Form::open(array('url' => '/auth/login', 'class' => 'form')) !!}

        <h1>Sign into your MMUCU ACCOUNT</h1>
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
            {!! Form::password('password',array('class' => 'form-control', 'placeholder' => 'Password')) !!}
        </div>

        <div class="form-group">
            <label>
                {!! Form::checkbox('remember', 'remember') !!}  Remember me
            </label>
        </div>

        <div class="form-group">
            {!! Form::submit('Login', array('class' => 'btn btn-primary')) !!}
            <a href="/auth/register" class="btn btn-default">OR SIGNUP</a>
        </div>

        <a href="/password/email">Forgot your password?</a>

        {!! Form::close() !!}
    </div>

@endsection