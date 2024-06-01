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
        Schema::create('ijazahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('sekolah')->nullable();
            $table->string('nisn')->nullable();
            $table->string('tmt_lahir')->nullable();
            $table->string('tgl_lahir')->nullable();
            $table->string('nama_ortu')->nullable();
            $table->string('no_ijazah_sd')->nullable();
            $table->string('no_ijazah_smp')->nullable();
            $table->string('status')->nullable();
            $table->string('th_lulus')->nullable();
            $table->string('nilai_ijazah_sd')->nullable();
            $table->string('nilai_ijazah_smp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ijazahs');
    }
};
