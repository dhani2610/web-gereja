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
        Schema::create('profile_penguruses', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('namaPengurus');
            $table->string('category')->enum('Pendeta Ressort','Sekertaris' ,'Bendahara','Fungsional','Pararaton','Bestur Ressort','Ketua Dewan Diakonia','Ketua Dewan Koinonia','Ketua Dewan Marturia');
            $table->string('jabatan');
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_penguruses');
    }
};
