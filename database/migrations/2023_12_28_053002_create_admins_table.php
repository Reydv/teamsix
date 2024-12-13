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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tanggal_dibuat');
            $table->date('tanggal_kadaluarsa');
            $table->string('nama_perusahaan');
            $table->integer('total_peserta');
            $table->string('lokasi_event');
            $table->integer('passcode')->unique();
            $table->json('misi_selesai');
            // TeamSix2 = 2, TeamSix3 = 3
            $table->integer('teamsix');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
