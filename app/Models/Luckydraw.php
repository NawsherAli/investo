<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luckydraw extends Model
{
    use HasFactory;
    protected $table = 'luckydraws';
    protected $fillable = ['name', 'easypaisa_number', 'whatsapp_number', 'invest_amount', 'status'];
}
