
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
        {!! Form::open(array('url' => '/auth/register', 'class' => 'form')) !!}

        <h1>create a MMUCU account</h1>

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                There were some problems creating an account
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>
            </div>
        @endif

        <div class="form-group">
            {!! Form::label('firstname', 'Your First name') !!}
            {!! Form::text('firstname', null,array('class' => 'form-control', 'placeholder' => 'Name')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('lastname', 'Your Last name') !!}
            {!! Form::text('lastname', null,array('class' => 'form-control', 'placeholder' => 'Name')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Your Email Address') !!}
            {!! Form::text('email', null, array('class' => 'form-control', 'placeholder' => 'Email address')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Your Password') !!}
            {!! Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Confirm Password') !!}
            {!! Form::password('password_confirmation', array('class' => 'form-control',
                                'placeholder' => 'Confirm your password')) !!}
        </div>

        <div class="form-group">
            {!! Form::submit("Create my account",
                    array('class' => 'btn btn-primary')) !!}
        </div>
        {!! Form::close() !!}
    </div>

@endsection