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
        Schema::create('povedali_o_nas', function (Blueprint $table) {
            $table->id();
            $table->string("name", 255);
            $table->string("quote", 1000);
            $table->string("pozicia", 255);
            $table->string("imageLink", 255);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('povedali_o_nas');
    }
};
