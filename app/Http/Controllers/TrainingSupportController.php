<?php

namespace App\Http\Controllers;

use App\Models\TrainingSupport;
use App\Models\Franchise;
use Illuminate\Http\Request;

class TrainingSupportController extends Controller
{
    public function index()
    {
        $trainingSupports = TrainingSupport::with('franchise')->latest()->get();
        return view('training_support.index', compact('trainingSupports'));
    }
    

    public function create()
    {
        $franchises = Franchise::all();
        return view('training_support.create', compact('franchises'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'franchise_id' => 'required|exists:franchises,franchise_id',
            'training_support' => 'nullable|string',
            'technology_tools' => 'nullable|string',
            'lease_negotiation_assistance' => 'boolean',
            'staff_recruiting_assistance' => 'boolean',
            'digital_marketing_assistance' => 'boolean',
            'call_center_assistance' => 'boolean',
            'site_selection_assistance' => 'boolean',
            'health_insurance_programs' => 'boolean',
            'financing_provided' => 'boolean',
        ]);

        TrainingSupport::create($validated);
        return redirect()->route('training_support.index')->with('success', 'Training support added.');
    }

    public function edit($id)
    {
        $trainingSupport = TrainingSupport::findOrFail($id);
        $franchises = Franchise::all();
        return view('training_support.edit', compact('trainingSupport', 'franchises'));
    }

    public function update(Request $request, $id)
    {
        $support = TrainingSupport::findOrFail($id);

        $validated = $request->validate([
            'franchise_id' => 'required|exists:franchises,franchise_id',
            'training_support' => 'nullable|string',
            'technology_tools' => 'nullable|string',
            'lease_negotiation_assistance' => 'boolean',
            'staff_recruiting_assistance' => 'boolean',
            'digital_marketing_assistance' => 'boolean',
            'call_center_assistance' => 'boolean',
            'site_selection_assistance' => 'boolean',
            'health_insurance_programs' => 'boolean',
            'financing_provided' => 'boolean',
        ]);

        $support->update($validated);
        return redirect()->route('training_support.index')->with('success', 'Training support updated.');
    }

    public function destroy($id)
    {
        $support = TrainingSupport::findOrFail($id);
        $support->delete();

        return redirect()->route('training_support.index')->with('success', 'Record deleted.');
    }
}
