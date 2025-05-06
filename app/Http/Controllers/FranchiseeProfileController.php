<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FranchiseeProfile;
use App\Models\Franchise;

class FranchiseeProfileController extends Controller
{
    public function index()
    {
        $profiles = FranchiseeProfile::with('franchise')->latest()->get();
        return view('franchisee_profiles.index', compact('profiles'));
    }

    public function create()
    {
        $franchises = Franchise::all();
        return view('franchisee_profiles.create', compact('franchises'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'franchise_id' => 'required|exists:franchises,franchise_id',
            'ideal_candidate_traits' => 'required|string',
            'training_support_description' => 'required|string',
            'veteran_discount' => 'required|boolean',
            'available_states' => 'nullable|string',
            'store_opening_support_description' => 'nullable|string',
        ]);

        FranchiseeProfile::create($validated);

        return redirect()->route('franchisee_profiles.index')->with('success', 'Franchisee profile created successfully.');
    }

    public function edit($id)
    {
        $profile = FranchiseeProfile::findOrFail($id);
        $franchises = Franchise::all();
        return view('franchisee_profiles.edit', compact('profile', 'franchises'));
    }

    public function update(Request $request, $id)
    {
        $profile = FranchiseeProfile::findOrFail($id);

        $validated = $request->validate([
            'franchise_id' => 'required|exists:franchises,franchise_id',
            'ideal_candidate_traits' => 'required|string',
            'training_support_description' => 'required|string',
            'veteran_discount' => 'required|boolean',
            'available_states' => 'nullable|string',
            'store_opening_support_description' => 'nullable|string',
        ]);

        $profile->update($validated);

        return redirect()->route('franchisee_profiles.index')->with('success', 'Franchisee profile updated successfully.');
    }

    public function destroy($id)
    {
        $profile = FranchiseeProfile::findOrFail($id);
        $profile->delete();

        return redirect()->route('franchisee_profiles.index')->with('success', 'Franchisee profile deleted successfully.');
    }
}
