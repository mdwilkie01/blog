@extends('layouts.master')

@section('content')
    <h1>Create a post</h1>
    <form action="/blog/public/posts" method="POST">
    {{ csrf_field() }}
      <div class="form-group">
    	<label for="title">Title</label>
    	<input type="text" name="title"  class="form-control"/>
      </div>
      <div class="form-group">
    	<label for="body">Body</label>
    	<textarea name="body" id="body" class="form-control"></textarea>
      </div>
    	<button class="btn btn-primary" type="submit" id="submit">Submit</button>
    </form>
    <br />
@if (count($errors))
	@include('layouts.errors')
@endif
@endsection