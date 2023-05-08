<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $guarded = ['id'];

    public function getTag(){
        return $this->hasMany(TagTask::class, 'task_id', 'id');
    }

    public function getUser(){
        return $this->hasMany(TaskUser::class, 'task_id', 'id');
    }
}
