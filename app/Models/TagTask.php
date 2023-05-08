<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagTask extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getTagName(){
        return $this->belongsTo(Tag::class,'tag_id', 'id');
    }
}
