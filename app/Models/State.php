<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = ['name' ];
    protected $hidden = [];
    public $timestamps = false;
}