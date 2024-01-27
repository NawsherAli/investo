<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;
    
    protected $fillable = ['user_id','real_name', 'amount', 'status', 'indays','contact','accounttype','other_acount_number'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
