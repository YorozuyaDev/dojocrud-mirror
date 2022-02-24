<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lessonsmedia extends Model
{
    use HasFactory;
    protected $fillable = [
        'filename',
        'mimetype',
    ];
    
    public function lessons(){
        return $this->hasMany('App\Models\lessons','id_media');
    }
}
