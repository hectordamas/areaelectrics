<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('telephone')->nullable();
            $table->longText('address')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('role')->default('Usuario');
            $table->boolean('is_active')->default(true);
            $table->rememberToken();
            $table->timestamps();
        });

        $user = new User();
        $user->name = "Hector Damas";
        $user->email = 'hectorgabrieldm@hotmail.com';
        $user->password = bcrypt('alinware98_');        
        $user->role = 'Administrador';
        $user->save();

        $user = new User();
        $user->name = "Maikel Camacho";
        $user->email = 'admin@areaelectric.com.ve';
        $user->password = bcrypt('AreaElectric2024*');        
        $user->role = 'Administrador';
        $user->save();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
