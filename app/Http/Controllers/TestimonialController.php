<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;


class TestimonialController extends Controller
{
    public function index()
    {
        $testimonial = Testimonial::all();
        $testimonial = Testimonial::paginate(10);


        return view('testimonial.index', compact('testimonial'));
    }

    public function create()
    {
        return view('testimonial.create');
    }

    public function store(Request $request)
    {
        // Validate the request
        $this->validate($request, [
            'name' => 'required|min:5',
            'description' => 'required|string',
            'rate' => 'required|integer|min:1|max:5',
        ]);

        // Convert 'rating' to an integer
        $input = $request->all();
        $input['rate'] = intval($request->input('rate'));

        // Create the testimonial
        Testimonial::create($input);

        // Redirect with success message
        return redirect()->route('testimonial.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    public function show(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        //render view with post
        return view('testimonial.view', compact('testimonial'));
    }

    public function edit(Testimonial $testimonial)
    {
        
        return view('testimonial.update', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {

        $selectedRating = $request->input('rate');
        $rate = intval($selectedRating);

        $request->validate([
            'name' => 'required|min:5',
            'description' => 'required|string',
            'rate' => 'required|integer|min:1|max:5' . $rate,
        ]);

        $input = $request->all();
        $testimonial->update($input);

        return redirect()->route('testimonial.index')
            ->with('success', 'Testimonial updated successfully');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();

        return redirect()->route('testimonial.index')
            ->with('success', 'Testimonial deleted successfully');
    }
}