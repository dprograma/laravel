<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Post;
use Session;
use App\Category;
use Purifier;
use Image;
use storage;

class postController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::orderBy('id','desc')->paginate(3);
        return view('posts.index')->withPost($post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $tags2 = [];
        $cats = [];

        foreach($categories as $category)
        {
            $cats[$category->id] = $category->name;
        }

        foreach ($tags as $tag) 
        {
            $tags2[$tag->id] = $tag->name;
        }

        return view('posts.create')->withCategories($cats)->withTags($tags2);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request, array(
            'title'             => 'required|max:255',
            'slug'              => 'required|min:5|max:255|alpha_dash|unique:posts,slug',
            'category_id'       => 'required|integer',
            'body'              => 'required',
            'featured_image'    => 'sometimes|image|size:2000'
        ));
        //store in the database
        $post               = new Post;
        $post->title        = Purifier::clean($request->title);
        $post->slug         = Purifier::clean($request->slug);
        $post->category_id  = Purifier::clean($request->category_id);
        $post->body         = Purifier::clean($request->body);

        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);
            $post->image = $filename;
        }

        $post->save();

        $post->tags()->sync($request->tags, false);

        Session::flash('success', 'The post was successfully saved!');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::find($id);
        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post       = Post::find($id);
        $categories = Category::all();
        $tags       = Tag::all(); 
        $cats       = [];
        $tags2      = [];

        foreach ($categories as $category) 
        {
            $cats[$category->id] = $category->name;
        }

        foreach ($tags as $tag) {
           $tags2[$tag->id] = $tag->name;
        }

        return view('posts.edit')->withPost($post)->withCategories($cats)->withTags($tags2);
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

        $post = Post::find($id);

            $this->validate($request, array(
            'title'       => 'required|max:255',
            'slug'        => "    required|min:5|max:255|alpha_dash|unique:posts,slug,$id",
            'category_id' => 'required|integer',
            'body'        => 'required'
            ));
        
            $post->title       = Purifier::clean($request->input('title'));
            $post->body        = Purifier::clean($request->input('body'));
            $post->category_id = Purifier::clean($request->input('category_id'));
            $post->slug        = Purifier::clean($request->input('slug'));

            if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/' . $filename);
            Image::make($image)->resize(800, 400)->save($location);

            $oldFilename = $post->image;

            $post->image = $filename;

            storage::delete($oldFilename);
        }

        $post->save();

        $post->tags()->sync($request->tags);

        Session::flash('success', 'Post successfully updated!');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        $post->tags()->detach();

        $post->delete();

        storage::delete($post->image);

       Session::flash('success', 'Post successfully deleted!');

        return redirect()->route('posts.index');
    }
}
