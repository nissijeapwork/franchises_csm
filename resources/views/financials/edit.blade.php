@extends('layouts.app')
@section('title', 'Edit Financial')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit Financial Record</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="{{ route('financials.index') }}">Financials</a></li>
                                <li class="breadcrumb-item active">Edit</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <form method="POST" action="{{ route('financials.update', $financial->financial_id) }}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Franchise</label>
                                    <div class="col-md-10">
                                        <select name="franchise_id" class="form-control" required>
                                            <option value="">Select a franchise</option>
                                            @foreach($franchises as $franchise)
                                                <option value="{{ $franchise->franchise_id }}" {{ $franchise->franchise_id == $financial->franchise_id ? 'selected' : '' }}>{{ $franchise->franchise_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                @foreach ([
                                    'cash_required' => 'Cash Required',
                                    'net_worth_required' => 'Net Worth Required',
                                    'total_investment_low' => 'Investment Range (Low)',
                                    'total_investment_high' => 'Investment Range (High)',
                                    'franchise_fee' => 'Franchise Fee',
                                    'royalty_fee' => 'Royalty Fee (%)',
                                    'ad_fund_fee' => 'Ad Fund Fee (%)',
                                    'average_unit_volume' => 'Average Unit Volume',
                                    'affiliate_revenue' => 'Affiliate Revenue',
                                    'initial_fee_one_unit' => 'Initial Franchise Fee (One Unit)',
                                    'initial_fee_two_units' => 'Initial Franchise Fee (Two Units)',
                                    'initial_fee_three_units' => 'Initial Franchise Fee (Three Units)',
                                    'referral_fee_single_unit' => 'Referral Fee Single Unit',
                                    'referral_fee_multi_unit' => 'Referral Fee Multi Unit',
                                    'referral_fee_bonus_amount' => 'Referral Fee Bonus Amount',
                                    'resale_referral_fee_amount' => 'Resale Referral Fee Amount'
                                ] as $name => $label)
                                    <div class="mb-3 row">
                                        <label class="col-md-2 col-form-label">{{ $label }}</label>
                                        <div class="col-md-10">
                                            <input type="number" step="0.01" name="{{ $name }}" class="form-control" value="{{ old($name, $financial->$name) }}">
                                        </div>
                                    </div>
                                @endforeach

                                <div class="mb-3 row">
                                    <label class="col-md-2 col-form-label">Referral Fee Bonus</label>
                                    <div class="col-md-10">
                                        <select name="referral_fee_bonus" class="form-control">
                                            <option value="0" {{ $financial->referral_fee_bonus == 0 ? 'selected' : '' }}>No</option>
                                            <option value="1" {{ $financial->referral_fee_bonus == 1 ? 'selected' : '' }}>Yes</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
