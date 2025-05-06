<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\Franchise;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::with('franchise')->latest()->get();
        return view('resources.index', compact('resources'));
    }

    public function create()
    {
        $franchises = Franchise::all();
        return view('resources.create', compact('franchises'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'franchise_id' => 'required|exists:franchises,franchise_id',
            'fdd_pdf_url' => 'nullable|file|mimes:pdf|max:20480', 
            'franchise_comparisons' => 'nullable|string',
        ]);
    
        if ($request->hasFile('fdd_pdf_url')) {
            $file = $request->file('fdd_pdf_url');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads/resources', $filename, 'public');
            $validated['fdd_pdf_url'] = $filename;
        }
    
        Resource::create($validated);
    
        return redirect()->route('resources.index')->with('success', 'Resource created successfully.');
    }
    

    public function edit($id)
    {
        $resource = Resource::findOrFail($id);
        $franchises = Franchise::all();
        return view('resources.edit', compact('resource', 'franchises'));
    }

    public function update(Request $request, $id)
    {
        $resource = Resource::findOrFail($id);

        $validated = $request->validate([
            'franchise_id' => 'required|exists:franchises,franchise_id',
            'fdd_pdf_url' => 'nullable|url|max:255',
            'franchise_comparisons' => 'nullable|string',
        ]);

        $resource->update($validated);

        return redirect()->route('resources.index')->with('success', 'Resource updated successfully.');
    }

    public function destroy($id)
    {
        $resource = Resource::findOrFail($id);
        $resource->delete();

        return redirect()->route('resources.index')->with('success', 'Resource deleted successfully.');
    }
}
