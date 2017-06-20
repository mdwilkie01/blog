@extends('layouts.master')
@section('content')

<div>
 <h1>Sign in</h1>
    <form action="/blog/public/login" method="POST">
    {{ csrf_field() }}
      <div class="form-group">
    	<label for="email">Email</label>
    	<input type="email" name="email" class="form-control" />
      </div>
       <div class="form-group">
    	<label for="password">Password</label>
    	<input type="password" name="password" class="form-control" />
      </div>
      
    	<button class="btn btn-primary" type="submit" id="submit">Submit</button>
    </form>
    <br />
</div>
    <div class="form-group">
    @if (count($errors))
      @include('layouts.errors')
    @endif
    </div>
 @endsection
  