<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Industry;


class Franchise extends Model
{
    use HasFactory;

    protected $primaryKey = 'franchise_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'franchise_name',
        'slug_url',
        'logo_url',
        'tagline',
        'industry_id', 
        'founded_year',
        'franchising_since',
        'hq_location',
        'ceo_name',
        'description_long',
        'website_url',
        'featured_image',
        'significant_capital_expenditure_items',
        'franchise_agreement_term',
        'youtube_channel',
        'business_model',
        'investor_executive_model',
        'sub_contractor_model',
        'keep_my_job',
    ];
    
    

    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id');
    }

}
