<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stage_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("stage_id");
            $table->string("cas_od", 5);
            $table->string("cas_do", 5);
            $table->string("nazov", 255);
            $table->string("popis", 1000);
            $table->string("speaker", 255);
            $table->string("firma", 255);
            $table->string("speaker_image_link", 255);
            $table->integer("max_capacity");
        });
    }


    protected $table = 'stage_info';
    public $timestamps = false;
    protected $fillable = ['stage_id', 'cas_od', 'cas_do','nazov','popis','speaker','firma'];
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stage_info');
    }
};
