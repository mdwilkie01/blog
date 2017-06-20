<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Comment;
use Carbon\Carbon;

class Post extends Model
{
    protected $guarded = [];

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function addComment($body)
    {
    	$this->comments()->create(compact('body'));
	}

	 public function user() 
    {
    	return $this->belongsTo(User::class);
    }
    public static function scopeFilter($query, $filters)
    {
        $posts = Post::latest();
        if ($month = $filters['month']){
         $query->whereMonth('created_at', Carbon::parse('first day of ' . $month)->month);
        }
        if ($year = $filters['year']){
         $query->whereYear('created_at', $year);
        }
    }

    public static function archives()
    {
        return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')
        ->groupBy('year','month')
        ->orderByRaw('min(created_at) desc')
        ->get()
        ->toArray();
    }
}
