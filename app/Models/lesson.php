<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lesson extends Model
{
    use HasFactory;
    
    protected $fillable = ['title','content', 'id_course'];// campos que tengan que rellenarse
     
    public function course(){
        return $this->belongsTo('App\Models\course','id');
    }
    
    public function lessonsmedia(){
        return $this->belongsTo('App\Models\lessonsmedia','id');
    }
}
