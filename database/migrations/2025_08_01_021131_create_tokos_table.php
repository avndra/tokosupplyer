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
    Schema::create('tokos', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('owner_id');
        $table->string('name_toko');
        $table->unsignedBigInteger('city_code');
        $table->timestamps();

        $table->foreign('owner_id')->references('id')->on('users');
        $table->foreign('city_code')->references('id')->on('cities');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tokos');
    }
};
