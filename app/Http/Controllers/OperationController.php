<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers;

use App\Models\Operation;
use App\Models\Franchise;
use Illuminate\Http\Request;

class OperationController extends Controller
{
    public function index()
    {
        $operations = Operation::with('franchise')->latest()->get();
        return view('operations.index', compact('operations'));
    }

    public function create()
    {
        $franchises = Franchise::all();
        return view('operations.create', compact('franchises'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'franchise_id' => 'required|exists:franchises,franchise_id',
            'immigration_friendly' => 'boolean',
            'veteran_incentives' => 'boolean',
            'day_in_the_life' => 'nullable|string',
            'territory_description' => 'nullable|string',
            'customer_base' => 'nullable|string',
            'scalability' => 'nullable|string',
            'owner_involvement' => 'nullable|string',
            'recession_strength' => 'nullable|string',
            'b2b_or_b2c' => 'nullable|in:B2B,B2C',
            'home_based' => 'boolean',
            'business_hours' => 'nullable|string',
            'competition' => 'nullable|string',
            'history_narrative' => 'nullable|string',
            'services_income_streams' => 'nullable|string',
            'number_type_employees' => 'nullable|string',
            'real_estate_description' => 'nullable|string',
        ]);

        Operation::create($data);
        return redirect()->route('operations.index')->with('success', 'Operation info saved.');
    }

    public function edit($id)
    {
        $operation = Operation::findOrFail($id);
        $franchises = Franchise::all();
        return view('operations.edit', compact('operation', 'franchises'));
    }

    public function update(Request $request, $id)
    {
        $operation = Operation::findOrFail($id);

        $data = $request->validate([
            'franchise_id' => 'required|exists:franchises,franchise_id',
            'immigration_friendly' => 'boolean',
            'veteran_incentives' => 'boolean',
            'day_in_the_life' => 'nullable|string',
            'territory_description' => 'nullable|string',
            'customer_base' => 'nullable|string',
            'scalability' => 'nullable|string',
            'owner_involvement' => 'nullable|string',
            'recession_strength' => 'nullable|string',
            'b2b_or_b2c' => 'nullable|in:B2B,B2C',
            'home_based' => 'boolean',
            'business_hours' => 'nullable|string',
            'competition' => 'nullable|string',
            'history_narrative' => 'nullable|string',
            'services_income_streams' => 'nullable|string',
            'number_type_employees' => 'nullable|string',
            'real_estate_description' => 'nullable|string',
        ]);

        $operation->update($data);
        return redirect()->route('operations.index')->with('success', 'Operation info updated.');
    }

    public function destroy($id)
    {
        $operation = Operation::findOrFail($id);
        $operation->delete();

        return redirect()->route('operations.index')->with('success', 'Operation info deleted.');
    }
}