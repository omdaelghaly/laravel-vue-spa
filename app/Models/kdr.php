<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kdr extends Model
{
    //
    protected $fillable = ['name','bdl_m1','bdl_e2','hafez_ada','hafez25','all_sum','main2014','all_main2014' ];
    protected $hidden = [];
    public $timestamps = false;
}
