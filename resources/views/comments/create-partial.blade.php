{!! Form::open( array( 'route' => 'comment.store', 'class' => 'form post-form')) !!}

<div class="form-group col-centred">
    {!! Form::text('body', null,
    array( 'class' => 'form-control col-centred',
    'placeholder' => 'Write a comment')) !!}
</div>

<div class="form-group">
    <input type="hidden" value="{{ $post->id }}" name="post_id">
    <input type="hidden" value="{{ Auth::user()->id }}" name="creator_id">
</div>

<div class="form-group">
    {!! Form::submit('comment', array('class' => 'btn btn-primary pull-right')) !!}
</div>

{!! Form::close() !!}
