<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
     protected $fillable = [
        'name',
        'maximum',
        'manimum',
        'times',
        'capital_back',
        'valid_for',
        'level_1',
        'level_2',
        'level_3',
        'status',
        'per_day_earn',
        'invest_date'
    ];
}
