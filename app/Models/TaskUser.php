<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskUser extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getUserName(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
