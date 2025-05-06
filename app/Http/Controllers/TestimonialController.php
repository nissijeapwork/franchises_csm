<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Franchise;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::with('franchise')->latest()->get();
        return view('testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        $franchises = Franchise::all();
        return view('testimonials.create', compact('franchises'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'franchise_id' => 'required|exists:franchises,franchise_id',
            'author_name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'quote' => 'required|string',
        ]);

        Testimonial::create($validated);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial added successfully.');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $franchises = Franchise::all();
        return view('testimonials.edit', compact('testimonial', 'franchises'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $validated = $request->validate([
            'franchise_id' => 'required|exists:franchises,franchise_id',
            'author_name' => 'required|string|max:255',
            'location' => 'nullable|string|max:255',
            'quote' => 'required|string',
        ]);

        $testimonial->update($validated);

        return redirect()->route('testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->route('testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
