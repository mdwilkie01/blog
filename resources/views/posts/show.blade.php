@extends('layouts.master')

@section('content')
@if (count($errors) )
	@include('layouts.errors')
@endif
<div class="blog-post">
            <h2 class="blog-post-title">{{ $post->title }}</h2>
            <p class="blog-post-meta">{{ $post->created_at->diffForHumans() }}</p>

            <p>
              {{ $post->body }}
            </p>
          </div><!-- /.blog-post -->


<div>
 <h1>Comment on this post</h1>
    <form action="/blog/public/posts/{{$post->id}}" method="POST">
    {{ csrf_field() }}
      <div class="form-group">
    	<label for="body">Body</label>
    	<textarea name="body" id="body" class="form-control"></textarea>
      </div>
    	<button class="btn btn-primary" type="submit" id="submit">Submit</button>
    </form>
    <br />

@foreach ($post->comments as $comment)
<hr />
<article>
	<p><strong>{{ $comment->created_at->diffForHumans() }}</strong></p>
	<p>{{ $comment->body }}</p>
</article>
@endforeach
</div>



@endsection