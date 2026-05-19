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
        Schema::create('pengajuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('nama_lengkap');
            $table->date('tgl_lahir');
            $table->string('no_hp');
            $table->string('email');
            $table->string('pekerjaan');
            $table->string('status_pernikahan');
            $table->string('alamat_ig')->nullable();
            $table->string('alamat_tiktok')->nullable();
            $table->string('bukti_setor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuans');
    }
};
