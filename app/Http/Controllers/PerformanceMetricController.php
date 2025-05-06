<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerformanceMetric;
use App\Models\Franchise;

class PerformanceMetricController extends Controller
{
    public function index()
    {
        $metrics = PerformanceMetric::with('franchise')->latest()->get();
        return view('metrics.index', compact('metrics'));
    }

    public function create()
    {
        $franchises = Franchise::all();
        return view('metrics.create', compact('franchises'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'franchise_id' => 'required|exists:franchises,franchise_id',
            'number_of_units' => 'required|integer|min:0',
            'new_units_opened_last_year' => 'required|integer|min:0',
            'growth_score' => 'nullable|numeric|min:0|max:100',
            'turnover_score' => 'nullable|numeric|min:0|max:100',
            'unit_trend_chart_data' => 'nullable|string',
        ]);

        PerformanceMetric::create($validated);

        return redirect()->route('metrics.index')->with('success', 'Performance metric added successfully.');
    }

    public function edit($id)
    {
        $metric = PerformanceMetric::findOrFail($id);
        $franchises = Franchise::all();
        return view('metrics.edit', compact('metric', 'franchises'));
    }

    public function update(Request $request, $id)
    {
        $metric = PerformanceMetric::findOrFail($id);

        $validated = $request->validate([
            'franchise_id' => 'required|exists:franchises,franchise_id',
            'number_of_units' => 'required|integer|min:0',
            'new_units_opened_last_year' => 'required|integer|min:0',
            'growth_score' => 'nullable|numeric|min:0|max:100',
            'turnover_score' => 'nullable|numeric|min:0|max:100',
            'unit_trend_chart_data' => 'nullable|string',
        ]);

        $metric->update($validated);

        return redirect()->route('metrics.index')->with('success', 'Performance metric updated successfully.');
    }

    public function destroy($id)
    {
        $metric = PerformanceMetric::findOrFail($id);
        $metric->delete();

        return redirect()->route('metrics.index')->with('success', 'Performance metric deleted successfully.');
    }
}
