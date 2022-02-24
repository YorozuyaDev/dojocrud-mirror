<?php
    namespace App\Models;


    
    class EmailPref extends Eloquent {
          protected $table = 'courses_user';
    
          public function user()
          {
             return $this->belongsTo('User');
          }
    }