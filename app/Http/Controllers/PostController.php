<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['category', 'person'])->get();

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Category::all();

        return view('post.create', compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'content' => 'required',
            'cat_id' => 'required|integer'
        ]);

        $post = new Post([
            'title' => $request->get('title'),
            'summary' => $request->get('summary'),
            'content' => $request->get('content'),
            'cat_id' => $request->get('cat_id'),
            'per_id' => 1
        ]);

        $post->save();

        return redirect('/post')->with('success', 'Post has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cats = Category::all();
        $post = Post::find($id);
        return view('post.edit', compact(['post', 'cats']));
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
        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'content' => 'required',
            'cat_id' => 'required|integer'
        ]);

        $post = Post::find($id);

        $post->title = $request->get('title');
        $post->summary = $request->get('summary');
        $post->content = $request->get('content');
        $post->cat_id = $request->get('cat_id');
        $post->per_id = 1;

        $post->save();

        return redirect('/post')->with('success', 'Post has been updated.');
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
        $post->delete();

        return redirect('/post')->with('success', 'Post has been deleted.');
    }
}
