<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    use HasFactory;

    protected $primaryKey = 'financial_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'franchise_id',
        'cash_required',
        'net_worth_required',
        'total_investment_low',
        'total_investment_high',
        'franchise_fee',
        'royalty_fee',
        'ad_fund_fee',
        'average_unit_volume',
        'affiliate_revenue',
        'initial_fee_one_unit',
        'initial_fee_two_units',
        'initial_fee_three_units',
        // 'capital_expenditure_items',
        'referral_fee_single_unit',
        'referral_fee_multi_unit',
        'referral_fee_bonus',
        'referral_fee_bonus_amount',
        'resale_referral_fee_amount',
    ];

    public function franchise()
    {
        return $this->belongsTo(Franchise::class, 'franchise_id', 'franchise_id');
    }
}
