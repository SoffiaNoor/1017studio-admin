<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontak;

class ContactController extends Controller
{

    public function index()
    {
        $contact = Kontak::all();
        $contact = Kontak::paginate(10);


        return view('page.contact.index', compact('contact'));
    }

    public function show(string $id)
    {
        $contact = Kontak::findOrFail($id);
        return view('page.contact.show', compact('contact'));
    }

    public function edit(Kontak $contact)
    {
        return view('page.contact.edit', compact('contact'));
    }

    public function update(Request $request, Kontak $contact)
    {
        $request->validate([
            'status' => 'required|integer',
        ]);

        $input = $request->all();
        $contact->update($input);

        return redirect()->route('contact.index')
            ->with('success', 'Status updated successfully');
    }
}
