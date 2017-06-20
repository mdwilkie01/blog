<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Carbon\Carbon;

class PostsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->except(['index','show']);
	}

	public function index()
	{
		$posts = Post::latest()
		->filter(request(['month','year']))
		->get();

		

		return view('posts.index', compact('posts'));
	}  

	public function create()
	{
		return view('posts.create');
	}

	public function show(Post $post)
	{
		return view('posts.show', compact('post'));
	} 

	public function store()
	{
		$this->validate(request(), [
			'title' => 'required|min:2',
			'body' => 'required|min:2'
			]);

		auth()->user()->publish(new Post(request(['title', 'body'])));
		

		return redirect('/');
	}
}

