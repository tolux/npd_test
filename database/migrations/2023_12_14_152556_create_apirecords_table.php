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
        Schema::create('apirecords', function (Blueprint $table) {
            $table->id();
            $table->string('api');
            $table->string('description');
            $table->string('auth');
            $table->string('https');
            $table->string('cors');
            $table->string('link');
            $table->string('category');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apirecords');
    }
};
