<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerformanceMetric extends Model
{
    use HasFactory;

    protected $primaryKey = 'metric_id';
    public $incrementing = true;
    protected $keyType = 'int';
    
    protected $fillable = [
        'franchise_id',
        'number_of_units',
        'new_units_opened_last_year',
        'growth_score',
        'turnover_score',
        'unit_trend_chart_data',
    ];

    /**
     * A performance metric belongs to a franchise.
     */
    public function franchise()
    {
        return $this->belongsTo(Franchise::class, 'franchise_id', 'franchise_id');
    }
}
