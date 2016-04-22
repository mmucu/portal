{{-- */$event = $update->updatable/* --}}
@if($event->starting->isFuture())
    <div class="future-events event">
        <h4>UPCOMING {{ $event->name }}</h4>
        <p> {{ $event->host }} brings us {{ $event->name }} on {{ $event->starting->format('l jS \\of F Y h:i A') }}</p>
        <p>upto {{ $event->ending->format('l jS \\of F Y h:i A') }}</p>
        <p> the event will take {{ $event->starting->diffForHumans($event->ending, true) }}</p>
        <p> the event starts {{ $event->starting->diffForHumans(Carbon::now(), true) }} from now</p>
    </div>
@elseif($event->starting->isPast() and $event->ending->isFuture())
    <div class="present-events event">
        <h4>CONTINUING {{ $event->name }}</h4>
        <p> {{ $event->host }} is bringing us {{ $event->name }} which started on {{ $event->starting->format('l jS \\of F Y h:i A') }}</p>
        <p>and will end on {{ $event->ending->format('l jS \\of F Y h:i A') }}</p>
        <p> the event ends {{ $event->ending->diffForHumans(Carbon::now(), true) }} from now</p>
    </div>
@elseif($event->ending->isPast())
    <div class="past-events event">
        <h4>PAST {{ $event->name }}</h4>
        <p> {{ $event->host }} hosted {{ $event->name }} on {{ $event->starting->format('l jS \\of F Y h:i A') }}</p>
        <p>to {{ $event->ending->format('l jS \\of F Y h:i A') }}</p>
        <p> the event ended {{ $event->ending->diffForHumans(Carbon::now(), true) }} ago</p>
    </div>
@endif