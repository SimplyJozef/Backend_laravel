<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Stage extends Model
{
    protected $table = 'stage';
    public $timestamps = false;
    protected $fillable = ['name', 'date'];


    public function stageInfo(): HasMany
    {
        return $this->hasMany(StageInfo::class);
    }

}
