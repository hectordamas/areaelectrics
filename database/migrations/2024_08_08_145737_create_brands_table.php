<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use App\Models\Brand;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string("hidden")->nullable();
            $table->longText("slug")->nullable();
            $table->bigInteger('order')->default(0);
        });

        $brands = [
            "TP-Link", //1
            "Mercusys", //2
            "Dahua",//3
            "Huawei", //4
            "D-Link",  //5
            'Hikvision', //6
            'Ezviz', // 7
            'HiLook', // 8 
            "Panduit", //9
            "Lanpro", //10
            "Seagate", //11
            "Ubiquiti", //12
            "CDATA", //13
            "Wireplus", //14
            "Ledplus", //15
            "Onlink" //16
        ];

        for($i = 0; $i < count($brands); $i++){
            $brand = new Brand();
            $brand->name = $brands[$i];
            $brand->slug = Str::slug($brands[$i]);
            $brand->save();
    
            $brand->slug = $brand->slug . '-' . $brand->id;
            $brand->save();
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
