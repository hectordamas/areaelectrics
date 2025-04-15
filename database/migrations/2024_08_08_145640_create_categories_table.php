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
            $table->unsignedBigInteger('parent_id')->nullable(); // 1️⃣ Definir primero

            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
        });

        $categories = [
            "Routers y Switches", //1
            "Fibra Óptica", //2
            "Streaming", //3
            'Cables', //4
            'Accesorio de Redes', //5
            "Modem", //6,
            "Entensores - Repetidores", //7
            'Ferretería', //8
            "Iluminación", //9
            "Baterías y Pilas", //10
            "Rack y Bandejas", //11
            "Tapas y Enchufes", //12
            "UPS", //13
            "Cámaras WiFi", //14 
            "CCTV", //15

            "Reflectores", //16
            "Lámparas LED",  //17
            "Alumbrado Público", //18
        ];

        for($i = 0; $i < count($categories); $i++){
            $category = new Category();
            $category->name = $categories[$i];
            $category->slug = Str::slug($categories[$i]);
            $category->save();
    
            $category->slug = $category->slug . '-' . $category->id;

            $category->save();

            if(in_array($category->id, [16, 17, 18])){
                $category->parent_id = 9;
            }
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
