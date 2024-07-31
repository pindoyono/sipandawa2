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
        Schema::create('ijazah_smps', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->bigInteger('sekolah_id')->default(1);
            $table->string('nis')->nullable();
            $table->string('nisn')->nullable();
            $table->string('tmt_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('no_ijazah')->nullable();
            $table->double('nilai')->nullable();
            $table->date('tgl_terbit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ijazah_smps');
    }
};
