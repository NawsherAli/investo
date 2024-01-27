<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'link', 'amount', 'status'];

    public function userTasks()
    {
        return $this->hasMany(UserTask::class);
    }
}
