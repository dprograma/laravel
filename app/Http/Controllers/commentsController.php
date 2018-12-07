<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Session;
use App\Post;
use Purifier;

class commentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => 'store']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $post_id)
    {   
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|min:5|max:2000'
        ]);

        $post = Post::find($post_id);
        $comments = new Comment;

        $comments->name = Purifier::clean($request->name);
        $comments->email = Purifier::clean($request->email);
        $comments->comment = Purifier::clean($request->comment);
        $comments->approved = true;

        $comments->post()->associate($post);
        $comments->save();

        Session::flash('success', 'Comment was added.');

        return redirect()->route('blog.single',$post->slug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = Comment::find($id);

        return view('comments.edit')->withComment($comment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::find($id);

        $this->validate($request, [
            'comment' => 'required'
        ]);

        $comment->comment = Purifier::clean($request->comment);

        $comment->save();

        Session::flash('success', 'Comment updated successfully!');

        return redirect()->route('posts.show', $comment->post->id);
    }

    public function delete($id)
    {
        $comment = Comment::find($id);

        return view('comments.delete')->withComment($comment);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);

        $post_id = $comment->post->id;

        $comment->delete();

        Session::flash('success', 'Comment successfully deleted!');

        return redirect()->route('posts.show', $post_id);
    }
}
