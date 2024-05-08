<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Jenis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;



class PortfolioController extends Controller
{
    public function index()
    {
        $portofolio = Portfolio::all();
        $portofolio = Portfolio::paginate(3);

        return view('portfolio.index', compact('portofolio'));
    }

    public function create()
    {

        $tagJenis = Jenis::all();
        return view('portfolio.create', compact('tagJenis'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'name' => 'required|min:5',
            'jenis_tag_id' => 'required|int',
            'description' => 'required|string',
        ]);

        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'images/portfolio/';
            $profileImage = "portofolio" . "-" . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $destinationPath . $profileImage;
        }

        Portfolio::create($input);

        return redirect()->route('portfolio.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id)
    {
        $portofolio = Portfolio::findOrFail($id);
        $tagJenis = Jenis::find($portofolio->jenis_tag_id);

        //render view with post
        return view('portfolio.view', compact('portofolio', 'tagJenis'));
    }

    public function edit(Portfolio $portfolio)
    {
        $tagJenisPortfolio = Jenis::all();
        $tagJenis = Jenis::find($portfolio->jenis_tag_id);
        return view('portfolio.update', compact('portfolio', 'tagJenis', 'tagJenisPortfolio'));
    }

    public function update(Request $request, Portfolio $portfolio)
    {
        $request->validate([
            'image' => ($request->hasFile('image') || !$portfolio->image) ? 'image|mimes:jpeg,jpg,png|max:2048' : '',
            'name' => 'required|min:5',
            'jenis_tag_id' => 'required|int',
            'description' => 'required|string',
        ]);

        $input = $request->all();

        if (!empty($portfolio->image) && $request->hasFile('image')) {
            $imagePath = $portfolio->image;

            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        if ($image = $request->file('image')) {
            $destinationPath = 'images/portfolio/';
            $profileImage = "portofolio" . "-" . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = $destinationPath . $profileImage;
        } else {
            unset($input['image']);
        }

        $portfolio->update($input);

        return redirect()->route('portfolio.index')
            ->with('success', 'Portfolio updated successfully');
    }

    public function destroy(Portfolio $portfolio)
    {
        if (!empty($portfolio->image)) {
            $imagePath = $portfolio->image;

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $portfolio->delete();

        return redirect()->route('portfolio.index')
            ->with('success', 'Portfolio deleted successfully');
    }
}