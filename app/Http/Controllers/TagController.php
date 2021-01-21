<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $data = Tag::latest()->get();
	    return view ('tags.index')->withData($data);
    }

    public function create()
    {
        return view('tags.create');
    }

    public function store(Request $request)
    {
        Tag::create([
            'tags' => $request->tags,
        ]);

        return redirect('tags')->with('message', 'Data berhasil disimpan');
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('tags.edit', ['tag' => $tag]);
    }

    public function update(Request $request, $id)
    {
        $tag = Tag::findorfail($id);
        $tag->update($request->all());
        return redirect('tags')->with('message', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $tag = Tag::findorfail($id);
        $tag->delete();
        return back()->with('delete', 'Data berhasil dihapus');
    }
}
