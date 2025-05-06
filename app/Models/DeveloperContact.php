<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeveloperContact extends Model
{
    use HasFactory;

    protected $fillable = [
        'franchise_id',
        'name',
        'title',
        'phone',
        'mobile',
        'email',
        'corporate_address',
    ];

    public function franchise()
    {
        return $this->belongsTo(Franchise::class, 'franchise_id');
    }
}
