<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enrolment extends Model
{
    use HasFactory;
    protected $fillable = ['id_user','id_course'];// campos que tengan que rellenarse
     
    public function users(){
        return $this->belongsTo('App\Models\user','id');
    }
    
      public function courses(){
        return $this->belongsTo('App\Models\user','id');
    }

}
