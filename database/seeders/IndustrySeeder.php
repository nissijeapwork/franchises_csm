<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Industry;
use Illuminate\Support\Str;

$industries = [
    'automotive',
    'business services',
    'child development',
    'fitness',
    'food & beverage',
    'health & beauty',
    'home services',
    'non-medical healthcare',
    'pet care',
    'real estate',
    'retail',
];

foreach ($industries as $name) {
    Industry::create([
        'name' => ucwords($name),
        'slug' => Str::slug($name)
    ]);
}

