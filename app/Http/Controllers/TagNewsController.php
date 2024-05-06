<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TagBerita;


class TagNewsController extends Controller
{
    public function index()
    {
        $tag_news = TagBerita::all();
        $tag_news = TagBerita::paginate(10);


        return view('tag_news.index', compact('tag_news'));
    }

    public function create()
    {
        return view('tag_news.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string',
        ]);

        $input = $request->all();
        TagBerita::create($input);

        return redirect()->route('tag_news.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id)
    {
        $tag_news = TagBerita::findOrFail($id);

        //render view with post
        return view('tag_news.view', compact('tag_news'));
    }

    public function edit(TagBerita $tag_news)
    {
        return view('tag_news.update', compact('tag_news'));
    }

    public function update(Request $request, TagBerita $tag_news)
    {

        $request->validate([
            'name' => 'required|string',
        ]);

        $input = $request->all();
        $tag_news->update($input);

        return redirect()->route('tag_news.index')
            ->with('success', 'News tag updated successfully');
    }

    public function destroy(TagBerita $tag_news)
    {
        $tag_news->delete();

        return redirect()->route('tag_news.index')
            ->with('success', 'News Tag deleted successfully');
    }
}
