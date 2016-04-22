{{-- */$image = $update->updatable/* --}}

<div class="article">
    <div class="article-top">
        <div class="creator-image col-md-4" style="margin-left: -3%">
            @if($image->getCreator())
                @if($image->getCreator()->profile)
                    {!! HTML::image( Image::url('images/'.$image->getCreator()->profile->image_name,300,300,array('crop')),null, array('width' => '100%','height' => '100%')) !!}
                    <h4 style="text-align: center">posted by <a href="{{ URL::route('profile.show',array('id' => $image->getCreator()->profile->id)) }}"> {{ $image->getCreator()->firstname }}</a> </h4>
                @else
                    {!! HTML::image( Gravatar::get($image->getCreator()->email) ,null, array('width' => '100%','height' => '100%')) !!}
                    <h4 style="text-align: center">posted by {{ $image->getCreator()->firstname }} </h4>
                @endif
            @endif
        </div>
        <div class="article-title col-md-8" style="text-align: center;">
            {{-- to do --}}
        </div>
    </div>
    <div class="article-body col-md-8" style="padding-top:5%">
        <div  class="image">
            {!! HTML::image( Image::url('images/'.$image->image_name,600,400,array('crop')),null, array('width' => '100%','height' => '100%')) !!}
        </div>
    </div>
    <div class="article-footer" style="text-align: right;  padding-right: 5%">
        <h5>created {{ $image->created_at->diffForHumans() }}</h5>

        @if($image)
            <p><a href= "{{ URL::route('image.show', [$image->id]) }}">view image</a></p>
        @endif


    </div>

</div>