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
            Schema::create('albums', function (Blueprint $table) { 
             $table->id(); 
             $table->string('cover'); 
             $table->string('title'); 
             $table->enum("object", ["Жилые", "Муниципиальные", "Коммерческие"]); 
             $table->string('city'); 
             $table->integer('image_id'); 
             $table->boolean('hidden'); 
             $table->integer('user_id');
             $table->index(['object', 'city']); 
             $table->timestamps(); 
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('albums');
    }
};
