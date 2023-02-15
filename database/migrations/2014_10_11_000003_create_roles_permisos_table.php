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
        Schema::create('roles_permisos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_rol')->nullable();
            $table->foreign('id_rol')->references('id')->on('roles')->nullOnDelete();
            $table->unsignedBigInteger('id_permiso')->nullable();
            $table->foreign('id_permiso')->references('id')->on('permisos')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles_permisos');
    }
};
