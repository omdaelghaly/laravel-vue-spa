<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table='schools' ;
    protected $fillable = ['user_id','name','email','address','type','about', 'image'];
    protected $hidden =[];


    public function getuser(){
        return $this->belongsTo(User::class);
    }

     public function getemp(){
        return $this->hasMany(Emp::class);
    }
}
