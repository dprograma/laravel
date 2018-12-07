<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Redirector;
use App\Mail\SendMailable;
use Illuminate\Http\Request;
use App\Post;
use Mail;
use Session;

class pageController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at','desc')->limit(3)->get();
    	return view('blog.welcome')->withPosts($posts);
    }
    public function about()
    {
    	return view('blog.about');
    }
    public function contact()
    {
    	return view('blog.contact');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'subject' => 'min:3',
            'body' => 'min:10'
        ]);

         Mail::to($request->input('email'))->send(new SendMailable($request->input('email'), $request->input('subject'), $request->input('body')));
        
        Session::flash('success', 'Your Email was sent successfully!');

        return redirect('welcome');
    }
}
