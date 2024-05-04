<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FAQ;


class FAQController extends Controller
{
    public function index()
    {
        $faq = FAQ::all();
        $faq = faq::paginate(10);


        return view('page.content-faq.index', compact('faq'));
    }

    public function create()
    {
        return view('page.content-faq.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);
        
        $input = $request->all();
        faq::create($input);

        return redirect()->route('faq.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function show(string $id)
    {
        $faq = faq::findOrFail($id);

        //render view with post
        return view('page.content-faq.show', compact('faq'));
    }

    public function edit(faq $faq)
    {
        return view('page.content-faq.edit', compact('faq'));
    }

    public function update(Request $request, faq $faq)
    {

        $request->validate([
            'question' => 'required|string',
            'answer' => 'required|string',
        ]);

        $input = $request->all();
        $faq->update($input);

        return redirect()->route('faq.index')
            ->with('success', 'FAQ updated successfully');
    }

    public function destroy(faq $faq)
    {
        $faq->delete();

        return redirect()->route('faq.index')
            ->with('success', 'FAQ deleted successfully');
    }
}
