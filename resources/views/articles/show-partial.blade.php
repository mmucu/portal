{{-- */$article = $update->updatable/* --}}
<div class="article">
    <div class="article-top">
        <div class="creator-image col-md-4" style="margin-left: -3%">
            {!! HTML::image( Image::url('images/'.$article->getCreator()->profile->image_name,300,300,array('crop')),null, array('width' => '100%','height' => '100%')) !!}
            <h4 style="text-align: center">author <a href="{{ URL::route('profile.show',array('id' => $article->getCreator()->profile->id)) }}"> {{ $article->getCreator()->firstname }}</a> </h4>
        </div>
        <div class="article-title col-md-8" style="text-align: center; border-bottom:dotted 1px;">
            <h3>{{ $article->title }}</h3>

            <h4>about
                @foreach($article->categories as $category)
                    {{ $category->name }}
                @endforeach
            </h4>
        </div>
    </div>
    <div class="article-body col-md-8" style="padding-top:5%">
        <p>{!! str_limit($article->body, 200, "...read") !!}</p>
    </div>
    <div class="article-footer" style="text-align: right;  padding-right: 5%">
        <h5>created {{ $article->created_at->diffForHumans() }}</h5>

        @if($article)
            <p><a href= "{{ URL::route('article.show', [$article->id]) }}">view article</a></p>
        @endif


    </div>

</div>