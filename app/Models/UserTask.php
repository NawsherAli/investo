<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTask extends Model
{
    use HasFactory;
     protected $table = 'usertasks';
    protected $fillable = ['user_id', 'task_id', 'image', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

      public function task()
    {
        return $this->belongsTo(Task::class);
    }
}
