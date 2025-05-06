<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    use HasFactory;

    protected $fillable = [
        'franchise_id',
        'immigration_friendly',
        'veteran_incentives',
        'day_in_the_life',
        'territory_description',
        'customer_base',
        'scalability',
        'owner_involvement',
        'recession_strength',
        'b2b_or_b2c',
        'home_based',
        'business_hours',
        'competition',
        'history_narrative',
        'services_income_streams',
        'number_type_employees',
        'real_estate_description',
    ];

    public function franchise()
    {
        return $this->belongsTo(Franchise::class, 'franchise_id');
    }
}
