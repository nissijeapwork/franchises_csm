<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Financial;
use App\Models\Franchise;

class FinancialController extends Controller
{
    public function index()
    {
        $financials = Financial::with('franchise')->latest()->get();
        return view('financials.index', compact('financials'));
    }

    public function create()
    {
        $franchises = Franchise::all();
        return view('financials.create', compact('franchises'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'franchise_id' => 'required|exists:franchises,franchise_id',
            'cash_required' => 'nullable|numeric',
            'net_worth_required' => 'nullable|numeric',
            'total_investment_low' => 'nullable|numeric',
            'total_investment_high' => 'nullable|numeric',
            'franchise_fee' => 'nullable|numeric',
            'royalty_fee' => 'nullable|numeric',
            'ad_fund_fee' => 'nullable|numeric',
            'average_unit_volume' => 'nullable|numeric',
            'affiliate_revenue' => 'nullable|numeric',
            'initial_fee_one_unit' => 'nullable|numeric',
            'initial_fee_two_units' => 'nullable|numeric',
            'initial_fee_three_units' => 'nullable|numeric',
            'referral_fee_single_unit' => 'nullable|numeric',
            'referral_fee_multi_unit' => 'nullable|numeric',
            'referral_fee_bonus' => 'nullable|boolean',
            'referral_fee_bonus_amount' => 'nullable|numeric',
            'resale_referral_fee_amount' => 'nullable|numeric',
        ]);
    
        Financial::create($validated);
    
        return redirect()->route('financials.index')->with('success', 'Financial details added successfully.');
    }
    

    public function edit($id)
    {
        $financial = Financial::findOrFail($id);
        $franchises = Franchise::all();
        return view('financials.edit', compact('financial', 'franchises'));
    }

    public function update(Request $request, $id)
    {
        $financial = Financial::findOrFail($id);

        $validated = $request->validate([
            'franchise_id' => 'required|exists:franchises,franchise_id',
            'cash_required' => 'nullable|numeric',
            'net_worth_required' => 'nullable|numeric',
            'total_investment_low' => 'nullable|numeric',
            'total_investment_high' => 'nullable|numeric',
            'franchise_fee' => 'nullable|numeric',
            'royalty_fee' => 'nullable|numeric',
            'ad_fund_fee' => 'nullable|numeric',
            'average_unit_volume' => 'nullable|numeric',
            'affiliate_revenue' => 'nullable|numeric',
            'initial_fee_one_unit' => 'nullable|numeric',
            'initial_fee_two_units' => 'nullable|numeric',
            'initial_fee_three_units' => 'nullable|numeric',
            'referral_fee_single_unit' => 'nullable|numeric',
            'referral_fee_multi_unit' => 'nullable|numeric',
            'referral_fee_bonus' => 'nullable|boolean',
            'referral_fee_bonus_amount' => 'nullable|numeric',
            'resale_referral_fee_amount' => 'nullable|numeric',
        ]);

        $financial->update($validated);

        return redirect()->route('financials.index')->with('success', 'Financial details updated successfully.');
    }

    public function destroy($id)
    {
        $financial = Financial::findOrFail($id);
        $financial->delete();

        return redirect()->route('financials.index')->with('success', 'Financial record deleted successfully.');
    }
}
