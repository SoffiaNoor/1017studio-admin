<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\TagBerita;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        $news = News::paginate(3);


        return view('news.index', compact('news'));
    }

    public function create()
    {
        $tagNews = TagBerita::all();
        return view('news.create', compact('tagNews'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'photo' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title' => 'required|min:5',
            'description' => 'required|string',
            'author' => 'required|string',
            'berita_tag' => 'required|array',
        ]);

        $input = $request->all();

        if ($image = $request->file('photo')) { // Change 'image' to 'photo'
            $destinationPath = 'images/news/';
            $profileImage = "news" . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['photo'] = $destinationPath . $profileImage; // Change 'image' to 'photo'
        }

        // Convert the array to a comma-separated string
        $newsTagString = implode(',', $input['berita_tag']);
        $input['berita_tag'] = $newsTagString;

        News::create($input);

        return redirect()->route('news.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }




    public function show(string $id)
    {
        $news = News::findOrFail($id);
        $tagNews = TagBerita::all();

        //render view with post
        return view('news.view', compact('news', 'tagNews'));
    }

    public function edit($id)
    {
        $news = News::findOrFail($id); // Fetch the news item by ID
        $tagNews = TagBerita::all(); // Assuming you have a model for TagBerita

        return view('news.update', compact('news', 'tagNews')); // Pass the news item and tag options to the view
    }


    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|max:255',
            'photo' => ($request->hasFile('photo') || !$news->photo) ? 'image|mimes:jpeg,jpg,png|max:2048' : '',
            'description' => 'required|string',
            'author' => 'required|string',
            'berita_tag' => 'required|array',
        ], [
            'title.required' => 'Title is required.',
            'title.max' => 'Title should not exceed 255 characters.',
            'photo.required' => 'Image is required.',
            'description.required' => 'Detail is required.',
            'description.max' => 'Detail should not exceed 255 characters.',
            'author.required' => 'Author is required.',
            'author.max' => 'Author should not exceed 255 characters.',
            'berita_tag.required' => 'News tag is required.',
        ]);

        $input = $request->except(['_token', '_method']);

        if (!empty($news->photo) && $request->hasFile('photo')) {
            $imagePath = $news->photo;

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $destinationPath = 'images/news/';
            $profileImage = "news" . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['photo'] = $destinationPath . $profileImage;
        }

        $newsTagString = implode(',', $input['berita_tag']);
        $input['berita_tag'] = $newsTagString;

        $updated = $news->update($input);

        if ($updated) {
            return redirect()->route('news.index')->with(['success' => 'Data Berhasil Diperbarui!']);
        } else {
            return redirect()->back()->with(['error' => 'Gagal memperbarui data.']);
        }
    }



    public function destroy(News $news)
    {
        if (!empty($news->photo)) {
            $imagePath = $news->photo;

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $news->delete();

        return redirect()->route('news.index')
            ->with('success', 'News deleted successfully');
    }
}