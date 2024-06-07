<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PovedaliONas extends Model
{

    protected $table = 'povedali_o_nas';
    public $timestamps = false;
    protected $fillable = ['name', 'quote','pozicia','imageLink'];
}
