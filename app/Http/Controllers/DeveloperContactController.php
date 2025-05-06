<?php

namespace App\Http\Controllers;

use App\Models\DeveloperContact;
use App\Models\Franchise;
use Illuminate\Http\Request;

class DeveloperContactController extends Controller
{
    public function index()
    {
        $developerContacts = DeveloperContact::with('franchise')->latest()->get();
        return view('developers.index', compact('developerContacts'));
    }

    public function create()
    {
        $franchises = Franchise::orderBy('franchise_name')->get();
        return view('developers.create', compact('franchises'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'franchise_id' => 'required|exists:franchises,franchise_id',
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'mobile' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'corporate_address' => 'nullable|string',
        ]);

        DeveloperContact::create($validated);

        return redirect()->route('developers.index')->with('success', 'Developer contact created successfully.');
    }

    public function edit($id)
    {
        $developerContact = DeveloperContact::findOrFail($id);
        $franchises = Franchise::orderBy('franchise_name')->get();
        return view('developers.edit', compact('developerContact', 'franchises'));
    }

    public function update(Request $request, $id)
    {
        $developerContact = DeveloperContact::findOrFail($id);

        $validated = $request->validate([
            'franchise_id' => 'required|exists:franchises,franchise_id',
            'name' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:50',
            'mobile' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:255',
            'corporate_address' => 'nullable|string',
        ]);

        $developerContact->update($validated);

        return redirect()->route('developers.index')->with('success', 'Developer contact updated successfully.');
    }

    public function destroy($id)
    {
        $developerContact = DeveloperContact::findOrFail($id);
        $developerContact->delete();

        return redirect()->route('developers.index')->with('success', 'Developer contact deleted successfully.');
    }
}
