
{{-- */$post = $update->updatable/* --}}

<div class="article">
    <div class="article-top">
        <div class="creator-image col-md-4" style="margin-left: -3%">
            @if ($post->getUser()->profile)
                @if($post->getUser()->profile->image_name)
                    {!! HTML::image( Image::url('images/'.$post->getUser()->profile->image_name,300,300,array('crop')) ,null, array('width' => '100%','height' => '100%', 'class' => 'post-image')) !!}
                @else
                    {!! HTML::image( Gravatar::get($post->getUser()->email) ,null, array('width' => '100%','height' => '100%', 'class' => 'post-image image-circle')) !!}
                @endif
            @else
                {!! HTML::image( Gravatar::get($post->getUser()->email) ,null, array('width' => '100%','height' => '100%', 'class' => 'post-image image-circle')) !!}
            @endif
            <h4 style="text-align: center">author <a href="{{ URL::route('profile.show',array('id' => $post->getUser()->profile->id)) }}"> {{ $post->getUser()->firstname }}</a> </h4>
        </div>
        <div class="article-title col-md-8" style="text-align: center; border-bottom:dotted 1px;">
            @if($post->title)
                <h3>{{  $post->title }}</h3>
            @endif
        </div>
    </div>
    <div class="article-body col-md-8" style="padding-top:5%">
        @if($post->image)
            {!! HTML::image('images/'.$post->image,null, array('width' => '50%','height' => '50%', 'class' => 'img-responsive pull-left')) !!}
        @endif
        @if($post->body)
            <p>{{  str_limit($post->body,200,'...') }}<a href="{{ URL::route('post.show',array('id' => $post->id)) }}">...</a> </p>
        @endif
    </div>
    <div class="article-footer" style=" padding-right: 5%">
        <h5 style="text-align: right;">created {{ $post->created_at->diffForHumans() }}</h5>

        @if($post)
            <p style="text-align: right;"><a href= "{{ URL::route('post.show', [$post->id]) }}">view post</a></p>
        @endif

        <div class="comments">

            <div style="text-align: right">
                @if($post->comments->count() > 0)
                    <a data-toggle="collapse" data-target="#comment{{ $post->id }}" > <span class="glyphicon glyphicon-comment glyphicon-padding" style="color:#3887FE"> {{ $post->comments->count() }}comments</span> </a>
                @else
                    <a data-toggle="collapse" data-target="#comment{{  $post->id }}" ><span class="glyphicon glyphicon-comment glyphicon-padding" style="color:#3887FE"> comment</span> </a>
                @endif

            </div>


            <hr>
            <div id="comment{{ $post->id }}" class="collapse">
                @if(Auth::check())
                    @include('comments.create-partial')
                    <hr>
                    @include('comments.show-partial')
                    <hr>
                @else
                    <p>login to comment</p>
                @endif

            </div>

        </div>
    </div>

</div>