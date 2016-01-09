
@extends('layouts.master')
@include('partials.navigation_auth')
@section('content')
    <div class="col-md-6">
        {!! Form::open(array('url' => array('/auth/update',Auth::user()->id ), 'class' => 'form')) !!}

        <h1>CHURCH APP create account</h1>

        @if(count($errors) > 0)
            <div class="alert alert-danger">
                There were some problems updating your account
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
            {!! Form::password('password', null, array('class' => 'form-control', 'placeholder' => 'Password')) !!}
        </div>

        <div class="form-group">
            {!! Form::label('Confirm Password') !!}
            {!! Form::password('password_confirmation', null, array('class' => 'form-control',
                                'placeholder' => 'Confirm your password')) !!}
        </div>

        <div class="form-group">
            {!! Form::submit("Create my account",
                    array('class' => 'btn btn-primary')) !!}
        </div>
        {!! Form::close() !!}
    </div>

@endsection