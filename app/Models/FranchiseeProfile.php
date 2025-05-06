<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FranchiseeProfile extends Model
{
    use HasFactory;

    protected $primaryKey = 'profile_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'franchise_id',
        'ideal_candidate_traits',
        'training_support_description',
        'veteran_discount',
        'available_states',
        'store_opening_support_description',
    ];

    public function franchise()
    {
        return $this->belongsTo(Franchise::class, 'franchise_id');
    }
}
