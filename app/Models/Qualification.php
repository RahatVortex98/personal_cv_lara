<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
   protected $fillable = [
    'designation',
    'company_name',
    'description',
    'start_date',
    'end_date'
   ];
   // Cast dates to Carbon objects so ->format() works
    protected $dates = [
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
    ];

    // Optional: cast to date only (no time)
    protected $casts = [
        'start_date' => 'date:Y-m-d',
        'end_date'   => 'date:Y-m-d',
    ];

}
