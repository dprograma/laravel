<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class blogController extends Controller
{
    
	public function getIndex()
	{
		$post = Post::paginate(10);

		return view('blog.index')->withPost($post);
	}

    public function getSingle($slug)
    {
    	$post = Post::where('slug', '=', $slug)->first();

    	return view('blog.single')->withPost($post);
    }
}
