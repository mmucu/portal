
@extends('layouts.master')

@section('title')
    @include('partials.navigation_auth')
@endsection

@section('content')
    <a class="btn btn-primary" href="{{ URL::route('events.create') }}">Create a new Event</a>
    <h2>EVENTS</h2>

    @foreach($events as $event)
        @if($event->starting->isFuture())
            <div class="future-events event">
                <h4>{{ $event->name }}</h4>
                <h4>STATUS: UPCOMING EVENT</h4>
                <p> {{ $event->host }} brings us {{ $event->name }} on {{ $event->starting->format('l jS \\of F Y h:i A') }}</p>
                <p>upto {{ $event->ending->format('l jS \\of F Y h:i A') }}</p>
                <p> the event will last {{ $event->starting->diffForHumans($event->ending, true) }}</p>
                <p> the event starts {{ $event->starting->diffForHumans(Carbon::now(), true) }} from now</p>
                <h5><a href="{{ URL::route('events.show',[$event->id]) }}">view event</a> </h5>
            </div>
        @elseif($event->starting->isPast() and $event->ending->isFuture())
            <div class="present-events event">
                <h4>{{ $event->name }}</h4>
                <h4>STATUS: CONTINUING EVENT</h4>
                <p> {{ $event->host }} is bringing us {{ $event->name }} which started on {{ $event->starting->format('l jS \\of F Y h:i A') }}</p>
                <p>and will end on {{ $event->ending->format('l jS \\of F Y h:i A') }}</p>
                <p> the event will last {{ $event->starting->diffForHumans($event->ending, true) }}</p>
                <p> the event ends {{ $event->ending->diffForHumans(Carbon::now(), true) }} from now</p>
                <h5><a href="{{ URL::route('events.show',[$event->id]) }}">view event</a> </h5>
            </div>
        @elseif($event->ending->isPast())
            <div class="past-events event">
                <h4>{{ $event->name }}</h4>
                <h4>STATUS: PAST EVENT</h4>
                <p> {{ $event->host }} hosted {{ $event->name }} on {{ $event->starting->format('l jS \\of F Y h:i A') }}</p>
                <p>to {{ $event->ending->format('l jS \\of F Y h:i A') }}</p>
                <p> the event lasted {{ $event->starting->diffForHumans($event->ending, true) }}</p>
                <p> the event ended {{ $event->ending->diffForHumans(Carbon::now(), true) }} ago</p>
                <h5><a href="{{ URL::route('events.show',[$event->id]) }}">view event</a> </h5>
            </div>
        @endif
    @endforeach

    {{ $events->render() }}

@endsection