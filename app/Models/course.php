<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    
    protected $fillable = ['name','pricing', 'id_user'];// campos que tengan que rellenarse
     
    public function users(){
        return $this->belongsTo('App\Models\user','id');
    }
    
     public function lessons(){
        return $this->hasMany('App\Models\lesson','id');
    }
}
