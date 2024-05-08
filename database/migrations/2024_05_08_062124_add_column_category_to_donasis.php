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
        Schema::table('donasis', function (Blueprint $table) {
            $table->string('category')->enum('Donasi Umum','Misi dan Penginjilan' ,'Pelayanan Sosial','Pendidikan Agama','Renovasi dan Pembangunan','Bantuan Kebutuhan Khusus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('donasis', function (Blueprint $table) {
            $table->dropColumn('category');
        });
    }
};
