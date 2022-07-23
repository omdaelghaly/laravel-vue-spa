<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emp extends Model
{
    protected $fillable = [
        'school_id', 'name','kdr_id','daraga_id','state_id','email', 'address',
       ];
  
        protected $hidden = [
              ];
  
  
              public function getschool(){
                return $this->belongsTo(School::class);
              }
  
               public function getempsalary(){
                return $this->hasOne(Empsalary::class);
               }
}
