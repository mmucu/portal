@if(count($post->comments) > 5)
    @for($i = 0; $i<5; $i++)
        {{-- */$comment = $post->comments[$i]/* --}}

        <div class="comment" style="padding: 5%">
            @if($comment->getUser()->profile)
                <p><a href="{{ URL::route('profile.show', array('id' => $comment->getUser()->profile->slug )) }}">{{ $comment->getUser()->firstname }}</a> : {{ $comment->body }}</p>
            @else
                <p>{{ $comment->getUser()->firstname }} {{ $comment->body }}</p>
            @endif
            <h5 class="pull-right">{{ $comment->updated_at->diffForHumans() }}</h5>
            <hr>
        </div>
    @endfor
@elseif(count($post->comments) > 0)
    @foreach($post->comments as $comment)
        <div class="comment" style="padding: 5%">
            @if($comment->getUser()->profile)
                <p><a href="{{ URL::route('profile.show', array('id' => $comment->getUser()->profile->slug )) }}">{{ $comment->getUser()->firstname }}</a> : {{ $comment->body }}</p>
            @else
                <p>{{ $comment->getUser()->firstname }} {{ $comment->body }}</p>
            @endif
            <h5 class="pull-right">{{ $comment->updated_at->diffForHumans() }}</h5>
            <hr>
        </div>
    @endforeach
@endif
