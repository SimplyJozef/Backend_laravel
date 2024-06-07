<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StageInfo extends Model
{
    protected $table = 'stage_info';
    public $timestamps = false;
    protected $fillable = ['stage_id', 'cas_od', 'cas_do','nazov','popis','speaker','firma','max_capacity'];

    public function stage(): BelongsTo
    {
        return $this->belongsTo(Stage::class);
    }
}
