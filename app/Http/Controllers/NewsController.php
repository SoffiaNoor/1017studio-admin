<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\TagBerita;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $berita = Berita::all();
        $berita = Berita::paginate(3);


        return view('news.index', compact('berita'));
    }

    public function create()
    {
        $tagBerita = TagBerita::all();
        return view('news.create', compact('tagBerita'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'name' => 'required|min:5',
            'description' => 'required|string',
            'author' => 'required|string',
            'berita_tag' => 'required',
        ]);

        var_dump($input = $request->all());

        $input = $request->all();

        // Process the selected options from the multiselect dropdown
        $beritaTags = implode(',', $request->berita_tag);


        if ($image = $request->file('image')) {
            $destinationPath = 'images/news/';
            $profileImage = "news" . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $profileImage;
        }

        // Assign the concatenated IDs to the input array
        $input['berita_tag'] = $beritaTags;

        Berita::create($input);

        return redirect()->route('news.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function show(string $id)
    {
        $berita = Berita::findOrFail($id);
        $tagBerita = TagBerita::find($berita->berita_tag_id);

        //render view with post
        return view('news.show', compact('berita', 'tagBerita'));
    }

    public function edit(Berita $berita)
    {
        $tagBerita = TagBerita::all();
        $tagJenis = TagBerita::find($berita->berita_tag_id);
        return view('news.edit', compact('berita', 'tagBerita', 'tagJenis'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'name' => 'required|min:5',
            'berita_tag_id' => 'required|int',
            'description' => 'required|string',
            'author' => 'required|string',
        ]);

        $input = $request->all();

        if ($image = $request->file('image')) {
            $destinationPath = 'images/news/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }

        $berita->update($input);

        return redirect()->route('news.index')
            ->with('success', 'News updated successfully');
    }

    public function destroy(Berita $berita)
    {
        $berita->delete();

        return redirect()->route('news.index')
            ->with('success', 'News deleted successfully');
    }
}