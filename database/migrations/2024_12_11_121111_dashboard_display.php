<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dashboard_displays', function (Blueprint $table) {
            $table->id(); 
            $table->string('title'); 
            $table->string('description'); 
            $table->string('bg_url');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dashboard_displays');
    }
};