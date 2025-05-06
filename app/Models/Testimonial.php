<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;

    protected $primaryKey = 'testimonial_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'franchise_id',
        'author_name',
        'location',
        'quote',
    ];

    public function franchise()
    {
        return $this->belongsTo(Franchise::class, 'franchise_id');
    }
}
