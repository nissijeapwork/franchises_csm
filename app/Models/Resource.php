<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $primaryKey = 'resource_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'franchise_id',
        'fdd_pdf_url',
        'franchise_comparisons',
    ];

    public function franchise()
    {
        return $this->belongsTo(Franchise::class, 'franchise_id');
    }
}
