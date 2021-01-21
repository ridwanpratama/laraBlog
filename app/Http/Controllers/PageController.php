<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{

    public function index()
    {
        $post = Post::latest()->paginate(5);
        $tags = Tag::all();
        return view('page.content', compact('post', 'tags'));
    }

  
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $tags = Tag::all();
        $related_post = Post::latest()->limit(4)->get();
        // $count = DB::table('tags')->where('id', $id)->count();

        return view('page.detail', compact('post', 'tags', 'related_post'));
    }

    public function post_tags(Tag $id)
    {

        // $tags = Tag::find($id);
        return DB::table('tags')
        ->join('posts','posts.tags_id', 'tags.id')
        ->get();
        // return view('page.show', compact('tags', 'post'));
    }


}
