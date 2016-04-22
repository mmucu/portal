@extends('layouts.master')

@section('title')
    @include('partials.navigation_home')
@endsection

@section('content')

    @if($event->starting->isFuture())
        <div class="future-events event">
            <h3>{{ $event->name }}</h3>
            <hr style="border-top:dotted 1px;" />
            <p>{!! $event->description !!}</p>
            <hr style="border-top:dotted 1px;" />
            it will start {{ $event->starting->diffForHumans() }}
            and end  {{ $event->ending->diffForHumans() }}
            <hr style="border-top:dotted 1px;" />
            <p>by {{ $event->host }}</p>

        </div>
    @elseif($event->starting->isPast() and $event->ending->isFuture())
        <div class="present-events event">
            <h3>{{ $event->name }}</h3>
            <hr style="border-top:dotted 1px;" />
            <p>{!! $event->description !!}</p>
            <hr style="border-top:dotted 1px;" />
            started {{ $event->starting->diffForHumans() }}
            and will end {{ $event->ending->diffForHumans() }}
            <hr style="border-top:dotted 1px;" />
            <p>by {{ $event->host }}</p>
        </div>
    @elseif($event->ending->isPast())
        <div class="past-events event">
            <h3>{{ $event->name }}</h3>
            <hr style="border-top:dotted 1px;" />
            <p>{!! $event->description !!}</p>
            <hr style="border-top:dotted 1px;" />
            started {{ $event->starting->diffForHumans() }}
            and ended {{ $event->ending->diffForHumans() }}
            <hr style="border-top:dotted 1px;" />
            <p>by {{ $event->host }}</p>
        </div>
    @endif


@endsection