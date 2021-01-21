<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Post::with('tags')->latest()->get();
        return view ('post.index')->withData($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = Tag::all();
        $data = Post::all();
        return view('post.create', compact('data', 'tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'title'=>'required|max:255|min:3',
            'content'=>'required|min:50',
            'tags_id' => 'required',
            'image' => 'required',
            'author' => 'required'
        ]);

        $nm = $request->image;
        $imageName = $request->image->getClientOriginalName() . '-' . time() . '.' . $request->image->extension();

        $post = new Post;
        $post->title = $request["title"];
        $post->content = $request["content"];
        $post->slug = \Str::slug(request('title').\Str::random(3));
        $post->tags_id = $request["tags_id"];
        $post->image = $imageName;
        $post->author = Auth::user()->name;
 
        $nm->move(public_path().'/image', $imageName);
        $post->save();


        return redirect('post')->with('message', 'Data berhasil disimpan');
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
        $tags = Tag::all();
        $data = Post::with('tags')->findOrFail($id);
        return view('post.edit', compact('data', 'tags'));
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
        $change = Post::findorfail($id);
        $before = $change->image;
        
        $post = [
            'title' => $request['title'],
            'tags_id' => $request['tags_id'],
            'slug' => \Str::slug(request('title').\Str::random(3)),
            'content' => $request['content'],
            'image' => $before,
        ];

        if($request->hasFile('image')){
            $request->image->move(public_path().'/image', $before);
       }

        $change->update($post);

        return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findorfail($id);
        $post->delete();
        return back();
    }


}
