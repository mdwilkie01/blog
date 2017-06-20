<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
    	return view('registration.create');
    }

     public function store()
    {
    	//validate the form
    	$this->validate(request(), [
			'name' => 'required',
			'email' => 'required|confirmed',
			'password' => 'required|confirmed'
			]);
    	//create the user
		$user = User::create([
				'name' => request('name'),
				'email' => request('email'),
				'password' => bcrypt(request('password')),
				]);
		//log in the user
		auth()->login($user);

		//redirect home
		return redirect()->home();

		return redirect('/');
    }
    
}
