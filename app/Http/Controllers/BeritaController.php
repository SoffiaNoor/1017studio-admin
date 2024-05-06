<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use App\Models\TagBerita;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::all();
        $berita = Berita::paginate(3);


        return view('berita.index', compact('berita'));
    }

    public function create()
    {
        $tagBerita = TagBerita::all();
        return view('berita.create', compact('tagBerita'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|image|mimes:jpeg,jpg,png',
            'title' => 'required',
            'description' => 'required|string',
            'author' => 'required|string',
        ]);

        $input = $request->all();

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/berita/';
            $profileImage = "berita" . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['photo'] = $profileImage;
        }

        Berita::create($input);

        return redirect()->route('berita.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }



    public function show(string $id)
    {
        $berita = Berita::findOrFail($id);
        $tagBerita = TagBerita::find($berita->berita_tag_id);

        //render view with post
        return view('berita.show', compact('berita', 'tagBerita'));
    }

    public function edit(Berita $news)
    {
        $tagBerita = TagBerita::all(); // Assuming you also need tag data

        return view('news.update', compact('news', 'tagBerita'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'photo' => 'image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|min:5',
            'description' => 'required|string',
            'author' => 'required|string',
            'berita_tag' => 'required',
        ]);

        $input = $request->except('_token', '_method');

        // Fetch the news item from the database
        $news = Berita::findOrFail($id);

        if (!empty($news->photo) && $request->hasFile('photo')) {
            // Delete the old photo if a new one is uploaded
            $imagePath = public_path('images/news/' . $news->photo);

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/news/';
            $profileImage = "news" . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['photo'] = $profileImage;
        }

        $categoryIds = explode(',', $input['berita_tag']);

        // Update the news item with the new input data
        $news->update($input);

        // Sync the categories associated with the news item
        $news->categories()->sync($categoryIds);

        return redirect()->route('news.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }



    public function destroy(Berita $berita)
    {
        $berita->delete();

        return redirect()->route('berita.index')
            ->with('success', 'Berita deleted successfully');
    }
}