<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speakers extends Model
{
    protected $table = 'Speakers';
    public $timestamps = false;
    protected $fillable = ['name', 'skusenosti','firma','linkedIn','imageLink'];
}
