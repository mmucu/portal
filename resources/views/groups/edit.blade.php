
@extends('layouts.master')

@section('title')
    @include('partials.navigation_auth')
@endsection

@section('content')

    <h1>Edit the Group</h1>

    <ul>
        @foreach($errors->all() as $error )
            <li> {{ $error }}</li>
        @endforeach
    </ul>

    {!! Form::model($group, array( 'method' => 'put', 'route' => ['groups.update', $group->id], 'class' => 'form')) !!}

    <div class="form-group">
        {!! Form::label('Group name') !!}
        {!! Form::text('name', null,
        array('required', 'class' => 'form-control',
        'placeholder' => $group->name)) !!}
    </div>

    <div class="form-group">
        {!! Form::label('Group Description') !!}
        {!! Form::textarea('description', null,
        array('required', 'class' => 'form-control',
        'placeholder' => $group->description)) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Edit Group', array('class' => 'btn btn-primary')) !!}
    </div>

    {!! Form::close() !!}

@endsection