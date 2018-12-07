<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use Session;

use Purifier;

class categoryController extends Controller
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
        $categories = Category::all();
        return view('categories.index')->withCategories($categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required|max:255'
        ));

        $categories = new Category;

        $categories->name = Purifier::clean($request->name);

        $categories->save();

        Session::flash('success', 'Category successfully created');

        return redirect()->route('categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::find($id);

        return view('categories.edit')->withCategories($categories);
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
        $categories = Category::find($id);
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $categories->name = Purifier::clean($request->input('name'));

        $categories->save();

        Session::flash('success', 'Category successfully Updated!');

        return redirect()->route('categories.index');
    }

}
