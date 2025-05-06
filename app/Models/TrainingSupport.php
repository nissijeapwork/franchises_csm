<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingSupport extends Model
{
    use HasFactory;

    protected $table = 'training_support';
    public $incrementing = true;
    protected $keyType = 'int';
    
    protected $fillable = [
        'franchise_id',
        'training_support',
        'technology_tools',
        'lease_negotiation_assistance',
        'staff_recruiting_assistance',
        'digital_marketing_assistance',
        'call_center_assistance',
        'site_selection_assistance',
        'health_insurance_programs',
        'financing_provided',
    ];
    

    public function franchise()
    {
        return $this->belongsTo(Franchise::class, 'franchise_id');
    }
}

