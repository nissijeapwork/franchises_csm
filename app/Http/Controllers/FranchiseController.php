<?php

namespace App\Http\Controllers;

use App\Models\Franchise;
use App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FranchiseController extends Controller
{
    public function index()
    {
        $franchises = Franchise::latest()->get();
        return view('franchises.index', compact('franchises'));
    }

    public function create()
    {
        $industries = Industry::orderBy('name')->get();
        return view('franchises.create', compact('industries'));
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads', $filename);
    
            return response()->json(['filename' => $filename]);
        }
    
        return response()->json(['error' => 'No file uploaded.'], 400);
    }
    


    public function store(Request $request)
    {
        $validated = $request->validate([
            'franchise_name' => 'required|max:255',
            'slug_url' => 'required|unique:franchises,slug_url',
            'logo_url' => 'nullable|string|max:255',
            'tagline' => 'nullable|max:255',
            'industry_id' => 'nullable|exists:industries,id',
            'founded_year' => 'nullable|digits:4|integer',
            'franchising_since' => 'nullable|digits:4|integer',
            'hq_location' => 'nullable|max:255',
            'ceo_name' => 'nullable|max:255',
            'description_long' => 'nullable',
            'website_url' => 'nullable|url',
            'featured_image' => 'nullable|string|max:255',
            'significant_capital_expenditure_items' => 'nullable',
            'franchise_agreement_term' => 'nullable',
            'youtube_channel' => 'nullable|url',
            'business_model' => 'nullable|string',
            'investor_executive_model' => 'boolean',
            'sub_contractor_model' => 'boolean',
            'keep_my_job' => 'boolean',
        ]);

        if (empty($validated['industry_id'])) {
            $validated['industry_id'] = Industry::where('name', 'automotive')->value('id');
        }

        $validated['slug_url'] = Str::slug($validated['slug_url']);

        Franchise::create($validated);

        return redirect()->route('franchises.index')->with('success', 'Franchise created successfully.');
    }

    


    public function edit($id)
    {
        $franchise = Franchise::findOrFail($id);
        $industries = Industry::all();
        return view('franchises.edit', compact('franchise', 'industries'));
    }
    

    public function update(Request $request, $id)
    {
        $franchise = Franchise::findOrFail($id);

        $validated = $request->validate([
            'franchise_name' => 'required|max:255',
            'slug_url' => 'required|unique:franchises,slug_url,' . $franchise->franchise_id . ',franchise_id',
            'logo_url' => 'nullable|string|max:255',
            'tagline' => 'nullable|max:255',
            'industry_id' => 'nullable|exists:industries,id',
            'founded_year' => 'nullable|digits:4|integer',
            'franchising_since' => 'nullable|digits:4|integer',
            'hq_location' => 'nullable|max:255',
            'ceo_name' => 'nullable|max:255',
            'description_long' => 'nullable',
            'website_url' => 'nullable|url',
            'featured_image' => 'nullable|string|max:255',
            'significant_capital_expenditure_items' => 'nullable',
            'franchise_agreement_term' => 'nullable',
            'youtube_channel' => 'nullable|url',
            'business_model' => 'nullable|string',
            'investor_executive_model' => 'boolean',
            'sub_contractor_model' => 'boolean',
            'keep_my_job' => 'boolean',
        ]);

        $validated['slug_url'] = Str::slug($validated['slug_url']);

        $franchise->update($validated);

        return redirect()->route('franchises.index')->with('success', 'Franchise updated successfully.');
    }



    public function destroy($id)
    {
        $franchise = Franchise::findOrFail($id);
        $franchise->delete();

        return redirect()->route('franchises.index')->with('success', 'Franchise deleted successfully.');
    }
}
