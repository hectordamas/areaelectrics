<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string("hidden")->nullable();
            $table->longText("slug")->nullable();
            $table->bigInteger('order')->default(0);
        });

        $categories = [
            "Lencería", //1
            "Plug", //2
            "Vibradores", //3
            'Succionadores', //4
            'Fetichismo', //5
            "Amarres - Bondage", //6,
            "Consoladores" //7
        ];

        for($i = 0; $i < count($categories); $i++){
            $category = new Category();
            $category->name = $categories[$i];
            $category->slug = Str::slug($categories[$i]);
            $category->save();
    
            $category->slug = $category->slug . '-' . $category->id;
            $category->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
