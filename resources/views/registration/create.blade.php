@extends('layouts.master')

@section('content')

<div>
 <h1>Register</h1>
    <form action="/blog/public/register" method="POST">
    {{ csrf_field() }}
      <div class="form-group">
    	<label for="body">User Name</label>
    	<input type="text" name="name" class="form-control" />
      </div>
       <div class="form-group">
    	<label for="body">Email</label>
    	<input type="email" name="email" class="form-control" />
      </div>
      <div class="form-group">
    	<label for="body">Email Confirmation</label>
    	<input type="email" name="email_confirmation" class="form-control" />
      </div>
      <div class="form-group">
    	<label for="body">Password</label>
    	<input type="password" name="password" class="form-control" />
      </div>
      <div class="form-group">
    	<label for="password_confirmation">Password Confirmation</label>
    	<input type="password" name="password_confirmation" class="form-control" />
      </div>

    	<button class="btn btn-primary" type="submit" id="submit">Submit</button>
    </form>
    <br />

    <div class="form-group">
    @if (count($errors))
      @include('layouts.errors')
    @endif
    </div>
    @endsection