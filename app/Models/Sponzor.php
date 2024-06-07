<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sponzor extends Model
{
    protected $table = 'sponzor';
    public $timestamps = false;
    protected $fillable = ['imageLink', 'link'];

}
